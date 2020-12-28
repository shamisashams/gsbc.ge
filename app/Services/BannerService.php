<?php

namespace App\Services;

use App\Http\Request\Admin\BannerRequest;
use App\Http\Request\Admin\EventRequest;
use App\Http\Request\Admin\MemberRequest;
use App\Http\Request\Admin\NewsRequest;
use App\Http\Request\Admin\ProductRequest;
use App\Models\Banner;
use App\Models\BannerLanguage;
use App\Models\Event;
use App\Models\EventLanguage;
use App\Models\Localization;
use App\Models\Member;
use App\Models\MemberLanguage;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\throwException;

class BannerService
{
    protected $model;

    protected $perPageArray = [10, 20, 30, 50, 100];

    public function __construct(Banner $model)
    {
        $this->model = $model;
    }

    /**
     * Get Feature by id.
     *
     * @param int $id
     * @return Member
     */
    public function find(int $id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Get Features.
     *
     * @param string $lang
     * @return LengthAwarePaginator
     * @throws \Exception
     */
    public function getAll(string $lang, $request)
    {
        $data = $this->model->query();

        $localizationID = Localization::getIdByName($lang);

        if ($request->header) {
            $data = $data->with('language')->whereHas('language', function ($query) use ($localizationID, $request) {
                $query->where('header', 'like', "%{$request->header}%")->where('language_id', $localizationID);
            });
        }
        if ($request->header_1) {
            $data = $data->with('language')->whereHas('language', function ($query) use ($localizationID, $request) {
                $query->where('header_1', 'like', "%{$request->header_1}%")->where('language_id', $localizationID);
            });
        }

        if ($request->header_2) {
            $data = $data->with('language')->whereHas('language', function ($query) use ($localizationID, $request) {
                $query->where('header_2', 'like', "%{$request->header_2}%")->where('language_id', $localizationID);
            });
        }

        if ($request->header_3) {
            $data = $data->with('language')->whereHas('language', function ($query) use ($localizationID, $request) {
                $query->where('header_3', 'like', "%{$request->header_3}%")->where('language_id', $localizationID);
            });
        }


        if ($request->text) {
            $data = $data->with('language')->whereHas('language', function ($query) use ($localizationID, $request) {
                $query->where('text', 'like', "%{$request->text}%")->where('language_id', $localizationID);
            });
        }


        if ($request->text_1) {
            $data = $data->with('language')->whereHas('language', function ($query) use ($localizationID, $request) {
                $query->where('text_1', 'like', "%{$request->text_1}%")->where('language_id', $localizationID);
            });
        }


        if ($request->text_2) {
            $data = $data->with('language')->whereHas('language', function ($query) use ($localizationID, $request) {
                $query->where('text_2', 'like', "%{$request->text_2}%")->where('language_id', $localizationID);
            });
        }


        if ($request->text_3) {
            $data = $data->with('language')->whereHas('language', function ($query) use ($localizationID, $request) {
                $query->where('text_3', 'like', "%{$request->text_3}%")->where('language_id', $localizationID);
            });
        }


        // Check if perPage exist and validation by perPageArray [].
        $perPage = ($request->per_page != null && in_array($request->per_page, $this->perPageArray)) ? $request->per_page : 10;

        return $data->orderBy('created_at', 'DESC')->paginate($perPage);
    }


    public function getForCalendar(string $lang, $request)
    {
        $localizationID = Localization::getIdByName($lang);

        $data = DB::table('events')->select('start_date as start', 'end_date as end', 'title')
            ->leftJoin('events_languages', 'event_id', '=', 'events.id')
            ->where('language_id', $localizationID)
            ->get();

        return $data;
    }


    /**
     * Create Feature item into db.
     *
     * @param string $lang
     * @param array $request
     * @return bool
     */
    public function store(string $lang, BannerRequest $request)
    {
        $request['status'] = isset($request['status']) ? 1 : 0;

        $localizationID = Localization::getIdByName($lang);

        $this->model = new Banner([
            'user_id' => auth()->user()->id,
            'status' => $request['status']
        ]);

        $this->model->save();

        $this->model->language()->create([
            'banner_id' => $this->model->id,
            'language_id' => $localizationID,
            'header' => $request['header'],
            'header_1' => $request['header_1'],
            'header_2' => $request['header_2'],
            'header_3' => $request['header_3'],
            'text' => $request['text'],
            'text_1' => $request['text_1'],
            'text_2' => $request['text_2'],
            'text_3' => $request['text_3'],
        ]);

        $model = $this->model;

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $file) {
                $imagename = date('Ymhs') . $file->getClientOriginalName();
                $destination = 'storage/img/banner/' . $this->model->id;
                $request->file('images')[$key]->move($destination, $imagename);
                $model->files()->create([
                    'name' => $imagename,
                    'path' => '/storage/img/banner/' . $model->id,
                    'format' => $file->getClientOriginalExtension(),
                ]);
            }
        }

        return true;
    }

    /**
     * Update Feature item.
     *
     * @param string $lang
     * @param int $id
     * @param array $request
     * @return bool
     */
    public function update(string $lang, int $id, BannerRequest $request)
    {
        $request['status'] = isset($request['status']) ? 1 : 0;

        $data = $this->find($id);
        $data->update([
            'user_id' => auth()->user()->id,
            'status' => $request['status']
        ]);

        $localizationID = Localization::getIdByName($lang);

        $bannerLanguage = BannerLanguage::where(['banner_id' => $data->id, 'language_id' => $localizationID])->first();

        if ($bannerLanguage == null) {
            $data->language()->create([
                'banner_id' => $this->model->id,
                'language_id' => $localizationID,
                'header' => $request['header'],
                'header_1' => $request['header_1'],
                'header_2' => $request['header_2'],
                'header_3' => $request['header_3'],
                'text' => $request['text'],
                'text_1' => $request['text_1'],
                'text_2' => $request['text_2'],
                'text_3' => $request['text_3'],
            ]);
        } else {
            $bannerLanguage->header = $request['header'];
            $bannerLanguage->header_1 = $request['header_1'];
            $bannerLanguage->header_2 = $request['header_2'];
            $bannerLanguage->header_3 = $request['header_3'];

            $bannerLanguage->text = $request['text'];
            $bannerLanguage->text_1 = $request['text_1'];
            $bannerLanguage->text_2 = $request['text_2'];
            $bannerLanguage->text_3 = $request['text_3'];

            $bannerLanguage->save();
        }


        if (count($data->files) > 0) {
            foreach ($data->files as $file) {
                if ($request['old_images'] == null) {
                    if (Storage::exists('public/img/banner/' . $data->id . '/' . $file->name)) {
                        Storage::delete('public/img/banner/' . $data->id . '/' . $file->name);
                    }
                    $file->delete();
                    continue;
                }
                if (!in_array($file->id, $request['old_images'])) {
                    if (Storage::exists('public/img/banner/' . $data->id . '/' . $file->name)) {
                        Storage::delete('public/img/banner/' . $data->id . '/' . $file->name);
                    }
                    $file->delete();

                }
            }
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $file) {
                $imagename = date('Ymhs') . $file->getClientOriginalName();
                $destination = 'storage/img/banner/' . $data->id;
                $request->file('images')[$key]->move($destination, $imagename);
                $data->files()->create([
                    'name' => $imagename,
                    'path' => '/storage/img/banner/' . $data->id,
                    'format' => $file->getClientOriginalExtension(),
                ]);
            }
        }

        return true;
    }


    public function getBanner($lang)
    {
        $localizationID = Localization::getIdByName($lang);

        return $this->model::where(['status' => 1])
            ->whereHas('language', function ($query) use ($localizationID) {
                $query->where('language_id', $localizationID);
            })->first();

    }
}

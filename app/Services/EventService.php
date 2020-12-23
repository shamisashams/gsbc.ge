<?php

namespace App\Services;

use App\Http\Request\Admin\EventRequest;
use App\Http\Request\Admin\MemberRequest;
use App\Http\Request\Admin\NewsRequest;
use App\Http\Request\Admin\ProductRequest;
use App\Models\Event;
use App\Models\EventLanguage;
use App\Models\Localization;
use App\Models\Member;
use App\Models\MemberLanguage;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\throwException;

class EventService
{
    protected $model;

    protected $perPageArray = [10, 20, 30, 50, 100];

    public function __construct(Event $model)
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

        if ($request->title) {
            $data = $data->with('language')->whereHas('language', function ($query) use ($localizationID, $request) {
                $query->where('title', 'like', "%{$request->title}%")->where('language_id', $localizationID);
            });
        }

        if ($request->description) {
            $data = $data->with('language')->whereHas('language', function ($query) use ($localizationID, $request) {
                $query->where('description', 'like', "%{$request->description}%")->where('language_id', $localizationID);
            });
        }


        // Check if perPage exist and validation by perPageArray [].
        $perPage = ($request->per_page != null && in_array($request->per_page, $this->perPageArray)) ? $request->per_page : 10;

        return $data->orderBy('created_at', 'DESC')->paginate($perPage);
    }


    /**
     * Create Feature item into db.
     *
     * @param string $lang
     * @param array $request
     * @return bool
     */
    public function store(string $lang, EventRequest $request)
    {
        $localizationID = Localization::getIdByName($lang);


        $startDate = str_replace('T', ' ', $request['start_date']);
        $endDate = str_replace('T', ' ', $request['end_date']);

        $this->model = new Event([
            'user_id' => auth()->user()->id,
            'start_date' => $startDate,
            'end_date' => $endDate,
        ]);

        $this->model->save();

        $this->model->language()->create([
            'event_id' => $this->model->id,
            'language_id' => $localizationID,
            'title' => $request['title'],
            'description' => $request['description'],
        ]);

        $model = $this->model;

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $file) {
                $imagename = date('Ymhs') . $file->getClientOriginalName();
                $destination = 'storage/img/events/' . $this->model->id;
                $request->file('images')[$key]->move($destination, $imagename);
                $model->files()->create([
                    'name' => $imagename,
                    'path' => '/storage/img/events/' . $model->id,
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
    public function update(string $lang, int $id, EventRequest $request)
    {

        $data = $this->find($id);

        $startDate = str_replace('T', ' ', $request['start_date']);
        $endDate = str_replace('T', ' ', $request['end_date']);

        $data->update([
            'user_id' => auth()->user()->id,
            'start_date' => $startDate,
            'end_date' => $endDate,
        ]);

        $localizationID = Localization::getIdByName($lang);

        $newsLanguage = EventLanguage::where(['event_id' => $data->id, 'language_id' => $localizationID])->first();

        if ($newsLanguage == null) {
            $data->language()->create([
                'event_id' => $this->model->id,
                'language_id' => $localizationID,
                'title' => $request['title'],
                'description' => $request['description'],
            ]);
        } else {
            $newsLanguage->title = $request['title'];
            $newsLanguage->description = $request['description'];

            $newsLanguage->save();
        }


        if (count($data->files) > 0) {
            foreach ($data->files as $file) {
                if ($request['old_images'] == null) {
                    if (Storage::exists('public/img/events/' . $data->id . '/' . $file->name)) {
                        Storage::delete('public/img/events/' . $data->id . '/' . $file->name);
                    }
                    $file->delete();
                    continue;
                }
                if (!in_array($file->id, $request['old_images'])) {
                    if (Storage::exists('public/img/events/' . $data->id . '/' . $file->name)) {
                        Storage::delete('public/img/events/' . $data->id . '/' . $file->name);
                    }
                    $file->delete();

                }
            }
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $file) {
                $imagename = date('Ymhs') . $file->getClientOriginalName();
                $destination = 'storage/img/events/' . $data->id;
                $request->file('images')[$key]->move($destination, $imagename);
                $data->files()->create([
                    'name' => $imagename,
                    'path' => '/storage/img/events/' . $data->id,
                    'format' => $file->getClientOriginalExtension(),
                ]);
            }
        }

        return true;
    }

    /**
     * Create localization item into db.
     *
     * @param int $id
     * @return bool
     * @throws \Exception
     */
    public function delete($id)
    {
        $data = $this->find($id);
        if (count($data->language) > 0) {
            if (!$data->language()->delete()) {
                throwException('Event languages can not delete.');
            }
        }

        if (count($data->files) > 0) {
            if (Storage::exists('public/img/events/' . $data->id)) {
                Storage::deleteDirectory('public/img/events/' . $data->id);
            }
            $data->files()->delete();
        }
        if (!$data->delete()) {
            throwException('Event  can not delete.');
        }
        return true;
    }

    public function getMembers()
    {
        return $this->model::where(['status' => 1])
            ->orderBy('created_at', 'desc')->get();

    }
}

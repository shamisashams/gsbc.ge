<?php

namespace App\Services;

use App\Http\Request\Admin\MemberRequest;
use App\Http\Request\Admin\NewsRequest;
use App\Http\Request\Admin\ProductRequest;
use App\Models\Localization;
use App\Models\Member;
use App\Models\MemberLanguage;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\throwException;

class MemberService
{
    protected $model;

    protected $perPageArray = [10, 20, 30, 50, 100];

    public function __construct(Member $model)
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

        if ($request->status != null) {
            $data = $data->where('status', $request->status);
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
    public function store(string $lang, MemberRequest $request)
    {
        $request['status'] = isset($request['status']) ? 1 : 0;

        $localizationID = Localization::getIdByName($lang);

        $this->model = new Member([
            'status' => $request['status'],
            'user_id' => auth()->user()->id
        ]);

        $this->model->save();

        $this->model->language()->create([
            'member_id' => $this->model->id,
            'language_id' => $localizationID,
            'title' => $request['title'],
            'description' => $request['description'],
            'body' => $request['body'],
        ]);

        $model = $this->model;

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $file) {
                $imagename = date('Ymhs') . $file->getClientOriginalName();
                $destination = 'storage/img/members/' . $this->model->id;
                $request->file('images')[$key]->move($destination, $imagename);
                $model->files()->create([
                    'name' => $imagename,
                    'path' => '/storage/img/members/' . $model->id,
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
    public function update(string $lang, int $id, MemberRequest $request)
    {
        $request['status'] = isset($request['status']) ? 1 : 0;

        $data = $this->find($id);
        $data->update([
            'status' => $request['status'],
            'user_id' => auth()->user()->id
        ]);

        $localizationID = Localization::getIdByName($lang);

        $newsLanguage = MemberLanguage::where(['member_id' => $data->id, 'language_id' => $localizationID])->first();

        if ($newsLanguage == null) {
            $data->language()->create([
                'member_id' => $this->model->id,
                'language_id' => $localizationID,
                'title' => $request['title'],
                'description' => $request['description'],
                'body' => $request['body'],
            ]);
        } else {
            $newsLanguage->title = $request['title'];
            $newsLanguage->description = $request['description'];
            $newsLanguage->body = $request['body'];

            $newsLanguage->save();
        }


        if (count($data->files) > 0) {
            foreach ($data->files as $file) {
                if ($request['old_images'] == null) {
                    if (Storage::exists('public/img/members/' . $data->id . '/' . $file->name)) {
                        Storage::delete('public/img/members/' . $data->id . '/' . $file->name);
                    }
                    $file->delete();
                    continue;
                }
                if (!in_array($file->id, $request['old_images'])) {
                    if (Storage::exists('public/img/members/' . $data->id . '/' . $file->name)) {
                        Storage::delete('public/img/members/' . $data->id . '/' . $file->name);
                    }
                    $file->delete();

                }
            }
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $file) {
                $imagename = date('Ymhs') . $file->getClientOriginalName();
                $destination = 'storage/img/members/' . $data->id;
                $request->file('images')[$key]->move($destination, $imagename);
                $data->files()->create([
                    'name' => $imagename,
                    'path' => '/storage/img/members/' . $data->id,
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
                throwException('Member languages can not delete.');
            }
        }

        if (count($data->files) > 0) {
            if (Storage::exists('public/img/members/' . $data->id)) {
                Storage::deleteDirectory('public/img/members/' . $data->id);
            }
            $data->files()->delete();
        }
        if (!$data->delete()) {
            throwException('Member  can not delete.');
        }
        return true;
    }

    public function getMembers()
    {
        return $this->model::where(['status' => 1])
            ->orderBy('created_at', 'desc')->get();

    }
}

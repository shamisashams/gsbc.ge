<?php

namespace App\Services;

use App\Http\Request\Admin\NewsRequest;
use App\Http\Request\Admin\PageRequest;
use App\Http\Request\Admin\ProductRequest;
use App\Models\Feature;
use App\Models\FeatureLanguage;
use App\Models\Localization;
use App\Models\News;
use App\Models\NewsLanguage;
use App\Models\Page;
use App\Models\PageLanguage;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\throwException;

class PageService
{
    protected $model;

    protected $perPageArray = [10, 20, 30, 50, 100];

    public function __construct(Page $model)
    {
        $this->model = $model;
    }

    /**
     * Get Feature by id.
     *
     * @param int $id
     * @return Feature
     */
    public function find(int $id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Get Features.
     *
     * @param string $lang
     * @throws \Exception
     */
    public function getAll(string $lang, $slug, $request)
    {
        $data = $this->model->query();
//        $localizationID = Localization::getIdByName($lang);

        return $data->orderBy('id', 'DESC')->where(['slug' => $slug])->get();

    }

    public function update(string $lang, int $id, PageRequest $request)
    {
        $request['status'] = isset($request['status']) ? 1 : 0;

        $data = $this->find($id);
        $data->update([
            'status' => $request['status'],
        ]);

        $localizationID = Localization::getIdByName($lang);

        $pageLanguage = PageLanguage::where(['page_id' => $data->id, 'language_id' => $localizationID])->first();

        if ($pageLanguage == null) {
            $data->language()->create([
                'page_id' => $this->model->id,
                'language_id' => $localizationID,
                'title' => $request['title'],
                'description' => null,
                'body' => $request['body'],
                'body_2' => $request['body_2'],
            ]);
        } else {
            $pageLanguage->title = $request['title'];
            $pageLanguage->description = null;
            $pageLanguage->body = $request['body'];
            $pageLanguage->body_2 = $request['body_2'];

            $pageLanguage->save();
        }


        if (count($data->files) > 0) {
            foreach ($data->files as $file) {
                if ($request['old_images'] == null) {
                    if (Storage::exists('public/img/pages/' . $data->id . '/' . $file->name)) {
                        Storage::delete('public/img/pages/' . $data->id . '/' . $file->name);
                    }
                    $file->delete();
                    continue;
                }
                if (!in_array($file->id, $request['old_images'])) {
                    if (Storage::exists('public/img/pages/' . $data->id . '/' . $file->name)) {
                        Storage::delete('public/img/pages/' . $data->id . '/' . $file->name);
                    }
                    $file->delete();

                }
            }
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $file) {
                $imagename = date('Ymhs') . $file->getClientOriginalName();
                $destination = 'storage/img/pages/' . $data->id;
                $request->file('images')[$key]->move($destination, $imagename);
                $data->files()->create([
                    'name' => $imagename,
                    'path' => '/storage/img/pages/' . $data->id,
                    'format' => $file->getClientOriginalExtension(),
                ]);
            }
        }

        return true;
    }


    public function getWelcomeContent($lang)
    {
        $localizationID = Localization::getIdByName($lang);
        return $this->model::where(['status' => 1, 'type' => 'welcome'])->whereHas('language', function ($query) use ($localizationID) {
            $query->where('language_id', $localizationID);
        })->first();
    }

    public function getAboutContent($lang)
    {
        $localizationID = Localization::getIdByName($lang);

        return $this->model::where(['status' => 1, 'type' => 'about'])->whereHas('language', function ($query) use ($localizationID) {
            $query->where('language_id', $localizationID);
        })->first();
    }

    public function getWhyChooseUs($lang)
    {
        $localizationID = Localization::getIdByName($lang);
        return $this->model::where(['status' => 1, 'type' => 'choose-us'])->whereHas('language', function ($query) use ($localizationID) {
            $query->where('language_id', $localizationID);
        })->first();
    }


}

<?php

namespace App\Services;

use App\Http\Request\Admin\NewsRequest;
use App\Http\Request\Admin\ProductRequest;
use App\Models\Feature;
use App\Models\FeatureLanguage;
use App\Models\Localization;
use App\Models\News;
use App\Models\NewsLanguage;
use App\Models\Page;
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
    public function getAll(string $lang, $slug, $type, $request)
    {
        $data = $this->model->query();
//        $localizationID = Localization::getIdByName($lang);

        return $data->orderBy('id', 'DESC')->where(['slug' => $slug, 'type' => $type])->get();

    }

}

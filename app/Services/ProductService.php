<?php

namespace App\Services;

use App\Http\Request\Admin\ProductRequest;
use App\Models\Localization;
use App\Models\Product;
use App\Models\ProductLanguage;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\throwException;

class ProductService
{
    protected $model;

    protected $perPageArray = [10, 20, 30, 50, 100];

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    /**
     * Get Product by id.
     *
     * @param int $id
     * @return Product
     */
    public function find(int $id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Get Products.
     *
     * @param string $lang
     * @return LengthAwarePaginator
     * @throws \Exception
     */
    public function getAll(string $lang,$request)
    {
        $data = $this->model->query();

        $localizationID = Localization::getIdByName($lang);

        if ($request->id) {
            $data = $data->where('id',$request->id);
        }

        if ($request->title) {
            $data = $data->with('language')->whereHas('language', function ($query) use ($localizationID, $request) {
                $query->where('title','like',"%{$request->title}%")->where('language_id',$localizationID);
            });
        }

        if ($request->description) {
            $data = $data->with('language')->whereHas('language', function ($query) use ($localizationID, $request) {
                $query->where('description','like',"%{$request->description}%")->where('language_id',$localizationID);
            });
        }

        if ($request->slug) {
            $data = $data->where('slug', 'like', "%{$request->slug}%");
        }

        if ($request->status != null) {
            $data = $data->where('status',$request->status);
        }


        // Check if perPage exist and validation by perPageArray [].
        $perPage = ($request->per_page != null && in_array($request->per_page,$this->perPageArray)) ? $request->per_page : 10;

        return $data->orderBy('id', 'DESC')->paginate($perPage);
    }


    /**
     * Create Feature item into db.
     *
     * @param string $lang
     * @param ProductRequest $request
     * @return bool
     */
    public function store(string $lang,ProductRequest $request)
    {
        $request['status'] = isset($request['status']) ? 1 : 0;

        $localizationID = Localization::getIdByName($lang);


        $this->model = $this->model->create([
            'release_date' => Carbon::parse($request['release_date']),
            'position' => $request['position'],
            'status' => $request['status'],
            'slug' => $request['slug'],
            'price' => $request['price']
        ]);

        $this->model->language()->create([
            'product_id' => $this->model->id,
            'language_id' => $localizationID,
            'title' => $request['title'],
            'description' => $request['description'],
            'content' => $request['content'],
        ]);

        if ($request['features'] != null) {

            if (count($request['features']) > 0) {

                foreach ($request['features'] as $key => $feature) {
                    if(count($feature)> 0) {
                        $this->model->features()->create([
                            'feature_id' => $key,
                            'product_id' => $this->model->id
                        ]);

                        foreach ($feature as $answer) {
                            $this->model->answers()->create([
                               'product_id' => $this->model->id,
                               'feature_id' => $key,
                               'answer_id' => $answer
                            ]);
                        }
                    }
                }
            }
        }

        $model = $this->model;

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $file) {
                $imagename = date('Ymhs') . $file->getClientOriginalName();
                $destination = base_path() . '/storage/app/public/product/' . $this->model->id;
                $request->file('images')[$key]->move($destination, $imagename);
                $model->files()->create([
                    'name' => $imagename,
                    'path' => '/storage/app/public/product/' . $model->id,
                    'format' => $file->getClientOriginalExtension(),
                ]);
            }
        }

        return true;
    }

    /**
     * Update Product item.
     *
     * @param string $lang
     * @param int $id
     * @param ProductRequest $request
     * @return bool
     */
    public function update(string $lang,int $id, ProductRequest $request)
    {
        $request['status'] = isset($request['status']) ? 1 : 0;

        $localizationID = Localization::getIdByName($lang);

        $data = $this->find($id);

        $data->update([
            'release_date' => Carbon::parse($request['release_date']),
            'position' => $request['position'],
            'status' => $request['status'],
            'slug' => $request['slug'],
            'price' => $request['price']
        ]);
        $productLanguage = ProductLanguage::where(['product_id' => $data->id, 'language_id' => $localizationID])->first();

        if ($productLanguage == null) {
            $data->language()->create([
                'feature_id' => $data->id,
                'language_id' => $localizationID,
                'title' => $request['title'],
                'description' => $request['description'],
                'content' => $request['content'],
            ]);
        } else {
            $productLanguage->title = $request['title'];
            $productLanguage->description = $request['description'];
            $productLanguage->content = $request['content'];
            $productLanguage->save();
        }

        if (count($data->answers) > 0) {
            if(!$data->answers()->delete()){
                throwException('Product Answers can not delete.');
            }
        }

        if (count($data->features) > 0) {
            if(!$data->features()->delete()){
                throwException('Product Features can not delete.');
            }
        }

        if ($request['features'] != null) {
            if (count($request['features']) > 0) {

                foreach ($request['features'] as $key => $feature) {
                    if(count($feature)> 0) {
                        $data->features()->create([
                            'feature_id' => $key,
                            'product_id' => $data->id
                        ]);
                        foreach ($feature as $answer) {
                            $data->answers()->create([
                                'product_id' => $data->id,
                                'feature_id' => $key,
                                'answer_id' => $answer
                            ]);
                        }
                    }
                }
            }
        }

        // Delete product file if deleted in request.
        if (count($data->files) > 0) {
            foreach ($data->files as $file) {
                if ($request['old_images'] == null) {
                    $file->delete();
                    continue;
                }
                if (!in_array($file->id,$request['old_images'])) {
                    if (Storage::exists('public/product/' . $data->id.'/'.$file->name)) {
                        Storage::delete('public/product/' . $data->id.'/'.$file->name);
                    }
                    $file->delete();

                }
            }
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $file) {
                $imagename = date('Ymhs') . $file->getClientOriginalName();
                $destination = base_path() . '/storage/app/public/product/' . $data->id;
                $request->file('images')[$key]->move($destination, $imagename);
                $data->files()->create([
                    'name' => $imagename,
                    'path' => '/storage/app/public/product/' . $data->id,
                    'format' => $file->getClientOriginalExtension(),
                ]);
            }
        }

        return true;
    }

    /**
     * Create Product item into db.
     *
     * @param int $id
     * @return bool
     * @throws \Exception
     */
    public function delete($id)
    {
        $data = $this->find($id);
        if (count($data->language) > 0) {
            if(!$data->language()->delete()){
                throwException('Product languages can not delete.');
            }
        }
        if (count($data->answers) > 0) {
            if(!$data->answers()->delete()){
                throwException('Product Answers can not delete.');
            }
        }

        if (count($data->features) > 0) {
            if(!$data->features()->delete()){
                throwException('Product Features can not delete.');
            }
        }

        if (count($data->files) > 0) {
            if (Storage::exists('public/product/' . $data->id)) {
                Storage::deleteDirectory('public/product/' . $data->id);
            }
            $data->files()->delete();
        }
        if (!$data->delete()) {
            throwException('Product  can not delete.');
        }
        return true;
    }
}

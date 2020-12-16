<?php

namespace App\Http\Controllers\Admin;

use App\Http\Request\Admin\ProductRequest;
use App\Models\Feature;
use App\Services\ProductService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class ProductController extends AdminController
{
    protected $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }


    /**
     * Display a listing of the resource.
     * @param string $lang
     * @return Application|Factory|View|Response
     */
    public function index(string $lang, Request $request)
    {
        $request->validate([
            'id' => 'integer|nullable',
            'title' => 'string|max:255|nullable',
            'description' => 'string|max:255|nullable',
            'slug' => 'string|max:255|nullable',
            'status' => 'boolean|nullable',
        ]);
        return view('admin.modules.product.index', [
            'products' => $this->service->getAll($lang,$request)
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $features = Feature::all();

        return view('admin.modules.product.create',[
            'features' => $features
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param string $lang
     * @param ProductRequest $request
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function store(string $locale, ProductRequest $request)
    {
        if (!$this->service->store($locale,$request)) {
            return redirect(route('productCreateView',$locale))->with('danger', 'Product does not create.');
        }

        return redirect(route('productIndex', $locale))->with('success', 'Product create successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @param string $locale
     * @return Application|Factory|View|Response
     */
    public function show(string $locale, int $id)
    {
        return view('admin.modules.product.show', [
            'product' => $this->service->find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @param string $locale
     * @return Application|Factory|View|Response
     */
    public function edit(string $locale, int $id)
    {
        $product = $this->service->find($id);
        $productAnswers = $product->answers()->select('answer_id')->get()->toArray();
        $features = Feature::all();

        return view('admin.modules.product.update',[
            'product' => $product,
            'features' =>$features,
            'productAnswers' => $productAnswers,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductRequest  $request
     * @param string $locale
     * @param int $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function update(string $locale, ProductRequest $request, int $id)
    {
        if (!$this->service->update($locale,$id,$request)) {
            return redirect(route('productIndex',$locale))->with('danger', 'Product does not update.');
        }

        return redirect(route('productIndex', $locale))->with('success', 'Product update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $locale
     * @param int $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function destroy(string $locale, int $id)
    {
        if (!$this->service->delete($id)) {
            return redirect(route('productIndex', $locale))->with('danger', 'Product does not delete.');
        }
        return redirect(route('productIndex', $locale))->with('success', 'Product delete successfully.');


    }
}

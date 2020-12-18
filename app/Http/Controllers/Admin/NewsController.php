<?php

namespace App\Http\Controllers\Admin;

use App\Http\Request\Admin\NewsRequest;
use App\Http\Request\Admin\ProductRequest;
use App\Models\News;
use App\Services\FeatureService;
use App\Services\NewsService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class NewsController extends AdminController
{
    protected $service;

    public function __construct(NewsService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index(string $lang,Request $request)
    {
        $request->validate([
            'title' => 'string|max:255|nullable',
            'description' => 'string|max:255|nullable',
            'status' => 'boolean|nullable',
            'slug' => 'string|nullable',
        ]);
        return view('admin.modules.news.index', [
            'news' => $this->service->getAll($lang,$request)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.modules.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewsRequest  $request
     * @param string $locale
     */
    public function store(string $locale,NewsRequest $request)
    {
        if (!$this->service->store($locale,$request)) {
            return redirect(route('createNews',$locale))->with('danger', __('admin.failed_created_news'));
        }
        return redirect(route('news', $locale))->with('success',__('admin.successfully_created_news'));
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
        return view('admin.modules.news.show', [
            'news' => $this->service->find($id)
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
        $news = $this->service->find($id);

        return view('admin.modules.news.update',[
            'news' => $news,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NewsRequest  $request
     * @param string $locale
     * @param int $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function update(string $locale,NewsRequest $request, int $id)
    {
        if (!$this->service->update($locale,$id,$request)) {
            return redirect(route('news',$locale))->with('danger', __('admin.failed_updated_news'));
        }

        return redirect(route('news', $locale))->with('success',__('admin.successfully_updated_news') );
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
            return redirect(route('news', $locale))->with('danger', __('admin.failed_deleted_news'));
        }
        return redirect(route('news', $locale))->with('success',__('admin.successfully_deleted_news'));
    }
}

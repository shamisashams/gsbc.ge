<?php

namespace App\Http\Controllers\Admin;

use App\Http\Request\Admin\BannerRequest;
use App\Services\BannerService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class BannerController extends AdminController
{
    protected $service;

    public function __construct(BannerService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index(string $lang, Request $request)
    {
        $request->validate([
            'header' => 'string|max:255|nullable',
            'text' => 'string|max:255|nullable',
        ]);
        return view('admin.modules.banner.index', [
            'banners' => $this->service->getAll($lang, $request)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
//    public function create()
//    {
//        return view('admin.modules.banner.create');
//
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BannerRequest $request
     * @param string $locale
     */
    public function store(string $locale, BannerRequest $request)
    {
        if (!$this->service->store($locale, $request)) {
            return redirect(route('createBanner', $locale))->with('danger', __('admin.failed_created_banner'));
        }
        return redirect(route('banner', $locale))->with('success', __('admin.successfully_created_banner'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $banner = $this->service->find($id);

        return view('admin.modules.banner.update', [
            'banner' => $banner,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BannerRequest $request
     * @param string $locale
     * @param int $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function update(string $locale, BannerRequest $request, int $id)
    {
        if (!$this->service->update($locale, $id, $request)) {
            return redirect(route('banner', $locale))->with('danger', __('admin.failed_updated_banner'));
        }

        return redirect(route('banner', $locale))->with('success', __('admin.successfully_updated_banner'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Council;
use App\Services\BannerService;
use App\Services\CouncilService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AboutUsController extends Controller
{
    protected $service;

    /**
     * @var CouncilService
     */
    protected $councilService;

    public function __construct(BannerService $service, CouncilService $councilService)
    {
        $this->service = $service;
        $this->councilService = $councilService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param string $lang
     * @param Request $request
     * @return Application|Factory|View|Response
     */
    public function index(string $lang, Request $request)
    {

        $banner = $this->service->getBanner($lang);
        $councils = Council::all();

        return view('frontend.modules.about-us.index',[
            'banner' => $banner,
            'councils' => $councils
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param string $lang
     * @param string $slug
     *
     * @return Application|Factory|View|Response
     */
    public function biography(string $lang, string $slug) {
        return view('frontend.modules.biography.index',[
           'council' => $this->councilService->findBySlug($slug)
        ]);
    }

}

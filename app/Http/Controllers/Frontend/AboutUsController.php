<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\BannerService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AboutUsController extends Controller
{
    protected $service;

    public function __construct(BannerService $service)
    {
        $this->service = $service;
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


        return view('frontend.modules.about-us.index')
            ->with(
                [
                    'banner' => $banner
                ]);
    }

}

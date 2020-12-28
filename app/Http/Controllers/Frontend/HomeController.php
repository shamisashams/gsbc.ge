<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Request\Admin\PageRequest;
use App\Models\Banner;
use App\Models\News;
use App\Services\BannerService;
use App\Services\NewsService;
use App\Services\PageService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    protected $service;

    public function __construct(PageService $service)
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
        $service = new NewsService(new News());

        $serviceBanner = new BannerService(new Banner());

        $welcome = $this->service->getWelcomeContent($lang);

        $about = $this->service->getAboutContent($lang);

        $whyChooseUs = $this->service->getWhyChooseUs($lang);

        $news = $service->getLatestNews($lang);

        $banner = $serviceBanner->getBanner($lang);


        return view('frontend.modules.home.index')
            ->with(
                [
                    'welcome' => $welcome,
                    'about' => $about,
                    'chooseUs' => $whyChooseUs,
                    'news' => $news,
                    'banner' => $banner
                ]);
    }


    public function changeLocalization(Request $request, $locale)
    {
        $path = $request->input('path');
        $url = $locale . substr($path, 2);
        return redirect($url);
    }

}

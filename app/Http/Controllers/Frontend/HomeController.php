<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Request\Admin\PageRequest;
use App\Models\News;
use App\Services\NewsService;
use App\Services\PageService;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index(string $lang, Request $request)
    {
        $service = new NewsService(new News());

        $welcome = $this->service->getWelcomeContent();

        $about=$this->service->getAboutContent();

        $whyChooseUs=$this->service->getWhyChooseUs();

        $news = $service->getLatestNews();

        return view('frontend.modules.home.index')->with(['welcome' => $welcome, 'about'=>$about,'chooseUs'=>$whyChooseUs,'news' => $news]);
    }



}

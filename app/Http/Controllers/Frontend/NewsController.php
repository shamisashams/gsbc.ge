<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Services\NewsService;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    protected $service;

    public function __construct(NewsService $service)
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
        $news = $this->service->getLatestNews();

        return view('frontend.modules.home.index')->with(['news' => $news]);
    }

    public function getNews()
    {
        $news = $this->service->getNews();
        return view('frontend.modules.media.index')->with(['news' => $news]);
    }

    public function getSingleNews(string $lang, $slug)
    {
        $news = $this->service->findBySlug($slug);
        if (!$news) {
            abort(404, 'News Not Found');
        }
        return view('frontend.modules.media.single-blog.index')->with(['news' => $news]);
    }
}

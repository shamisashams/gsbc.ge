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
     * @return \Illuminate\Http\Response

     */
    public function index(string $lang,Request $request)
    {
       $news=News::where(['status' => 1])
            ->take(5)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('frontend.modules.home.index')->with(['news'=>$news]);

    }
}

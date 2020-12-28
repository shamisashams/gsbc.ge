<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Services\MemberService;
use App\Services\NewsService;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    protected $service;

    public function __construct(MemberService $service)
    {
        $this->service = $service;
    }

    public function getMembers(string $lang)
    {
        $members = $this->service->getMembers($lang);
        return view('frontend.modules.membership.index')->with(['members' => $members]);
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

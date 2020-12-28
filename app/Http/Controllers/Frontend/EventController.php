<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Admin\AdminController;
use App\Services\EventService;
use Illuminate\Http\Request;


class EventController extends AdminController
{
    protected $service;

    public function __construct(EventService $service)
    {
        $this->service = $service;
    }

    public function getEvents(String $lang , Request $request){

        $events  = $this->service->getEvents($lang, $request);
        return view('frontend.modules.events.index')->with(['events' => $events]);
    }
}

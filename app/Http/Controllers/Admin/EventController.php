<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Request\Admin\EventRequest;
use App\Http\Request\Admin\MemberRequest;
use App\Services\EventService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class EventController extends AdminController
{
    protected $service;

    public function __construct(EventService $service)
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
            'title' => 'string|max:255|nullable',
            'description' => 'string|max:255|nullable',
            'location'=> 'string|max:255|nullable',
        ]);
        return view('admin.modules.event.index', [
            'events' => $this->service->getAll($lang, $request)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.modules.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MemberRequest $request
     * @param string $locale
     */
    public function store(string $locale, EventRequest $request)
    {
        if (!$this->service->store($locale, $request)) {
            return redirect(route('createEvent', $locale))->with('danger', __('admin.failed_created_event'));
        }
        return redirect(route('adminEvent', $locale))->with('success', __('admin.successfully_created_event'));
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
        return view('admin.modules.event.show', [
            'event' => $this->service->find($id)
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
        $event = $this->service->find($id);
        $startDate = str_replace(' ', '', substr_replace($event->start_date, 'T', 10, 0));
        $endDate = str_replace(' ', '', substr_replace($event->end_date, 'T', 10, 0));

        return view('admin.modules.event.update', [
            'event' => $event,
            'startDate' => $startDate,
            'endDate' => $endDate

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EventRequest $request
     * @param string $locale
     * @param int $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function update(string $locale, EventRequest $request, int $id)
    {
        if (!$this->service->update($locale, $id, $request)) {
            return redirect(route('adminEvent', $locale))->with('danger', __('admin.failed_updated_event'));
        }

        return redirect(route('adminEvent', $locale))->with('success', __('admin.successfully_updated_event'));
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
            return redirect(route('adminEvent', $locale))->with('danger', __('admin.failed_deleted_event'));
        }
        return redirect(route('adminEvent', $locale))->with('success', __('admin.successfully_deleted_event'));
    }
}

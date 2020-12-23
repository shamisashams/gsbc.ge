<?php

namespace App\Http\Controllers\Admin;

use App\Http\Request\Admin\MemberRequest;
use App\Http\Request\Admin\NewsRequest;
use App\Services\MemberService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class MemberController extends AdminController
{
    protected $service;

    public function __construct(MemberService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index(string $lang,Request $request)
    {
        $request->validate([
            'title' => 'string|max:255|nullable',
            'description' => 'string|max:255|nullable',
            'status' => 'boolean|nullable',
        ]);
        return view('admin.modules.member.index', [
            'members' => $this->service->getAll($lang,$request)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.modules.member.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MemberRequest  $request
     * @param string $locale
     */
    public function store(string $locale,MemberRequest $request)
    {
        if (!$this->service->store($locale,$request)) {
            return redirect(route('createMember',$locale))->with('danger', __('admin.failed_created_member'));
        }
        return redirect(route('member', $locale))->with('success',__('admin.successfully_created_member'));
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
        $member = $this->service->find($id);

        return view('admin.modules.member.update',[
            'member' => $member,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MemberRequest  $request
     * @param string $locale
     * @param int $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function update(string $locale,MemberRequest $request, int $id)
    {
        if (!$this->service->update($locale,$id,$request)) {
            return redirect(route('member',$locale))->with('danger', __('admin.failed_updated_member'));
        }

        return redirect(route('member', $locale))->with('success',__('admin.successfully_updated_member') );
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
            return redirect(route('member', $locale))->with('danger', __('admin.failed_deleted_member'));
        }
        return redirect(route('member', $locale))->with('success',__('admin.successfully_deleted_member'));
    }
}

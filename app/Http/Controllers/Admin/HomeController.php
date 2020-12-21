<?php

namespace App\Http\Controllers\Admin;

use App\Http\Request\Admin\NewsRequest;
use App\Http\Request\Admin\PageRequest;
use App\Services\NewsService;
use App\Services\PageService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class HomeController extends AdminController
{

    protected $service;

    public function __construct(PageService $service)
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
//        $request->validate([
//            'title' => 'string|max:255|nullable',
//            'description' => 'string|max:255|nullable',
//            'status' => 'boolean|nullable',
//            'slug' => 'string|nullable',
//        ]);
        $slug='home';
        return view('admin.modules.page.index', [
            'pages' => $this->service->getAll($lang,$slug,$request)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $locale, int $id)
    {
        $page = $this->service->find($id);

        return view('admin.modules.page.update',[
            'page' => $page,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PageRequest  $request
     * @param string $locale
     * @param int $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function update(string $locale,PageRequest $request, int $id)
    {
        if (!$this->service->update($locale,$id,$request)) {
            return redirect(route('adminHome',$locale))->with('danger', __('admin.failed_updated_page'));
        }


        return redirect(route('adminHome', $locale))->with('success',__('admin.successfully_updated_page') );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

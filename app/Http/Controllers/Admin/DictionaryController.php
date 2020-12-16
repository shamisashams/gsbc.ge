<?php

namespace App\Http\Controllers\Admin;

use App\Http\Request\Admin\DictionaryRequest;
use App\Models\Dictionary;
use App\Models\Localization;
use App\Services\DictionaryService;
use Illuminate\Http\Request;

class DictionaryController extends AdminController
{
    protected $service;

    public function __construct(DictionaryService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($locale, Request $request)
    {
        $request->validate([
            'key' => 'string|max:255|nullable',
        ]);

        $langs = Localization::all();
        return view('admin.modules.dictionary.index', ['dictionaries' => $this->service->getAll($locale, $request), 'locale'=>$locale,'langs'=>$langs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DictionaryRequest $request, $locale)
    {
        $data = $request->only([
            'key',
            'module',
            'translates'
        ]);
        
        $this->service->store($locale, $data);

        return redirect()->route('DictionaryIndex', compact('locale'));
    }
    
    public function show($locale, $id)
    {
        $langs = Localization::all();
        return view('admin.modules.dictionary.show', ['language' => $this->service->find($id), 'locale'=>$locale,'langs'=>$langs]);
    }
    public function edit($locale, $id)
    {
        $langs = Localization::all();
        return view('admin.modules.dictionary.edit', ['language' => $this->service->find($id), 'locale'=>$locale,'langs'=>$langs]);
    }
    public function create($locale)
    {
        $langs = Localization::all();
        return view('admin.modules.dictionary.create', ['locale'=>$locale,'langs'=>$langs]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dictionary  $dictionary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $locale, $id)
    {
        
        $data = $request->only([
            'module',
            'translates'
        ]);   
        $this->service->update($id,$data);

        return redirect()->route('DictionaryIndex', compact('locale'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dictionary  $dictionary
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale, $id)
    {
        $this->service->delete($id);
        return redirect()->back();
    }
}

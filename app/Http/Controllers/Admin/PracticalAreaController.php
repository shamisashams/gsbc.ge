<?php
/**
 *  app/Http/Controllers/Admin/PracticalAreaController.php
 *
 * User:
 * Date-Time: 25.01.21
 * Time: 11:43
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */

namespace App\Http\Controllers\Admin;

use App\Http\Request\Admin\PracticalAreaRequest;
use App\Services\PracticalAreaService;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class PracticalAreaController extends AdminController
{
    protected $service;

    public function __construct(PracticalAreaService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @param string $lang
     * @param Request $request
     *
     * @return Application|Factory|View|Response
     * @throws Exception
     */
    public function index(string $lang, Request $request)
    {
        $request->validate([
            'id' => 'integer|nullable',
            'title' => 'string|max:255|nullable',
            'description' => 'string|max:255|nullable',
        ]);

        return view('admin.modules.practical-area.index', [
            'practicalAreas' => $this->service->getAll($lang, $request)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param string $lang
     *
     * @return Application|Factory|View|Response
     */
    public function create(string $lang)
    {
        return view('admin.modules.practical-area.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param string $locale
     * @param PracticalAreaRequest $request
     *
     * @return Application|RedirectResponse|Response|Redirector
     * @throws Exception
     */
    public function store(string $locale, PracticalAreaRequest $request)
    {
        if (!$this->service->store($locale, $request)) {
            return redirect(route('practicalAreaCreate', $locale))->with('danger', __('admin.failed_created_practical_area'));
        }
        return redirect(route('practicalAreaIndex', $locale))->with('success', __('admin.successfully_created_practical_area'));
    }

    /**
     * Display the specified resource.
     *
     * @param string $locale
     * @param int $id
     *
     * @return Application|Factory|View|Response
     */
    public function show(string $locale, int $id)
    {
        return view('admin.modules.practical-area.show', [
            'practicalArea' => $this->service->find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $locale
     * @param int $id
     *
     * @return Application|Factory|View|Response
     */
    public function edit(string $locale, int $id)
    {
        return view('admin.modules.practical-area.update', [
            'practicalArea' => $this->service->find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param string $locale
     * @param PracticalAreaRequest $request
     * @param int $id
     *
     * @return Application|RedirectResponse|Response|Redirector
     * @throws Exception
     */
    public function update(string $locale, PracticalAreaRequest $request, int $id)
    {
        if (!$this->service->update($locale, $id, $request)) {
            return redirect(route('practicalAreaEditView', $locale))->with('danger',  __('admin.failed_updated_practical_area'));
        }

        return redirect(route('practicalAreaIndex', $locale))->with('success', __('admin.successfully_updated_practical_area'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $locale
     * @param int $id
     *
     * @return Application|RedirectResponse|Response|Redirector
     * @throws Exception
     */
    public function destroy(string $locale, int $id)
    {
        if (!$this->service->delete($id)) {
            return redirect(route('practicalAreaIndex', $locale))->with('danger', __('admin.failed_deleted_practical_area'));
        }
        return redirect(route('practicalAreaIndex', $locale))->with('success', __('admin.successfully_deleted_practical_area'));
    }
}

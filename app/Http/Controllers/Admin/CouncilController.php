<?php
/**
 *  app/Http/Controllers/Admin/CouncilController.php
 *
 * User:
 * Date-Time: 25.01.21
 * Time: 12:39
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */

namespace App\Http\Controllers\Admin;

use App\Http\Request\Admin\CouncilRequest;
use App\Models\PracticalArea;
use App\Services\CouncilService;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class CouncilController extends AdminController
{
    protected $service;

    public function __construct(CouncilService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @param string $locale
     * @param Request $request
     *
     * @return Application|Factory|View|Response
     */
    public function index(string $locale, Request $request)
    {
        $request->validate([
            'id' => 'integer|nullable',
            'title' => 'string|max:255|nullable',
            'description' => 'string|max:255|nullable',
        ]);

        return view('admin.modules.council.index', [
            'councils' => $this->service->getAll($locale, $request)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $practicalAreas = PracticalArea::all();

        return view('admin.modules.council.create', [
            'practicalAreas' => $practicalAreas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param string $locale
     * @param CouncilRequest $request
     *
     * @return Application|RedirectResponse|Response|Redirector
     * @throws Exception
     */
    public function store(string $locale, CouncilRequest $request)
    {
        if (!$this->service->store($locale, $request)) {
            return redirect(route('councilCreate', $locale))->with('danger', __('admin.failed_created_council'));
        }
        return redirect(route('councilIndex', $locale))->with('success', __('admin.successfully_created_council'));
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
        return view('admin.modules.council.show', [
            'council' => $this->service->find($id)
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
        $council = $this->service->find($id);

        $practicalAreas = PracticalArea::all();

        $councilPracticalAreas = $council->practicalAreas()->select('id')->get()->toArray();
        return view('admin.modules.council.update', [
            'council' => $this->service->find($id),
            'practicalAreas' => $practicalAreas,
            'councilPracticalAreas' => $councilPracticalAreas
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param string $locale
     * @param CouncilRequest $request
     * @param int $id
     *
     * @return Application|RedirectResponse|Response|Redirector
     * @throws Exception
     */
    public function update(string $locale, CouncilRequest $request, int $id)
    {
        if (!$this->service->update($locale, $id, $request)) {
            return redirect(route('councilEditView', [$locale,$id]))->with('danger',  __('admin.failed_updated_council'));
        }

        return redirect(route('councilIndex', $locale))->with('success', __('admin.successfully_updated_council'));
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
            return redirect(route('councilIndex', $locale))->with('danger', __('admin.failed_deleted_council'));
        }
        return redirect(route('councilIndex', $locale))->with('success', __('admin.successfully_deleted_council'));
    }
}

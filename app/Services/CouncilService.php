<?php
/**
 *  app/Services/CouncilService.php
 *
 * User:
 * Date-Time: 25.01.21
 * Time: 12:56
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */

namespace App\Services;

use App\Http\Request\Admin\CouncilRequest;
use App\Models\Council;
use App\Models\CouncilLanguage;
use App\Models\Localization;
use App\Models\PracticalArea;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\throwException;

class CouncilService
{
    protected $model;

    protected $perPageArray = [10, 20, 30, 50, 100];

    public function __construct(Council $model)
    {
        $this->model = $model;
    }

    /**
     * Get Council by id.
     *
     * @param int $id
     *
     * @return Council
     */
    public function find(int $id): Council
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Get Council by slug.
     *
     * @param string $slug
     *
     * @return Council
     */
    public function findBySlug(string $slug): Council
    {
        return $this->model->where('slug',$slug)->firstOrFail();
    }

    /**
     * Get Councils.
     *
     * @param string $lang
     *
     * @return LengthAwarePaginator
     * @throws Exception
     */
    public function getAll(string $lang, $request): LengthAwarePaginator
    {
        $data = $this->model->query();

        $localizationID = Localization::getIdByName($lang);

        if ($request->id) {
            $data = $data->where('id', $request->id);
        }

        if ($request->first_name) {
            $data = $data->with('language')->whereHas('language', function ($query) use ($localizationID, $request) {
                $query->where('first_name', 'like', "%{$request->first_name}%")->where('language_id', $localizationID);
            });
        }

        if ($request->last_name) {
            $data = $data->with('language')->whereHas('language', function ($query) use ($localizationID, $request) {
                $query->where('last_name', 'like', "%{$request->last_name}%")->where('language_id', $localizationID);
            });
        }

        if ($request->position) {
            $data = $data->with('language')->whereHas('language', function ($query) use ($localizationID, $request) {
                $query->where('position', 'like', "%{$request->position}%")->where('language_id', $localizationID);
            });
        }

        // Check if perPage exist and validation by perPageArray [].
        $perPage = ($request->per_page != null && in_array($request->per_page, $this->perPageArray)) ? $request->per_page : 10;

        return $data->orderBy('id', 'DESC')->paginate($perPage);
    }


    /**
     * Create PracticalArea item into db.
     *
     * @param string $lang
     * @param CouncilRequest $request
     *
     * @return bool
     * @throws Exception
     */
    public function store(string $lang, CouncilRequest $request): bool
    {

        $localizationID = Localization::getIdByName($lang);

        $this->model = new Council([
            'slug' => $request['slug'],
            'email' => $request['email'],
            'phone' => $request['phone']
        ]);

        $this->model->save();

        $this->model->language()->create([
            'council_id' => $this->model->id,
            'language_id' => $localizationID,
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'position' => $request['position'],
            'biography' => $request['biography'],
        ]);

        if ($request->practical_areas != null) {
            $this->model->practicalAreas()->attach($request->practical_areas);
        }

        $model = $this->model;
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $file) {
                $imagename = date('Ymhs') . $file->getClientOriginalName();
                $destination = base_path() . '/storage/app/public/council/' . $this->model->id;
                $request->file('images')[$key]->move($destination, $imagename);
                $model->files()->create([
                    'name' => $imagename,
                    'path' => '/storage/app/public/council/' . $model->id,
                    'format' => $file->getClientOriginalExtension(),
                ]);
            }
        }


        return true;
    }

    /**
     * Update Council item.
     *
     * @param string $lang
     * @param int $id
     * @param CouncilRequest $request
     *
     * @return bool
     * @throws Exception
     */
    public function update(string $lang, int $id, CouncilRequest $request): bool
    {
        $data = $this->find($id);


        $localizationID = Localization::getIdByName($lang);

        $data->update([
            'slug' => $request['slug'],
            'email' => $request['email'],
            'phone' => $request['phone']
        ]);

        $councilLanguage = CouncilLanguage::where(['council_id' => $data->id, 'language_id' => $localizationID])->first();

        if ($councilLanguage == null) {
            $data->language()->create([
                'council_id' => $data->id,
                'language_id' => $localizationID,
                'first_name' => $request['first_name'],
                'last_name' => $request['last_name'],
                'position' => $request['position'],
                'biography' => $request['biography'],
            ]);
        } else {
            $councilLanguage->first_name = $request['first_name'];
            $councilLanguage->last_name = $request['last_name'];
            $councilLanguage->position = $request['position'];
            $councilLanguage->biography = $request['biography'];
            $councilLanguage->save();
        }
        $data->practicalAreas()->detach();

        if ($request->practical_areas != null) {
            $data->practicalAreas()->attach($request->practical_areas);
        }

        if (count($data->files) > 0) {
            foreach ($data->files as $file) {
                if ($request['old_images'] == null) {
                    $file->delete();
                    continue;
                }
                if (!in_array($file->id, $request['old_images'])) {
                    if (Storage::exists('public/council/' . $data->id . '/' . $file->name)) {
                        Storage::delete('public/council/' . $data->id . '/' . $file->name);
                    }
                    $file->delete();

                }
            }
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $file) {
                $imagename = date('Ymhs') . $file->getClientOriginalName();
                $destination = base_path() . '/storage/app/public/council/' . $data->id;
                $request->file('images')[$key]->move($destination, $imagename);
                $data->files()->create([
                    'name' => $imagename,
                    'path' => '/storage/app/public/council/' . $data->id,
                    'format' => $file->getClientOriginalExtension(),
                ]);
            }
        }

        return true;
    }

    /**
     * Create localization item into db.
     *
     * @param int $id
     *
     * @return bool
     * @throws Exception
     */
    public function delete(int $id): bool
    {
        $data = $this->find($id);
        $data->practicalAreas()->detach();
        if (count($data->language) > 0) {
            if (!$data->language()->delete()) {
                throwException('Council languages can not delete.');
            }
        }


        if (count($data->files) > 0) {
            if (Storage::exists('public/council/' . $data->id)) {
                Storage::deleteDirectory('public/council/' . $data->id);
            }
            $data->files()->delete();
        }
        if (!$data->delete()) {
            throwException('Council  can not delete.');
        }
        return true;
    }
}

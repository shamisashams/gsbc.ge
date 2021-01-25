<?php
/**
 *  app/Services/PracticalAreaService.php
 *
 * User: 
 * Date-Time: 25.01.21
 * Time: 11:45
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */
namespace App\Services;

use App\Http\Request\Admin\PracticalAreaRequest;
use App\Models\Localization;
use App\Models\PracticalArea;
use App\Models\PracticalAreaLanguage;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use function PHPUnit\Framework\throwException;

class PracticalAreaService
{
    protected $model;

    protected $perPageArray = [10, 20, 30, 50, 100];

    public function __construct(PracticalArea $model)
    {
        $this->model = $model;
    }

    /**
     * Get PracticalArea by id.
     *
     * @param int $id
     * @return PracticalArea
     */
    public function find(int $id): PracticalArea
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Get Features.
     *
     * @param string $lang
     * @param $request
     *
     * @return LengthAwarePaginator
     * @throws Exception
     */
    public function getAll(string $lang,$request): LengthAwarePaginator
    {
        $data = $this->model->query();

        $localizationID = Localization::getIdByName($lang);

        if ($request->id) {
            $data = $data->where('id',$request->id);
        }

        if ($request->title) {
            $data = $data->with('language')->whereHas('language', function ($query) use ($localizationID, $request) {
                $query->where('title','like',"%{$request->title}%")->where('language_id',$localizationID);
            });
        }

        if ($request->description) {
            $data = $data->with('language')->whereHas('language', function ($query) use ($localizationID, $request) {
                $query->where('description','like',"%{$request->description}%")->where('language_id',$localizationID);
            });
        }

        // Check if perPage exist and validation by perPageArray [].
        $perPage = ($request->per_page != null && in_array($request->per_page,$this->perPageArray)) ? $request->per_page : 10;

        return $data->orderBy('id', 'DESC')->paginate($perPage);
    }


    /**
     * Create PracticalArea item into db.
     *
     * @param string $lang
     * @param PracticalAreaRequest $request
     *
     * @return bool
     * @throws Exception
     */
    public function store(string $lang, PracticalAreaRequest $request): bool
    {

        $localizationID = Localization::getIdByName($lang);

        $this->model = new PracticalArea();

        $this->model->save();

        $this->model->language()->create([
            'practical_area_id' => $this->model->id,
            'language_id' => $localizationID,
            'title' => $request['title'],
            'description' => $request['description'],
        ]);

        return true;
    }

    /**
     * Update PracticalArea item.
     *
     * @param string $lang
     * @param int $id
     * @param PracticalAreaRequest $request
     *
     * @return bool
     * @throws Exception
     */
    public function update(string $lang,int $id, PracticalAreaRequest $request): bool
    {
        $data = $this->find($id);

        $localizationID = Localization::getIdByName($lang);

        $practicalAreaLanguage = PracticalAreaLanguage::where(['practical_area_id' => $data->id, 'language_id' => $localizationID])->first();

        if ($practicalAreaLanguage == null) {
            $data->language()->create([
                'practical_area_id' => $id,
                'language_id' => $localizationID,
                'title' => $request['title'],
                'description' => $request['description'],
            ]);
        } else {
            $practicalAreaLanguage->title = $request['title'];
            $practicalAreaLanguage->description = $request['description'];
            $practicalAreaLanguage->save();
        }

        return true;
    }

    /**
     * Create localization item into db.
     *
     * @param int $id
     * @return bool
     * @throws Exception
     */
    public function delete(int $id): bool
    {
        $data = $this->find($id);
        if (count($data->language) > 0) {
            if(!$data->language()->delete()){
                throwException('Practical Area languages can not delete.');
            }
        }
        if (!$data->delete()) {
            throwException('Practical Area  can not delete.');
        }
        return true;
    }
}

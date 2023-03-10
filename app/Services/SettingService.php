<?php
/**
 *  app/Services/SettingService.php
 *
 * User:
 * Date-Time: 18.12.20
 * Time: 10:42
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */

namespace App\Services;

use App\Models\Feature;
use App\Models\Localization;
use App\Models\Setting;
use App\Models\SettingLanguage;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class SettingService
{
    protected $model;

    protected $perPageArray = [10, 20, 30, 50, 100];

    public function __construct(Setting $model)
    {
        $this->model = $model;
    }

    /**
     * Get Page by id.
     *
     * @param int $id
     */
    public function find(int $id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Get Page.
     *
     * @param string $lang
     * @return LengthAwarePaginator
     * @throws \Exception
     */
    public function getAll(string $lang, $request)
    {
        $data = $this->model->query();

        $localizationID = Localization::getIdByName($lang);

        if ($request->id) {
            $data = $data->where('id', $request->id);
        }

        if ($request->key) {
            $data = $data->where('key', 'like', "%{$request->key}%");
        }

        if ($request->value) {
            $data = $data->with('language')->whereHas('language', function ($query) use ($localizationID, $request) {
                $query->where('value', 'like', "%{$request->value}%")->where('language_id', $localizationID);
            });
        }

        // Check if perPage exist and validation by perPageArray [].
        $perPage = ($request->per_page != null && in_array($request->per_page, $this->perPageArray)) ? $request->per_page : 10;

        return $data->orderBy('id', 'DESC')->paginate($perPage);
    }


    /**
     * Create Setting item into db.
     *
     * @param string $lang
     * @param array $request
     * @return bool
     */
    public function store(string $lang, array $request)
    {

        $localizationID = Localization::getIdByName($lang);


        $this->model = new Setting([
            'key' => $request['key'],
        ]);

        $this->model->save();

        $this->model->language()->create([
            'setting_id' => $this->model->id,
            'language_id' => $localizationID,
            'value' => $request['value']
        ]);

        return true;
    }

    /**
     * Update Setting item.
     *
     * @param string $lang
     * @param int $id
     * @param array $request
     * @return bool
     */
    public function update(string $lang, int $id, array $request)
    {
        $data = $this->find($id);
        $data->update([
            'key' => $request['key'],
        ]);

        $localizationID = Localization::getIdByName($lang);

        $featureLanguage = SettingLanguage::where(['setting_id' => $data->id, 'language_id' => $localizationID])->first();

        if ($featureLanguage == null) {
            $data->language()->create([
                'setting_id' => $this->model->id,
                'language_id' => $localizationID,
                'value' => $request['value']
            ]);
        } else {
            $featureLanguage->value = $request['value'];
            $featureLanguage->save();
        }

        return true;
    }

    public function getContactInfo($lang)
    {
        $localizationID = Localization::getIdByName($lang);

        $contact = Setting::whereHas('language', function ($query) use ($localizationID) {
            $query->where('language_id', $localizationID);
        })->orderBy('created_at')->get();
        return $contact;
    }

    public function facebook($lang)
    {
        $localizationID = Localization::getIdByName($lang);
        return Setting::where(['key' => 'facebook'])->whereHas('language', function ($query) use ($localizationID) {
            $query->where('language_id', $localizationID);
        })->first();
    }

    public function twitter($lang)
    {
        $localizationID = Localization::getIdByName($lang);
        return Setting::where(['key' => 'twitter'])->whereHas('language', function ($query) use ($localizationID) {
            $query->where('language_id', $localizationID);
        })->first();
    }

    public function behance($lang)
    {
        $localizationID = Localization::getIdByName($lang);
        return Setting::where(['key' => 'behance'])->whereHas('language', function ($query) use ($localizationID) {
            $query->where('language_id', $localizationID);
        })->first();

    }

    public function instagram($lang)
    {
        $localizationID = Localization::getIdByName($lang);
        return Setting::where(['key' => 'instagram'])->whereHas('language', function ($query) use ($localizationID) {
            $query->where('language_id', $localizationID);
        })->first();
    }

    public function street($lang)
    {
        $localizationID = Localization::getIdByName($lang);
        return Setting::where(['key' => 'street'])->whereHas('language', function ($query) use ($localizationID) {
            $query->where('language_id', $localizationID);
        })->first();
    }

    public function location($lang){
        $localizationID = Localization::getIdByName($lang);
        return Setting::where(['key' => 'location'])->whereHas('language', function ($query) use ($localizationID) {
            $query->where('language_id', $localizationID);
        })->first();
    }

    public function phone($lang){
        $localizationID = Localization::getIdByName($lang);
        return Setting::where(['key' => 'phone'])->whereHas('language', function ($query) use ($localizationID) {
            $query->where('language_id', $localizationID);
        })->first();
    }

    public function email($lang){
        $localizationID = Localization::getIdByName($lang);
        return Setting::where(['key' => 'contact_email'])->whereHas('language', function ($query) use ($localizationID) {
            $query->where('language_id', $localizationID);
        })->first();
    }


}

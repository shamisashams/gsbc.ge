<?php
/**
 *  app/Http/Controllers/Admin/SettingController.php
 *
 * User:
 * Date-Time: 18.12.20
 * Time: 11:06
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Request\Admin\FeatureRequest;
use App\Http\Request\Admin\PageRequest;
use App\Http\Request\Admin\SettingRequest;
use App\Models\Localization;
use App\Models\Setting;
use App\Services\PageService;
use App\Services\SettingService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class SettingController extends Controller
{
    protected $service;

    public function __construct(SettingService $service)
    {
        $this->service = $service;
    }

    public function index($lang)
    {
        $localizationID = Localization::getIdByName($lang);

        $contacts = $this->service->getContactInfo($localizationID);
        $facebook = $this->service->facebook($localizationID);
        $twitter = $this->service->twitter($localizationID);
        $behance = $this->service->behance($localizationID);
        $instagram = $this->service->instagram($localizationID);

        return view('frontend.modules.contact.index')
            ->with(
                ['contacts' => $contacts,
                    'facebook' => $facebook,
                    'twitter' => $twitter,
                    'behance' => $behance,
                    'instagram' => $instagram
                ]);

    }
}

<?php
/**
 *  app/Http/View/Composers/SettingComposer.php
 *
 * User:
 * Date-Time: 13.01.21
 * Time: 16:57
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */

namespace App\Http\View\Composers;

use App\Models\Category;
use App\Models\Localization;
use App\Models\Setting;
use App\Services\CategoryService;
use App\Services\SettingService;
use Illuminate\View\View;

class SettingComposer
{

    /**
     * Bind data to the view.
     *
     * @param View $view
     *
     * @return void
     */
    public function compose(View $view)
    {
        $lang = app()->getLocale();
        $serviceSetting = new SettingService(new Setting());
        $contacts = $serviceSetting->getContactInfo($lang);
        $facebook = $serviceSetting->facebook($lang);
        $twitter = $serviceSetting->twitter($lang);
        $behance = $serviceSetting->behance($lang);
        $instagram = $serviceSetting->instagram($lang);

        $street=$serviceSetting->street($lang);
        $location=$serviceSetting->location($lang);
        $phone=$serviceSetting->phone($lang);
        $email=$serviceSetting->email($lang);

        $view->with([
            'contacts' => $contacts,
            'facebook' => $facebook,
            'twitter' => $twitter,
            'behance' => $behance,
            'instagram' => $instagram,
            'street'=>$street,
            'location'=> $location,
            'phone'=> $phone,
            'email'=> $email,
        ]);

    }
}

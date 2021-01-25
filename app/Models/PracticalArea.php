<?php
/**
 *  app/Models/PracticalArea.php
 *
 * User: 
 * Date-Time: 25.01.21
 * Time: 12:07
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PracticalArea extends Model
{
    use HasFactory;

    public function language(): HasMany
    {
        return $this->hasMany(PracticalAreaLanguage::class, 'practical_area_id');
    }
    public function availableLanguage(): HasMany
    {
        return $this->language()->where('language_id', '=', Localization::getIdByName(app()->getLocale()));
    }
}

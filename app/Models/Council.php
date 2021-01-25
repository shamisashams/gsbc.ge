<?php
/**
 *  app/Models/Council.php
 *
 * User: 
 * Date-Time: 25.01.21
 * Time: 14:27
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Council extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug',
        'email',
        'phone'
    ];

    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'fileable');
    }
    public function language(): HasMany
    {
        return $this->hasMany(CouncilLanguage::class, 'council_id');
    }

    public function availableLanguage(): HasMany
    {
        return $this->language()->where('language_id','=', Localization::getIdByName(app()->getLocale()));
    }

    public function practicalAreas(): BelongsToMany
    {
        return $this->belongsToMany(PracticalArea::class, 'councils_practical_areas');
    }
}

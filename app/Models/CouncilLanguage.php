<?php
/**
 *  app/Models/CouncilLanguage.php
 *
 * User: 
 * Date-Time: 25.01.21
 * Time: 14:31
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouncilLanguage extends Model
{
    use HasFactory;
    protected $fillable = [
        'council_id',
        'language_id',
        'first_name',
        'last_name',
        'position',
        'biography'
    ];

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}

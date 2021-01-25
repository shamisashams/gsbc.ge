<?php
/**
 *  app/Models/PracticalAreaLanguage.php
 *
 * User: 
 * Date-Time: 25.01.21
 * Time: 12:09
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PracticalAreaLanguage extends Model
{
    use HasFactory;
    protected $table = 'practical_area_languages';
    protected $fillable = [
        'practical_area_languages',
        'language_id',
        'title',
        'description'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerLanguage extends Model
{
    use HasFactory;

    protected $table = 'banners_languages';

    protected $fillable = [
        'banner_id',
        'language_id',
        'header',
        'header_1',
        'header_2',
        'header_3',
        'text',
        'text_1',
        'text_2',
        'text_3',
    ];

    public function banner()
    {
        return $this->belongsTo('App\Models\Banner', 'banner_id');
    }

    public function language()
    {
        return $this->belongsTo('App\Models\Localization', 'language_id');
    }
}

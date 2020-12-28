<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    public function language()
    {
        return $this->hasMany('App\Models\BannerLanguage', 'banner_id');
    }
    public function availableLanguage()
    {
        return $this->language()->where('language_id', '=', Localization::getIdByName(app()->getLocale()));
    }

    public function files()
    {
        return $this->morphMany('App\Models\File', 'fileable');
    }

}

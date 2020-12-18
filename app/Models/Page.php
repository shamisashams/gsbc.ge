<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug',
        'status',
        'type',
        'created_at',
        'updated_at',
    ];
    public function language()
    {
        return $this->hasMany('App\Models\PageLanguage', 'page_id');
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

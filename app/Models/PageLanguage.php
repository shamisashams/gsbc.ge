<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageLanguage extends Model
{
    use HasFactory;

    protected $table = 'pages_languages';
    protected $fillable = [
        'page_id',
        'language_id',
        'title',
        'description',
        'body',
        'body_2'
    ];

    public function page()
    {
        return $this->belongsTo('App\Models\Page', 'page_id');
    }

    public function language()
    {
        return $this->belongsTo('App\Models\Localization', 'language_id');
    }


}

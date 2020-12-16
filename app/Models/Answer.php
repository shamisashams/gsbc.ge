<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $fillable = [
        'position',
        'status',
        'slug'
    ];
    public function language()
    {
        return $this->hasMany('App\Models\AnswerLanguage', 'answer_id');
    }
    public function feature()
    {
        return $this->hasOne('App\Models\FeatureAnswers', 'answer_id');
    }
    public function products()
    {
        return $this->hasMany('App\Models\ProductAnswers', 'answer_id');
    }

    public function availableLanguage() {
        return $this->language()->where('language_id','=', Localization::getIdByName(app()->getLocale()));
    }
}

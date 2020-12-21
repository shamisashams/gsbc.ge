<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberLanguage extends Model
{
    use HasFactory;
    protected $table = 'members_languages';

    protected $fillable = [
        'member_id',
        'language_id',
        'title',
        'description',
        'body'
    ];

    public function news()
    {
        return $this->belongsTo('App\Models\Member', 'member_id');
    }

    public function language()
    {
        return $this->belongsTo('App\Models\Localization', 'language_id');
    }
}

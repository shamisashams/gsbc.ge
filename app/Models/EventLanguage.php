<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventLanguage extends Model
{
    use HasFactory;
    protected $table = 'events_languages';

    protected $fillable = [
        'event_id',
        'language_id',
        'title',
        'description',
    ];

    public function event()
    {
        return $this->belongsTo('App\Models\Event', 'event_id');
    }

    public function language()
    {
        return $this->belongsTo('App\Models\Localization', 'language_id');
    }
}

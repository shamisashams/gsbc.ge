<?php

namespace App\Models;

use App\Traits\HasRolesAndPermissions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRolesAndPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'phone',
        'id_number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function language()
    {
        return $this->hasMany('App\Models\UserLanguage', 'user_id');
    }

    public function availableLanguage()
    {
        return $this->language()->where('language_id', '=', Localization::getIdByName(app()->getLocale()));
    }

    public function files()
    {
        return $this->morphMany('App\Models\File', 'fileable');
    }

    public function userRoles()
    {
        return $this->hasMany(UserRole::class, 'user_id');
    }
}

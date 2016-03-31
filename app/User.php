<?php

namespace App;

use Crypt;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'oauth_provider',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'token', 'github_id',
    ];

    public function logs()
    {
        return $this->hasMany(RevisionLog::class);
    }

    public function getTokenAttribute()
    {
        return Crypt::decrypt($this->attributes['token']);
    }

    public function setTokenAttribute($value)
    {
        $this->attributes['token'] = Crypt::encrypt($value);
    }
}

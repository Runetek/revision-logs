<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
    protected $hidden = ['updated_at'];

    protected $casts = [
        'id' => 'int',
    ];

    public function logs()
    {
        return $this->hasMany(RevisionLog::class);
    }
}

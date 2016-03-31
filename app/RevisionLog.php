<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RevisionLog extends Model
{
    protected $fillable = ['revision_id', 'body'];

    protected $casts = [
        'id' => 'int',
        'revision_id' => 'int',
        'user_id' => 'int',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

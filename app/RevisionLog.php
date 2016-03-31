<?php

namespace App;

use App\Events\LogPosted;
use Illuminate\Database\Eloquent\Model;

class RevisionLog extends Model
{
    protected $fillable = ['revision_id', 'body'];

    protected $casts = [
        'id' => 'int',
        'revision_id' => 'int',
        'user_id' => 'int',
    ];

    public static function boot()
    {
        static::created(function (RevisionLog $log) {
            event(new LogPosted($log));
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

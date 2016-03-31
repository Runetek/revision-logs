<?php

namespace App\Events;

use App\Events\Event;
use App\RevisionLog;
use Illuminate\Queue\SerializesModels;

class LogPosted extends Event
{
    use SerializesModels;

    /** @var RevisionLog */
    public $log;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(RevisionLog $log)
    {
        $this->log = $log;
    }
}

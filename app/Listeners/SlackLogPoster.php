<?php

namespace App\Listeners;

use Slack;
use App\Events\LogPosted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SlackLogPoster
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  LogPosted  $event
     * @return void
     */
    public function handle(LogPosted $event)
    {
        if (env('APP_ENV') !== 'production') {
            return;
        }

        $message = sprintf(
            '%s just posted a log for revision `%s`. Check it out: https://logs.runetek.io/revisions/%d/logs/%d',
            $event->log->user->username,
            $event->log->revision_id,
            $event->log->revision_id,
            $event->log->id
        );

        Slack::to('#updater-logs')
            ->send($message);
    }
}

<?php

namespace App\Listeners;

use App\Events\PostPublished;
use App\Mail\PostPublished as MailPostPublished;
use App\Models\UserSubscription;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailToSubscriber implements ShouldQueue
{
    /**
     * The name of the queue the job should be sent to.
     *
     * @var string|null
     */
    public $queue = 'listeners';

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
     * @param  \App\Events\PostPublished  $event
     * @return void
     */
    public function handle(PostPublished $event)
    {
        $subscribedUsers = UserSubscription::where('website_id', $event->post->website_id)->get();

        foreach ($subscribedUsers as $recipient) {
            Mail::to($recipient->email)
                ->send((new MailPostPublished($event->post))->onConnection('database'));
        }
    }
}

<?php

namespace App\Listeners;

use App\Events\JobPostedEvent;
use App\Mail\JobPosted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class JobPostedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(JobPostedEvent $event): void
    {
        Mail::to($event->job->employer->user)->queue(new JobPosted($event->job));
    }
}

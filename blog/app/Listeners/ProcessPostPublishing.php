<?php

namespace App\Listeners;

use App\Events\PostPublished;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProcessPostPublishing
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
    public function handle(PostPublished $event)
    {
    
        $post = $event->post;
       
        logger("Пост опубликован: {$post->title}");
    }
}

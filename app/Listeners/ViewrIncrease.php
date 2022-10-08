<?php

namespace App\Listeners;

use App\Events\EventViewer;
use App\Models\Video;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ViewrIncrease
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(EventViewer $event)
    {
        //update viewer
        $this->updateViewer($event->video);
    }

    //function to update viewer
    public function updateViewer($increaseViewer){
        //update using model
            //viewer the name of columns on Videos table
        $increaseViewer-> viewer = $increaseViewer-> viewer +1;

        $increaseViewer->save();

    }
}

<?php

namespace App\Http\Controllers\Youtub;

use App\Events\EventViewer;
use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class viewerController extends Controller
{
    //controller for event and listener

    public function viewer(){

        $viewer =Video::first();
        event(new EventViewer($viewer));
        return view('youtube.viewer',compact('viewer'));
    }
}

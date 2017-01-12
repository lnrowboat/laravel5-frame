<?php

namespace App\Http\Controllers;

use App;
use App\Jobs\ProcessPodcast;
use App\Jobs\SendReminderEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class PodcastController extends Controller {

    /**
     * Store a new podcast.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index($action='dont') {
        return call_user_func_array(array($this, $action), array());
    }
    
    public function dont() {
        return 'done';
    }
    
    public function store() {
        // Create podcast...
        //dispatch(new ProcessPodcast($podcast));
        $job = (new ProcessPodcast($podcast))->delay(Carbon::now()->addMinutes(10));

        dispatch($job);
    }
    
    public function sendmail()
    {
        $user = App::make('modelUser')->first();
        $job = (new SendReminderEmail($user))->onQueue('haha')->delay(60);
        //$job = (new SendReminderEmail($user));
        $this->dispatch($job);
        return $user;
    }
    
    public function justtest()
    {
        return 'nothing';
    }

}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Courses;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $mytime = Carbon::now();
        $events = app('App\Http\Controllers\EventController')->index($request);
        $lessons = app('App\Http\Controllers\LessonController')->getWeek($request, 42);


        $week = [[]];
        $day = 0;
        $lekts = 0;
        for($b = 1; $b < sizeof($lessons); $b++) {
            // dd(idate("d",strtotime($lessons[$b-1]["attributes"]["start"])) );

            if(idate("d",strtotime($lessons[$b-1]["attributes"]["start"]))  == idate("d",strtotime($lessons[$b]["attributes"]["start"])) ) {
                $week[$day][$lekts] = $lessons[$b-1]["attributes"];
                $week[$day][$lekts]["course"] = Courses::find($week[$day][$lekts]["course"])->title;
                $lekts++;
            }else {

                $day++;
                $lekts = 0;
            }


        }

        $data = [
            "time" =>  $mytime->toDateTimeString(),
            "events" => $events,
            "weeks" => $week,
            "id" =>  Auth::user()->id
        ];
        return view('home')->with($data);
    }
}

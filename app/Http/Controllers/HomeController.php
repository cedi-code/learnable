<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Courses;
use App\Events;

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


        $data = [
            "time" =>  $mytime->toDateTimeString(),
            "events" => $events,
            "weeks" => $this->getLessonToDays($request, 42), // $mytime->weekOfYear
            "id" =>  Auth::user()->id
        ];
        return view('home')->with($data);
    }

    public function showLesson(Request $request) {

        $data = [
            "weeks" => $this->getLessonToDays($request, 42),
            "id" =>  Auth::user()->id
        ];
        return view('lessonTable')->with($data);
    }



    private function getLessonToDays(Request $request,$weekNumber) {
        $lessons = app('App\Http\Controllers\LessonController')->getWeek($request, $weekNumber);

        $events = app('App\Http\Controllers\EventController')->index($request);


        $week = [[]];
        $day = 0;
        $lekts = 0;
        for($b = 1; $b < sizeof($lessons); $b++) {
            // dd(idate("d",strtotime($lessons[$b-1]["attributes"]["start"])) );

            if(idate("d",strtotime($lessons[$b-1]["attributes"]["start"]))  == idate("d",strtotime($lessons[$b]["attributes"]["start"])) ) {

                $week[$day][$lekts] = $lessons[$b-1]["attributes"];
                $week[$day][$lekts]["course"] = Courses::find($week[$day][$lekts]["course"])->title;
                $week[$day][$lekts]["events"] = array();
                // holt die events von der Lektion
                $ee = 0;
                for($eb = 0; $eb < sizeof($events); $eb++) {


                    if($events[$eb]["event"]["attributes"]["lesson"] == $lessons[$b-1]["attributes"]["id"]) {


                        array_push(   $week[$day][$lekts]["events"], $events[$eb]["event"]["attributes"]);
                        $ee++;
                    }

                }



                $lekts++;
            }else {
                $week[$day][$lekts] = $lessons[$b-1]["attributes"];
                $week[$day][$lekts]["course"] = Courses::find($week[$day][$lekts]["course"])->title;
                $week[$day][$lekts]["events"] = array();
                $ee = 0;
                for($eb = 0; $eb < sizeof($events); $eb++) {

                    if($events[$eb]["event"]["attributes"]["lesson"] == $lessons[$b-1]["attributes"]["id"]) {


                        array_push(   $week[$day][$lekts]["events"], $events[$eb]["event"]["attributes"]);
                        $ee++;

                    }

                }
                $day++;
                $lekts = 0;
            }


        }

        return $week;
    }
}

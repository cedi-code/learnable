<?php

namespace App\Http\Controllers;

use App\Classes;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
        $lessons = app('App\Http\Controllers\LessonController')->index($request);
        $classes = Classes::all();

        $data = [
            "time" =>  $mytime->toDateTimeString(),
            "events" => $events,
            "lessons" => $lessons,
            "classes" => $classes,
            "id" =>  Auth::user()->id
        ];
        return view('home')->with($data);
    }
}

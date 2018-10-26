<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Classes;
use App\Classmembers;


class ClassmemberViewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        $classmembers = app('App\Http\Controllers\ClassmemberController')->index($request);
        $classes = [];
        for($i = 0; $i < count($classmembers); $i++) {
            $classes[$i] = $classmembers[$i]["class"];
        }
        $fuu = [];
        for($m = 0; $m < count($classmembers[0]["members"]); $m++ ) {
            $fuu[$m] = User::find($classmembers[0]["members"][$m])[0];
        }

        return view('classmembers')->with('classes',$classes)->with('users',$fuu);
    }

}

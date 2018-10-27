<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events;
use App\Eventmembers;
use App\Event_types;
use App\User;

class EventViewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $events = app('App\Http\Controllers\EventController')->index($request);
        $eventOwner = Events::select('id','type', 'lesson','creator', 'title', 'description')->where("creator", $request->user()->id)->get();

        $eventMember = [];
        $eventsIsMember =  Eventmembers::select('event')->where("user", $request->user()->id)->get();
        foreach ($eventsIsMember as $event) {
            $eventMember[] = [
                'event' => Events::select('id','type', 'lesson','creator', 'title','description')->where("id", $event->event)->get()[0]
            ];

        }

        $data = [
            "eventsOwner" => $eventOwner,
            "eventsMember" => $eventMember,
            "id" =>  Auth::user()->id
        ];
        return view('eventlist')->with($data);
    }
    public function edit(Request $request,$id) {
        //dd(Eventmembers::select('user')->where("event", $id)->with('userdata')->get()[0]->userdata->email);
        $membersId = Eventmembers::select('user')->where("event", $id)->get();

        $members = [];

        for($u = 0; $u < count($membersId); $u++ ) {
            $members[$u] = User::find($membersId[$u]['user']);

        }

        $classmembers = app('App\Http\Controllers\ClassmemberController')->index($request);
        $fuu = [];
        for($m = 0; $m < count($classmembers[0]["members"]); $m++ ) {
            $fuu[$m] = User::find($classmembers[0]["members"][$m])[0];
        }

        $data = [
            "event" => Events::find($id),
            "types" => Event_types::select('type','id')->get(),
            "users" => $fuu,
            "members" => $members
        ];
        return view('editevent')->with($data);
    }
}

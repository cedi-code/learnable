<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events;
use App\Eventmembers;
use App\Event_types;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

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
        /*$membersId = Eventmembers::select('user')->where("event", $id)->get();

        $members = [];

        for($u = 0; $u < count($membersId); $u++ ) {
            $members[$u] = User::find($membersId[$u]['user']);

        }*/


        $data = [
            "eventsOwner" => $eventOwner,
            "eventsMember" => $eventMember,
            "id" =>  Auth::user()->id,
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

    public function update(Request $request,$id) {

        if(Events::find($id)->creator == $request->user()->id ||$request->user()->is_admin ) {


        // TODO bearbeite mues no gah vom Event!!!

        Events::where("id", $id)->update([
            'type' => $request->type,
            'lesson' => $request->lesson,
            'title' => $request->title,
            'description' => $request->description
        ]);

        $eventM = Eventmembers::select('user')->where("event", $id)->get();
        $newuid = explode(",", $request->members);
        if(count($newuid) != count($eventM) || !in_array($eventM[count($eventM)-1]->user, $newuid)) {

            // checks if a members is removed
            $olduid = [];
            for($m = 0; $m < count($eventM); $m++) {
                $olduid[$m] = $eventM[$m]->user;
                if(!in_array($olduid[$m], $newuid)) {
                    // TODO i ha no ka wiä me e clusterd primary key cha lösche....

                    $query = "DELETE FROM `eventmembers` WHERE `event`=$id AND `user`=$olduid[$m]";
                    DB::delete($query);
                }

            }

            // checks if a member is added!
            for($m = 0; $m < count($newuid); $m++ ) {
                if(!in_array($newuid[$m],$olduid )) {

                    $eventmember = new Eventmembers([
                        'user' => $newuid[$m],
                        'event' => $id

                    ]);
                    $eventmember->save();
                }

            }

            }
            return Redirect::route('home',  array('edit=ok'));
        }else {
            return null;
        }


    }
}

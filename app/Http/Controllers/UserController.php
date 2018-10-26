<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public $rules = array(
        'id' => 'required|int',
        'username' => 'required|string',
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'email' => 'required|string'
    );

    public function show(User $user) {
        return $user;
    }

    public function edit(User $user) {
        return view('edituser')->with('user',$user);
    }
    public function update(Request $request,$id) {
        $validator = Validator::make($request->all(), $this->rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        if($request->id !== $id) {
            return Redirect::back()->withErrors($validator);
        }


        $event_succ = User::where("id", $id)->update([
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email
        ]);

        return Redirect::back()->with($event_succ);
    }
}

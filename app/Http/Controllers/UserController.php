<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    protected $rules = array(
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

    public function editPW() {
        return view('auth.passwords.update');
    }

    public function updatePW(Request $request) {
        $this->validate($request, $this->rulesPW(), $this->validationErrorMessages());
        $filterdRequest = $this->credentials($request);
        $password =  Hash::make($filterdRequest['password']);
        User::where('id',Auth::user()->id)
            ->update(['password' => $password] );

        return Redirect::route('home',  array('pw=ok'));

    }

    protected function rulesPW()
    {
        return [
            'password' => 'required|confirmed|min:6',
        ];
    }
    protected function credentials(Request $request)
    {
        return $request->only(
             'password', 'password_confirmation' //, 'token'
        );
    }
    protected function validationErrorMessages()
    {
        return [];
    }
}

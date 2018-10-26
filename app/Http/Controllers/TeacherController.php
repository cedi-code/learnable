<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class TeacherController extends Controller
{
    public function index()
    {
        return User::where('is_teacher', 1)->get();
    }

    public function show(User $user) {
        if($user->is_teacher) {
            return $user;
        }else {
            return 0;
        }
    }
    public function table() {
        $teachers = User::where('is_teacher', 1)->get();

        return view('teachers')->with('teachers',$teachers);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        return view('user/index');
    }

    public function login(Request $req) {
        $userId = $req->input("user_id");
        $userPW = $req->input("password");
        
    }

    public function join() {
        return view('user/join');
    }

    public function insUser(Request $req) {
        $user = new User([
            "user_id" => $req->input("user_id"),
            "password" => $req->input("password"),
            "nicknm" => $req->input("nicknm"),
        ]);

        $user->save();
        return redirect('/users');
    }
}

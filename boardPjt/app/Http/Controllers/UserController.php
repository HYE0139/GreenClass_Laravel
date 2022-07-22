<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $req) {
        $id = $req->input('id');
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
        return redirect('user/login');
    }
}

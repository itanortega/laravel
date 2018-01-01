<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function show($username){
        $user = $this->findByUsername($username);
        
        return view('users.show', [
            'user' => $user,
        ]);
    }

    public function follows($username){
        $user = $this->findByUsername($username);
        
        return view('users.follows', [
            'user' => $user,
        ]);
    }

    public function follow($username, Request $request){
        $user = $this->findByUsername($username);

        $me = $request->user();
        $me->follows()->attach($user);
        return redirect('/users/'.$username)->withSuccess('Usuario seguido');
    }

    private function findByUsername($username){
        return User::where('username', $username)->first();
    }
}

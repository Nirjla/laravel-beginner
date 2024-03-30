<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Illuminate\Validation\ValidationException;
class SessionController extends Controller
{
    //
    public function create(){
        return view('sessions.create');
    }
    public function store(){
       $attributes = request()->validate(
            [
                'email'=>'required',
                'password'=>'required'
            ]
            );
            if(!auth()->attempt($attributes)){
                throw ValidationException::withMessages(['email'=>"Your provided credentials doesn't match"]);
            }
            session()->regenerate();
            return redirect('/')->with('success','Login Sucessfully');
    }
    public function destroy(){
        auth()->logout();
        return redirect('/')->with('success','Logout Sucessfully');
    }

}

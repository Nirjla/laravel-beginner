<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\User;
class RegisterController extends Controller
{
    //
    public function create(){

        return view('register.create');
    }
    public function store(){
        // dd( request()->all());
       $atrributes= request()->validate([
            'name'=>'required|max:255',
            'username'=>'required|min:7|max:255',
            'username'=>['required','min:7','max:255',Rule::unique('users','username')],
            'email'=>'required|email',
            'password'=>'required|min:7|max:255'
            //or 'pasword'=>['required','min:7','max:255']
        ]);
        // dd($atrributes);
        // dd('Succesful Valdation');
        // dd($errors->all());
       $user= User::create($atrributes);
        //log the created user
        auth()->login($user);
        // session()->flash('success','Your account has been created successfully');
        return redirect('/')->with('success','Your account has been created successfully');
    }
}

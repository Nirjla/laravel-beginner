<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Newsletter;
class NewsletterController extends Controller
{
    //
    public function __invoke(Newsletter $newsletter) {
        request()->validate([
            'email'=>'required|email',
        ]);
        try{
            $newsletter->subscribe(request('email'));
        }
        catch(Exception $e){
            throw \Illuminate\Validation\ValidationException::withMessages([
             'email'=>'This email could not be added to our newsletter lists.'
            ]); 
         }
        return back()->with('success','You have subscribed the newsletter');
    }
}

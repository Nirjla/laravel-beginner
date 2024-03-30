<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
   protected $with =['user'];
    use HasFactory;
    protected $guarded = [''];
    
    public function post(){
        return $this->belongsTo(Post::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    // or 
    // public function author(){  
        //therefor the name of method is imp
        // here laravel automatically think sthat it is auther_id 
    //     return $this->belongsTo(User::class,'user_id');
    // }
}

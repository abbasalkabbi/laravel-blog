<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class post extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
        
    }
    
    function isliked(){
        if(Auth::check()){
            $like=like::Where([['user_id',auth()->user()->id],['post_id',$this->id]])->first();
            if($like == null ){
                return false;
            }else{
                return true;
            }
        }
        return false;
    }
    public function like(){
        return $this->hasMany(like::class);
    }
    function isunliked(){
        if(Auth::check()){
            $unlike=unlike::Where([['user_id',auth()->user()->id],['post_id',$this->id]])->first();
            if($unlike == null ){
                return false;
            }else{
                return true;
            }
        }
        return false;
        
    }
    public function unlike(){
        return $this->hasMany(unlike::class);
    }
}

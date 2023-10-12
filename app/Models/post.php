<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
        
    }
    function isliked(){
        $like=like::Where([['user_id',auth()->user()->id],['post_id',$this->id]])->first();
        if($like == null ){
            return false;
        }else{
            return true;
        }
    }
    public function like(){
        return $this->hasMany(like::class);
    }
    function isunliked(){
        $unlike=unlike::Where([['user_id',auth()->user()->id],['post_id',$this->id]])->first();
        if($unlike == null ){
            return false;
        }else{
            return true;
        }
    }
    public function unlike(){
        return $this->hasMany(unlike::class);
    }
}

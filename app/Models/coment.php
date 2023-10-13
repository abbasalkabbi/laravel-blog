<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coment extends Model
{
    use HasFactory;
    protected $fillable = [
        'des',
        'user_id',
        'post_id',
    ];
    public function post(){
        return $this->belongsTo(post::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}

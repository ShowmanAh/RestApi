<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   protected $fillable = ['title','body'];
    public function user(){
        return $this->belongsTo(User::class,'user_id', 'id');
    }
    public function reviews(){
        return $this->hasMany(Review::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['comment'];
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id', 'id');
    }
    public function posts(){
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }
}

<?php

namespace App;
use App\Notifications\PasswordResetNotification;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */

    public function tasks(){
        return $this->hasMany(Task::class);
    }
    public function posts(){
        return $this->hasMany(Post::class);
    }
    public function reviews(){
        return $this->hasMany(Review::class);
    }
    //calling notification forget password
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordResetNotification($token));
    }
}

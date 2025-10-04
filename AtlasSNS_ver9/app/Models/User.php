<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'icon_image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function register(){
        return $this->hasMany('App\Models\register');
    }

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    public function follow($user_id){
        return $this->follows()->attach($user_id);
    }
    public function unfollow($user_id){
        return $this->follows()->detach($user_id);
    }
    public function isFollowing($user_id){
        return (bool)$this->follows()->where('followed_id',$user_id)->exists();
    }
     public function isFollowed($user_id){
         return (bool)$this->follower()->where('following_id',$user_id)->exists();
     }

    public function follows(){
        return $this->belongsToMany('App\Models\User', 'follows', 'following_id', 'followed_id');
    }
     public function follower(){
        return $this->hasMany('App\Models\User', 'follows', 'followed_id', 'following_id');
    }

     public function followings(){
        return $this->belongsToMany(User::class, 'follows', 'following_id', 'followed_id');
    }
     public function followers(){
        return $this->belongsToMany(User::class, 'follows', 'followed_id', 'following_id');
    }
}

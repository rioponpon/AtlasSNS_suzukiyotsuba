<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    // protected $table = 'follows';
     protected $fillable = [
        'following_id',
        'followed_id',
    ];

   public function user()
    {
        return $this->hasMany('App\Models\User');
    }
public function followings()
    {
        return $this->belongsToMany('App\Models\Follow', 'follows', 'following_id', 'followed_id');
    }
    public function followers()
    {
        return $this->belongsToMany('App\Models\Follow', 'follows', 'following_id', 'followed_id');
    }

    public function follow(User $data){
      $this->followings()->attach($data->id);
    }

     public function unfollow(User $data){
      $this->followings()->detach($data->id);
    }

    public function isFollowing()
    {
        return $this->followings()->where('following_id',$data->id)->exists();
    }


public function follower()
    {
        return $this->belongsToMany(User::class,'follower_id');
    }
    public function followed()
    {
        return $this->belongsToMany( User::class,'followed_id');
    }

    public function followList(){
      $user = auth()->user();
      $following_id = $user->following()->pluck($data->id);

     $posts=Post::get();

     $followings = $user->following;
     return view('follows.followList', compact('posts','followings'));
    }
}

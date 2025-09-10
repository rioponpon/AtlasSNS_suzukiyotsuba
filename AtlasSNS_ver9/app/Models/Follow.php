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
        return $this->following()->where('following_id',$data->id)->exists();
    }

    public function getFollowCount($user_id)
    {
        return $this->following()->where('following_id',$user_id)->count();
    }

     public function getFollowerCount($user_id)
    {
        return $this->following()->where('followed_id',$user_id)->count();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Follow;

class FollowsController extends Controller
{
    //
    // public function followList(){
    //     return view('follows.followList');
    // }
    public function followerList(){
        return view('follows.followerList');
    }


public function show()
{
    $posts = post::get();
    return view('follows.followlist', compact('posts'));
}

public function unfollow(User $user)
{
    //フォローしているのか

    $follower =auth()->user();
    $is_following = $follower->isFollowed($user);
dd($is_following);

    if ($is_following){

        $loggedInUserId = auth()->user()->id;
         $followedUserId = $user->id;

        Follow::where([
            ['followed_id' =>$followedUserId],
            ['following_id' => $loggedInUserId],
        ])
        ->delete();
        }
    return back();
}

public function follow(User $user)
{
 $follower =auth()->user();
    $is_following = $follower->isFollowing($user);

    if(! $is_following){
        $loggedInUserId = auth()->user()->id;

         $followedUserId = $user->id;

        Follow::create([
            'following_id' => $loggedInUserId,
            'followed_id' => $followedUserId,
        ]);
        return back();
    }
}
public function followList(){
    return view('follow.followerList');
}

}

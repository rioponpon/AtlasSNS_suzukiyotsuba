<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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

public function unfollow($user)
{
    //フォローしているのか
    $follower =auth()->user();
    $is_following = $follower->isFollowing($user);

    if ($is_following){

        $loggedInUserId = auth()->user()->id;

        Follow::where([
            ['followed_id', "=",$userid],
            ['following_id', '=', $loggedInUserId],
        ])
        ->delete();
        }
    return redirect('/search');
}

public function follow(User $user)
{
 $follower =auth()->user();
    $is_following = $follower->isFollowing($user);

    if($is_following){
        $loggedInUserId = auth()->user()->id;

        $followedUser = User::find($user);
        $followedUserId = $followedUser->id;

        Follow::create([
            'following_id' => $loggedInUserId,
            'followed_id' => $followedUserId,
        ]);
        return redirect('/search');
    }
}
public function followList(){
    return view('follow.followerList');
}

}

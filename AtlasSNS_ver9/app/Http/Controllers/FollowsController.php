<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Follow;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

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
    $follower->unfollow($user->id);
//     $is_following = $follower->isFollowed($user);
// dd($is_following);

//     if ($is_following){

//         $loggedInUserId = auth()->user()->id;
//          $followedUserId = $user->id;

//         Follow::where([
//             ['followed_id' =>$followedUserId],
//             ['following_id' => $loggedInUserId],
//         ])
//         ->delete();
//         }
    return back();
}

public function follow(User $user)
{
    $follower =auth()->user();
    $follower->follow($user->id);
//  $follower =auth()->user();
//     $is_following = $follower->isFollowing($user);

//     if(! $is_following){
//         $loggedInUserId = auth()->user()->id;

//          $followedUserId = $user->id;

//         Follow::create([
//             'following_id' => $loggedInUserId,
//             'followed_id' => $followedUserId,
//         ]);
        return back();
    // }
}

public function index(){
        $posts=Post::get();
        return view('posts.index',['posts'=>$posts]);
    }

public function followList()
    {
        // フォローしているユーザーのidを取得
       $following_id = Auth::user()->follows()->pluck('followed_id');

         $followings = User::whereIn('id', $following_id)->get();
        // dd($following_id);
        return view('/follows/followList' , ['followings' => $followings]);
    }



//  public function followList()
//     {
//      $following_id = Auth::user()
//       ->pluck('followed_id');
//      $posts =Post::with('user')->whereIn
//       ('user_id',$following_id)->latest()->get;
//      return view('follows.followList',
//       ['follows'=>$follows,'posts' =>$posts]);
//     }

//  public function followerList(){
//      return view('follows.followerList');
//  }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\User;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    //
    public function index(){
        $list=Post::get();
        return view('posts.index',['list'=>$list]);
    }

    public function postCreate(Request $request){
        $request->validate([
            'newpost' => 'required|string|min:1|max:150',
        ]);
      Post::create([

        'user_id' => Auth::id(),
        'post' => $request->input('newpost'),

      ]);
        return redirect('/top');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
    public function index(){
        return view('posts.index');
    }

    public function postCreate(Request $request){
        $request->validate([
            'newpost' => 'required|string|max:255',
        ]);
        $post=$request->input('newpost');
        $user_id=Auth::user()->id;
        // dd($user_id);
        Post::create([
            'user_id'=>$user_id,
            'post'=>$post,
        ]);
        return redirect('/top');
    }
}

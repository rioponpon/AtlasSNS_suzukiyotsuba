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
        $post=$request->input('newpost');
        $user_id=Auth::user()->id;
        dd($user_id);
        post::create([
            'user_id'=>$user_id,
            'post'=>$post
        ]);
        return redirect('/top');
    }
}

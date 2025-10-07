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
        $user = auth()->user();

        $following_id= $user->followings()->pluck('users.id')->toArray();
        $id = array_merge($following_id,[$user->id]);
        $posts=Post::whereIn('user_id',$id)
        ->orderBy('created_at','desc')
        ->get();
        return view('posts.index',['posts'=>$posts]);
    }

    public function postCreate(Request $request){//投稿作成
        $request->validate([
            'newpost' => 'required|string|min:1|max:150',
        ]);
      Post::create([

        'user_id' => Auth::id(),
        'post' => $request->input('newpost'),

      ]);
        return redirect('/top');
    }
    public function update(Request $request)
    {
         $request->validate([
            'newpost' => 'required|string|min:1|max:150',
        ]);
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        $user_id = Auth::id();
        // dd($id,$up_post,$user_id);

        Post::where('id',$id)->update([
            'post' => $up_post,
        ]);
        return redirect('/top');
    }

    public function delete($id){

        Post::where('id',$id)->delete();
        return redirect('/top');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function profile(){
        return view('profiles.profile');
    }
     public function index(){
        $posts=Post::get();
        $posts = Post::with('user')->whereIn('user_id')->orderBy('created_at','desc')->get();
        return view('posts.index',['posts'=>$posts]);
    }

}

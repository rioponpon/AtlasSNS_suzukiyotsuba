<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\register;

class UsersController extends Controller
{
    //
    public function search(){
        return view('users.search');
    }
    public function users(){
        return view('users.search');
    }
    public function registerForm()
    {
        return view('registerForm');
    }

    public function register(Request $request)
    {
        $request->validate([
            'UserName' => ['required', 'string', 'min:2', 'max:12'],
            'email' => [
                'required',//入力必須
                'email:rfc,dns',//メールアドレス形式
                'min:5',//最低
                'max:40',//最高
                'unique:users,email',//登録ずみ不可
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:20',
                'regex:/^[a-zA-Z0-9]+$/', // 英数字のみ
                'confirmed',              // password_confirmation と一致しているか
            ],
        ]);
        User::create([
            'username' => $request->input('UserName'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
        return back();
    }
    }

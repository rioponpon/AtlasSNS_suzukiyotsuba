<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => ['required', 'string', 'min:2', 'max:12'],
            'email' => [
                'required',//入力必須
                'mail_address' => 'email',//メールアドレス形式
                'min:5',//最低
                'max:40',//最高
                'unique:users,email',//登録ずみ不可
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:20',
                'alpha_num', // 英数字のみ
                'password' => 'confirmed:password',  // password_confirmation と一致しているか
            ],
             ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect() ->route('added')->with('username',$request->username);
    }

    public function added(): View
    {
        $username = session('username');
        return view('auth.added',['username' => $username]);
    }
}

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
                'regex:/^[a-zA-Z0-9]+$/', // 英数字のみ
                'password' => 'confirmed:password',  // password_confirmation と一致しているか
            ],
        ],[
 'username.required' => 'ユーザー名は必須です。',
        'username.min' => 'ユーザー名は2文字以上で入力してください。',
        'username.max' => 'ユーザー名は12文字以内で入力してください。',

        'email.required' => 'メールアドレスは必須です。',
        'email.email' => '正しいメールアドレス形式で入力してください。',
        'email.min' => 'メールアドレスは5文字以上で入力してください。',
        'email.max' => 'メールアドレスは40文字以内で入力してください。',
        'email.unique' => 'このメールアドレスはすでに登録されています。',
  'password.required' => 'パスワードは必須です。',
        'password.min' => 'パスワードは8文字以上で入力してください。',
        'password.max' => 'パスワードは20文字以内で入力してください。',
        'password.regex:/^[a-zA-Z0-9]+$/' => 'パスワードは半角英数字のみで入力してください。',
        'password.confirmed' => 'パスワード確認が一致しません。',

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

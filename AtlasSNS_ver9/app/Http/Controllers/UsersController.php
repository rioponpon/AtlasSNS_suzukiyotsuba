<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\register;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\validation\Rule;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //
    // public function search(){
    //     return view('users.search');
    // }
    public function users(){
        return view('users.search');
    }
    public function registerForm()
    {
        return view('users.registerForm');
    }

    public function register(Request $request)
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
            'Password' => [
                'required',
                'string',
                'min:8',
                'max:20',
                'alpha_num', // 英数字のみ
                'password' => 'confirmed:password',  // password_confirmation と一致しているか
            ],
        ]);
      User::create([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'Password' => Hash::make($request->input('password')),
        ]);
Auth::login($user);
        // return request()=>route(request.)
        return back();
        // return redirect()->route('added');
    }

//     public function search(){
//         $users = User::paginate(20);

//        return view('users.search')->with([
// 'users'=>$users,
// // 'keyword'=>$keyword
// ]);
//     }

    public function getIndex(Request $rq){
    $keyword = $rq->input('search');
    $query = \App\Student::query();

    if(!empty($search)){
        $query->orWhere('name','like','%'.$search.'%');
    }

    }
     public function index()
    {$users = User::paginate(20);

       return view('users.search')->with([
'users'=>$users,
// 'keyword'=>$keyword
]);
    }

    public function search(Request $request)
    {
        // 1つ目の処理
        $keyword = $request->input('search');
        // 2つ目の処理
        if(!empty($keyword)){
             $users = User::where('username','like', '%'.$keyword.'%')->get();
        }else{
             $users = User::all();
        }
        // 3つ目の処理
        return view('users.search',['users'=>$users]);
    }

    public function followList()
    {
        // フォローしているユーザーのidを取得
       $following_id = Auth::user()->follows()->pluck('followed_id');

         $followings = User::whereIn('id', $following_id)->get();
        // dd($following_id);
        return view('/follows/followList' , ['followings' => $followings]);
    }

    public function followerList()
    {
        // フォローされているユーザーのidを取得
       $follower_id = Auth::user()->followers()
       ->where('id','!=', Auth::id())
       ->pluck('following_id');

         $followers = User::whereIn('id', $follower_id)->get();
        // dd($following_id);
        $posts = Post::with('user')->whereIn('user_id',$follower_id)->latest()->get();

return view('follows.followerList', ['posts' => $posts, 'followers' => $follower]);

    }


   public function show($id){
       $user = User::findOrFail($id);
       $posts = $user->posts()->orderBy('created_at','desc')->get();
       // dd($user,$posts);

       return view('profiles.profile',compact('user','posts'));
    }

    public function profile($id){
        $user = User::findOrFail($id);
        $posts = $user->posts()->orderBy('created_at','desc')->get();

        return view('profiles.profile',compact('user','posts'));
    }

    public function updateProfile(Request $request)
    {
        $id = $request->input('id');
        $username = $request->input('username');
        $email = $request->input('email');
        $password =$request->input('password');
        $bio =$request->input('bio');
        $image = null;
        if($request->hasFile('images')){
            $image=$request->file('images')->store('icons','public');}
        // dd($id,$username,$mail);

       $request->validate([
            'username' => ['required', 'string', 'min:2', 'max:12'],
            'email' => [
                'required',//入力必須
                'mail_address' => 'email',//メールアドレス形式
                'min:5',//最低
                'max:40',//最高
                Rule::unique('users' ,'email')->ignore(auth()->id()),//登録ずみ不可、自分のみ重複許可
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:20',
                'regex:/^[a-zA-Z0-9]+$/', // 英数字のみ
                'password' => 'confirmed:password',  // password_confirmation と一致しているか
            ],
            'bio' =>[
                'max:150'
            ],
            'image' =>['nullable','image|mimes:jpeg,png,jpg,gif']

        ]);

        $updateData=[
            'username' => $username,
            'email' => $email,
            'password' => Hash::make($request->input('password')),
            'bio' =>$bio,
        ];

        if($request->hasFile('images')){
            $image = $request->file('images')->store('icons','public');
            $updateData['icon_image']=basename($image);
        }

        User::where('id',$id)->update($updateData);
        return redirect('/top');
    }


     public function profileUpdate(){
        $user = Auth::user();


        return view('profiles.update',compact('user'));
    }
}

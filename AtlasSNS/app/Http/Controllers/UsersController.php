<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\users;
use App\Post;
use App\User;
use Auth;
use Validator;

class UsersController extends Controller
{

    //
    public function profile(){
        $user = \DB::table('users')->get();
        return view('users.profile',['user'=>$user]);


    }
    public function search(Request $request){
        $user = \DB::table('users')->get();
        // 検索するテキスト取得
         $keyword = $request->input('keyword');
         $query = User::query();

        //検索されたとき
        if(!empty($keyword)){
            $query->where('username','like','%'.$keyword.'%');//曖昧検索
        }

     $user = $query->get();
        return view('users.search',compact('user', 'keyword'));

    }


    public function users()
    {
        $users = users::get();
    }
    //投稿内容
    public function index()
      {
         $user_id = Auth::id();

    { $list = \DB::table('posts')->get();
      $user = \DB::table('users')->first();
      return view('posts.index',['list'=>$list],['user'=>$user]);
    }

//ユーザーネーム
   {
      $user = \DB::table('users')->get();
       return view('layouts.login',['user'=>$user]);
  }

    DB::table('users')
    ->leftJoin('posts', function ($join) {
        $join->on('username.id', '=', 'post.id');

    })
    ->get();

}

//プロフィール更新
public function edit() {
        return view('user.edit', ['user' => Auth::user() ]);
    }

public function profile_update(Request $request){

$user = Auth::user();


//バリデーションを追加
$rulus = [
    'upUsername' => 'required|string|max:255',
    'upMail' => 'required|string|email|max:255',
    'upPassword' => 'required|string|min:4|confirmed',
    'upBio' => '|string|max:150',
];
$message = [
    'upUsername.required' => '名前を入力してください。',
    'upMail.required' => 'メールアドレスは必須です。',
    'upMail.email' => 'メールアドレスの形式ではありません',
    'upPassword.required' => 'パスワードは必須です。',
    'upPassword.confirmed'  => 'パスワードが一致しません',
    'upBio' => '150字以内である必要があります。'

];
////バリデーションを追加
 $validator = Validator::make($request->all(), $rulus, $message);

 if ($validator->fails()) {
   return redirect("/profile")
    ->withErrors($validator)
     ->withInput();
 }
//条件に合う場合更新

else{ $user->username =  $request -> input('upUsername');
$user->mail = $request -> input('upMail');
$user->bio = $request -> input('upBio');
$user->password = bcrypt($request->input('upPassword'));
//パラメータセットして更新
$user->save();

return redirect('/profile');
}
}

}

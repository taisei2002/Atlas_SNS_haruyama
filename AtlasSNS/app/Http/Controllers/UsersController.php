<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\users;
use App\Post;
use App\User;
use Auth;
use Validator;
use DB;

class UsersController extends Controller
{
    //プロフィール
    public function profile(){
        $user = \DB::table('users')->get();
        return view('users.profile',['user'=>$user]);

    }
    //ユーザー検索
    public function search(Request $request){
        $id = Auth::id();
        $user = User::all()->except(Auth::id());

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

    //投稿内容
    public function index()
      {

       $user_id = Auth::id();
       $user = \DB::table('users')->get();
    {  $list = \DB::table('posts')->get();

      return view('posts.index',['list'=>$list],
      [ 'user' => $user,]);
    }
//ユーザーネーム
      $user = \DB::table('users')->get();


       return view('layouts.login',
       [    'user'  => $user,
    ]);

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
$rules = [
    'upUsername' => 'required|string|max:255',
    'upMail' => 'required|string|email|max:255',
    'upPassword' => 'required|string|min:4|confirmed',
    'upBio' => 'max:150',
    'upimages' => 'file|image|mimes:jpeg,png,jpg|max:2048'
];
$message = [
    'upUsername.required' => '名前を入力してください。',
    'upMail.required' => 'メールアドレスは必須です。',
    'upMail.email' => 'メールアドレスの形式ではありません',
    'upPassword.required' => 'パスワードは必須です。',
    'upPassword.confirmed'  => 'パスワードが一致しません',
    'upBio' => '150字以内である必要があります。',

];
////バリデーションを追加
 $validator = Validator::make($request->all(), $rules, $message);


 if

 ($validator->fails()) {

   return redirect("/profile")
    ->withErrors($validator)
     ->withInput();
 }
//条件に合う場合更新

else {
$user->username =  $request -> input('upUsername');
$user->mail = $request -> input('upMail');
$user->bio = $request -> input('upBio');
$user->password = bcrypt($request->input('upPassword'));
$image_path = $request->file('upimages')->store('public/images');
$user->images = basename($image_path);

//パラメータセットして更新
$user->save();

return redirect('/profile');
}}

//他ユーザープロフィール
public function users_profile($id){
$user_id = User::find($id);//user_id

//$user = User::find([$id]);
//$post = Post::find([$user_id]);

$user = DB::table('users')
        ->leftJoin('posts', 'users.id', '=', 'posts.user_id')
        ->find([$user_id]);


  return view('users.users_profile',['user'=>$user]);
}
}

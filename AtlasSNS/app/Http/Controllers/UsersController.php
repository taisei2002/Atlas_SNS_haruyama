<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\users;
use App\Post;
use App\User;
use Auth;
use Validator;
use DB;
use App\Follow;

class UsersController extends Controller
{
    //認証ユーザープロフィール
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
    public function index(Post $post, User $user, Follow $follower)
      {


        $follows = auth()->user()->follows()->get();//フォロー取得
        $user = auth()->user();//認証ユーザー取得
        $follow_ids = $follower->followingIds($user->id);
        $following_ids = $follow_ids->pluck('followed_id')->toArray();
        $posts = Post::whereIn('user_id', $following_ids)
        ->orWhereIn('user_id',$user)
        ->orderBy('created_at','desc')
        ->get();

        return view('posts.index',compact('posts'));
    }

//プロフィール更新
public function edit() {
        return view('user.edit', ['user' => Auth::user() ]);
    }

public function profile_update(Request $request){

$user = Auth::user();


//バリデーションを追加
$rules = [
    'upUsername' => 'required|string|min:2|max:12',
    'upMail' => 'required|string|email|min:5|max:40|',
    'upPassword' => 'required|string|confirmed|alpha_dash|min:8|max:20|',
    'upPassword_confirmation' => 'required|string|alpha_dash|min:8|max:20|',
    'upBio' => 'max:150',
    'upimages' => '|mimes:jpg,png,bmp,svg|max:2048'
];
$message = [
    /*名前*/
     'upUsername.required' => '名前は入力必須です',
     'upUsername.max' =>'名前は2文字以上、12文字以内です',
     'upUsername.min'=>'名前は2文字以上、12文字以内です',
    /*メールアドレス*/
     'upMail.required' => 'メールアドレスは入力必須です。',
     'upMail.max' => 'メールアドレスは5文字以上、40文字以内です',
     'upMail.min' => 'メールアドレスは5文字以上、40文字以内です',
     'upMail.email' => 'メールアドレスの形式ではありません',
     'upMail.unique' => 'このメールアドレスは既に登録されています',
     /*パスワード*/
     'upPassword.confirmed'  => 'パスワードが一致しません',
     'upPassword.required' => 'パスワードは入力必須です',
     'upPassword.min' => 'パスワードは8文字以上、20文字以内です',
     'upPassword.max' => 'パスワードは8文字以上、20文字以内です',
     'upPassword.alpha_dash' => 'パスワードは英数字入力のみです',
     'upPassword.confirmed' =>'パスワードが一致しません',

     'upPassword_confirmation.required' => 'パスワード確認用は入力必須です',
     'upPassword_confirmation.min' => 'パスワードは8文字以上、20文字以内です',
     'upPassword_confirmation.max' => 'パスワードは8文字以上、20文字以内です',
     'upPassword_confirmation.alpha_dash' => 'パスワードは英数字入力のみです',
     /*自己紹介*/
     'upBio.max' => '150字以内である必要があります。',

    'upimages.mimes' => 'プロフィール画像は画像のみです(jpg,png,bmp,svg)'
];
////バリデーションを追加
 $validator = Validator::make($request->all(), $rules, $message);
 
 if($validator->fails()) {

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

$profile = DB::table('users')->where( 'users.id', '=' , $id )->get();
$profile = auth()->user()->follows()->where( 'users.id', '=' , $id )->get();


 $profile = User::find($id);


$user = DB::table('users')
        ->Join('posts', 'users.id', '=', 'posts.user_id')//テーブル結合
        ->where( 'users.id', '=' , $id )
        ->orderBy('posts.created_at', 'desc')
        ->get();



  return view('users.users_profile',['user'=>$user,'profile'=> $profile]);
}

}

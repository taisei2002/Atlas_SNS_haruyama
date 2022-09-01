<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;
use Validator;

class PostsController extends Controller
{

public function index()
{
 $posts = Post::get();

 return view('posts.index',[//view　表示
'posts'=> $posts
]);

}

//投稿機能
public function create(Request $request)
{
 $post = $request->input('newPost');
 $user_id = Auth::id();//ログインユーザー認証

 \DB::table('posts')->insert([
 'post' => $post,
 'user_id' => $user_id
]);
 return redirect('/top');//リダイレクト設定（topへ移動）

}

//消去機能

public function delete($id)
{
 \DB::table('posts')
  ->where('id', $id)
  ->delete();
 return redirect('/top');
}

//更新機能
public function update(Request $request)
{

 $user_id = Auth::id();
 $id = $request->input('id');
 $up_post = $request->input('upPost');
 \DB::table('posts')
 ->where('id',$id)
 ->update(
    ['post' => $up_post]
   );
 return redirect('/top');

    }
//public function show(){
  // Postモデル経由でpostsテーブルのレコードを取得
//  $posts = Post::get();
//  return view('index', compact('posts'));
//}

}

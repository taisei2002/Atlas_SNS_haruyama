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

$this->validate($request, [

        'newPost' => ['required', 'string','max:150'],
        ], [
        'newPost.required' => 'ツイートは入力必須です。',
        'newPost.max' => '文字上限は150以下です。'
    ]);




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

    $this->validate($request, [

        'upPost' => ['required', 'string','max:150'],
        ], [
        'upPost.required' => 'ツイートは入力必須です。',
        'upPost.max' => '文字上限は150以下です。'
    ]);

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



}

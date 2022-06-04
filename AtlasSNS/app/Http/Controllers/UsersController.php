<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\users;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    public function search(){
        return view('users.search');
    }
    public function users()
    {
        $users = users::get();
    }
    //投稿内容
    public function index()
   {
       $list = \DB::table('posts')->get();
       return view('posts.index',['list'=>$list]);
 }
 //ユーザーネーム
   public function name()
   {
       $name = \DB::table('users')->get();
       return view('users.login',['name'=>$name]);
 }
 //ログアウト
    public function getLogout(){
    Auth::logout();
    return redirect()->route('user.login');
 }

}

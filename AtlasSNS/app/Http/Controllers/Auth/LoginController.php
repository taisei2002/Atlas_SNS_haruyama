<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

        protected function validator_login(array $data)
    {
        return Validator::make($data, [

            'mail' => 'required|string|exists:users',
            'password' =>  'required|string|exists:users',
        ],[

            /*メールアドレス*/
            'mail.required' => 'メールアドレスは入力必須です。',
            'mail.exists' => 'このメールアドレスは登録されていません。',

            /*パスワード*/
            'password.required' => 'パスワードは入力必須です',
            'password.exists' =>'パスワードが違うかメールアドレスに誤りがあります。',


]);

    }

    public function login(Request $request){


        if($request->isMethod('post')){
        $data = $request->input();

            ////バリデーションを追加
            $validator = $this->validator_login($data);

        if ($validator->fails()) {
        return redirect("/login")
          ->withErrors($validator)
            ->withInput();
        }
            $data=$request->only('mail','password');
            // ログインが成功したら、トップページへ
            //↓ログイン条件は公開時には消すこと

            if(Auth::attempt($data)){
                return redirect('/top');
            }
        }
        return view("auth.login");

        }


 //ログアウト
    public function getLogout(){
    Auth::logout();
 }
  protected function loggedOut(\Illuminate\Http\Request $request) {
      return redirect('login');

}}

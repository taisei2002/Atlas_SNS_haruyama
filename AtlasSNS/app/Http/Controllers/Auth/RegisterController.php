<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|min:2|max:12',
            'mail' => 'required|string|email|min:5|max:40|unique:users',
            'password' =>  'required|string|confirmed|alpha_dash|min:8|max:20|',
            'password_confirmation' => 'required|string|alpha_dash|min:8|max:20|',

        ],[
            /*名前*/
            'username.required' => '名前は入力必須です',
            'username.max' =>'名前は2文字以上、12文字以内です',
            'username.min'=>'名前は2文字以上、12文字以内です',
            /*メールアドレス*/
            'mail.required' => 'メールアドレスは入力必須です。',
            'mail.max' => 'メールアドレスは5文字以上、40文字以内です',
            'mail.min' => 'メールアドレスは5文字以上、40文字以内です',
            'mail.email' => 'メールアドレスの形式ではありません',
            'mail.unique' => 'このメールアドレスは既に登録されています',
            /*パスワード*/
            'password.required' => 'パスワードは入力必須です',
            'password.min' => 'パスワードは8文字以上、20文字以内です',
            'password.max' => 'パスワードは8文字以上、20文字以内です',
            'password.alpha_dash' => 'パスワードは英数字入力のみです',
            'password.confirmed' =>'パスワードが一致しません',
              /*パスワード再入力*/
            'password_confirmation.required' => 'パスワード確認用は入力必須です',
            'password_confirmation.min' => 'パスワードは8文字以上、20文字以内です',
            'password_confirmation.max' => 'パスワードは8文字以上、20文字以内です',
            'password_confirmation.alpha_dash' => 'パスワードは英数字入力のみです',
]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        return User::create([
            'username' => $data['username'],
            'mail' => $data['mail'],
            'password' => bcrypt($data['password']),
            'password_confirmation' => bcrypt($data['password_confirmation']),


        ]);


    }


     public function registerForm(){

         return view("auth.register");
     }


    public function register(Request $request){

        if($request->isMethod('post')){

            $data = $request->input();
////バリデーションを追加
            $validator = $this->validator($data);

        if ($validator->fails()) {
        return redirect("/register")
          ->withErrors($validator)
            ->withInput();

 }
        else {
             $this->create($data);
            return redirect('added');
        }}

        return view('auth.register');
    }

    public function added(User $user){

        $username = User::orderBy('created_at', 'desc')->first('username');

        return view('auth.added',['user'=>$username]);

    }
}

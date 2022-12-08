<div class="login">

@extends('layouts.logout')
<div class='letter'>
@section('content')

{!! Form::open() !!}
<div class="background_box">
<h2>新規ユーザー登録</h2>
<!-- ユーザーネーム -->
<div class = "login-c">
{{ Form::label('user name',null,['class' => 'login-label']) }}
{{ Form::text('username',null,['class' => 'input-login']) }}
@if ($errors->has('username'))
<p class='error-string'>{{ $errors->first('username') }}</p>
 @endif
</div>

<!-- メールアドレス -->
<div class = "login-c">
{{ Form::label('mail address',null,['class' => 'login-label']) }}
{{ Form::text('mail',null,['class' => 'input-login']) }}
@if ($errors->has('mail'))
<p class='error-string'>{{ $errors->first('mail') }}</p>
 @endif
</div>
<!-- パスワード -->
<div class = "login-c">
{{ Form::label('password',null,['class' => 'login-label']) }}
{{ Form::password('password',['class' => 'input-login']) }}
@if ($errors->has('password'))
<p class='error-string'>{{ $errors->first('password') }}</p>
 @endif
 </div>
<!-- パスワード確認用 -->
<div class = "login-c">
{{ Form::label('password_confirm',null,['class' => 'login-label']) }}
{{ Form::password('password_confirmation',['class' => 'input-login']) }}
@if ($errors->has('password_confirmation'))
<p class='error-string'>{{ $errors->first('password_confirmation') }}</p>
 @endif

</div>
<!-- 登録ボタン -->
{{ Form::submit('REGISTER',['class'=>'register-button']) }}


<p><a class="register" href="/login">ログイン画面へ戻る</a></p>


</div>
 </div>
{!! Form::close() !!}

@endsection

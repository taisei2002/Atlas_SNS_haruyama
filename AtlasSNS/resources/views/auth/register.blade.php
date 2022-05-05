<div class="login">

@extends('layouts.logout')
<div class='letter'>
@section('content')

{!! Form::open() !!}
<div class="background_box">
<h2>新規ユーザー登録</h2>

{{ Form::label('user name') }}
{{ Form::text('username',null,['class' => 'input']) }}

{{ Form::label('mail address') }}
{{ Form::text('mail',null,['class' => 'input']) }}

{{ Form::label('password') }}
{{ Form::text('password',null,['class' => 'input']) }}

{{ Form::label('password comfirm') }}
{{ Form::text('password-confirm',null,['class' => 'input']) }}


{{ Form::submit('REGISTER',['class'=>'register-button']) }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}
</div>
</div>
</div>


@endsection

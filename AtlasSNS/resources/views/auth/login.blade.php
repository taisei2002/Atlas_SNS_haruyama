
@extends('layouts.logout')
<div class='letter'>
@section('content')

{!! Form::open() !!}

<div class="background_box-login">

<p>AtlasSNSへようこそ</p>

{{ Form::label('e-mail') }}
{{ Form::text('mail',null,['class' => 'input']) }}
{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input']) }}

{{ Form::submit('ログイン',['class'=>'login-button'])  }}

<p><a class="register" href="/register">新規ユーザーの方はこちら</a></p>
</div>
</div>

{!! Form::close() !!}

@endsection

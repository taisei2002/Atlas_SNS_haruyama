@extends('layouts.logout')
<div class='letter'>
@section('content')

{!! Form::open() !!}

<div class="background_box-login">

<p class = "logion-a">AtlasSNSへようこそ</p>
<div class = "login-b">
    {{ Form::label('mail address',null,['class' => 'login-label']) }}
    {{ Form::text('mail',null,['class' => 'input-login']) }}
                @if ($errors->has('mail'))
<p class='error-string'>{{ $errors->first('mail') }}</p>
 @endif
</div>

<div class = "login-c">
    {{ Form::label('password',null,['class' => 'login-label']) }}
    {{ Form::password('password',['class' => 'input-login']) }}
                @if ($errors->has('password'))
<p class='error-string'>{{ $errors->first('password') }}</p>
 @endif
    {{ Form::submit ('LOGIN',['class'=>'login-button'])  }}

</div>

    <a class="login-register" href="/register">新規ユーザーの方はこちら</a>

</div>
</div>

{!! Form::close() !!}

@endsection

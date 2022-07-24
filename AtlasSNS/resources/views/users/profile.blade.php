@extends('layouts.login')

@section('content')
 @foreach ($user as $user) @endforeach


{{ csrf_field() }}
{{ method_field('get') }}
{!! Form::open(['url' => '/profile','method'=>'post']) !!}


 <table>
<!-- 　ユーザーネーム　-->
<th>{{ Form::label('user name') }}</th>
<tr><td>{{ Form::input('text','upUsername', Auth::user()->username ,['class' => 'input']) }}</td></tr>
@if ($errors->has('upUsername'))
<p class='error-string'>{{ $errors->first('upUsername') }}</p>
 @endif

<!-- 　メールアドレス　-->
<th>{{ Form::label('mail address') }}</th>
<tr><td>{{ Form::text('upMail',Auth::user()->mail,['class' => 'input']) }}</td></tr>
@if ($errors->has('upMail'))
<p class='error-string'>{{ $errors->first('upMail') }}</p>
 @endif

<!-- 　パスワード　-->
<th>{{ Form::label('password') }}</th>
<tr><td>{{ Form::password('upPassword',null,['class' => 'form-control','id' => 'inputPassword','placeholder' => 'パスワード'])}}</td></tr>
@if ($errors->has('upPassword'))
<p class='error-string'>{{ $errors->first('upPassword') }}</p>
 @endif

<!-- 　パスワード確認用　-->
<th>{{ Form::label('password_confirm') }}</th>
<tr><td>{{ Form::password('upPassword_confirmation',null,['class' => 'form-control','id' => 'inputPassword','placeholder' => 'パスワード'])}}</td></tr>

<!-- 　自己紹介　-->
<th>{{ Form::label('自己紹介') }}</th>
<tr><td>{{ Form::textarea('upBio',Auth::user()->bio,['class' => 'textarea']) }}</td></tr>


</table>
<div>

        <th>{{ Form::label('profile image') }}</th>
       <tr><td> {{Form::file("profile_image")}}</td></tr>

     <tr><td>   <input type="hidden" name="id" value="{{ $user->id }}">

         <button class="user-btn">ユーザー登録内容の編集</button></tr></td>

</div>
 {!! Form::close() !!}

@endsection

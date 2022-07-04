@extends('layouts.login')

@section('content')
 @foreach ($user as $user)


{{ csrf_field() }}
{{ method_field('get') }}
{!! Form::open(['url' => '/profile']) !!}
<div class="form-control">

 <table>
<th>{{ Form::label('user name') }}</th>
<tr><td>{{ Form::input('text','upUsername',$user->username,['class' => 'input']) }}</td></tr>

<th>{{ Form::label('mail address') }}</th>
<tr><td>{{ Form::text('upMail',$user->mail,['class' => 'input']) }}</td></tr>

<th>{{ Form::label('password') }}</th>
<tr><td>{{ Form::password('upPassword',null,['getclass' => 'input']) }}</td></tr>

<th>{{ Form::label('password comfirm') }}</th>
<tr><td>{{ Form::password('password-confirm',null,['class' => 'input']) }}</tr>

<th>{{ Form::label('自己紹介') }}</th>
<tr><td>{{ Form::textarea('upBio',$user->bio,['class' => 'textarea']) }}</tr>


</table>
<div>
        profile image
        <input type="file" name="image"><br>

        <input type="hidden" name="id" value="{{ $user->id }}">

         <button class="user-btn">ユーザー登録内容の編集</button></

</div>
 {!! Form::close() !!}
@endforeach
@endsection

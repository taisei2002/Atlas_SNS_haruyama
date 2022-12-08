@extends('layouts.login')

@section('content')

 @foreach ($user as $user) @endforeach


 <div class= "profile-menu">

{{ csrf_field() }}
{{ method_field('get') }}
{!! Form::open(['url' => '/profile','method'=>'post',"enctype"=>"multipart/form-data"]) !!}

 <table>
 		<tr><th>   <div class = "profile-images">
      <a href="/profile" ><img src="{{ asset('/storage/images/'.Auth::user()->images) }}" class="rounded-circle" width="50" height="50"></a></div>

<!--　名前 -->
			{{ Form::label('user name') }}</th>
			<td>{{ Form::input('text','upUsername', Auth::user()->username ,['class' => 'input-profile']) }}
            @if ($errors->has('upUsername'))
<p class='error-string'>{{ $errors->first('upUsername') }}</p>
 @endif
            </td>
		</tr>
<!--　メールアドレス -->
			<th>{{ Form::label('mail address') }}</th>
			<td>{{ Form::text('upMail',Auth::user()->mail,['class' => 'input-profile']) }}</td>
@if ($errors->has('upMail'))
<p class='error-string'>{{ $errors->first('upMail') }}</p>
 @endif
		</tr>
<!--　パスワード -->
<tr>
<th>{{ Form::label('password') }}</th>
<td>{{ Form::password('upPassword',['class' => 'input-profile','id' => 'inputPassword',]) }}</td>
@if ($errors->has('upPassword'))
<p class='error-string'>{{ $errors->first('upPassword') }}</p>
 @endif
</tr>
<!--　パスワード再入力 -->
<th>{{ Form::label('password_confirm') }}</th>
<td>{{ Form::password('upPassword_confirmation',['class' => 'input-profile','id' => 'inputPassword',]) }}</td>
</tr>
@if ($errors->has('upPassword_confirmation'))
<p class='error-string'>{{ $errors->first('upPassword_confirmation') }}</p>
 @endif
<!--　自己紹介 -->
<th>{{ Form::label('bio') }}</th>
<td>{{ Form::text('upBio',Auth::user()->bio,['class' => 'input-profile']) }}</td>
<tr></tr>
@if ($errors->has('upBio'))
<p class='error-string'>{{ $errors->first('upBio') }}</p>
 @endif
<!--　画像 -->
<th>{{ Form::label('profile image') }}</th>
<td>{!! Form::file('upimages',['class' => 'input-profile']) !!}</td>
<tr></tr>
@if ($errors->has('upimages'))
<p class='error-string'>{{ $errors->first('upimages') }}</p>
 @endif

<!--　画像 -->
<td class = "hidden">{{ Form::text('upimages',Auth::user()->images,['class' => 'input']) }}
</td>


<td><input type="hidden" name="id" value="{{ $user->id }}">
 <button class="btn-unfollow">更新</button>

</td>
 {!! Form::close() !!}
</table>
 </div>
@endsection

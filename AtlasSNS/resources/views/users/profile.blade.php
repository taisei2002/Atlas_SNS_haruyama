@extends('layouts.login')

@section('content')
<h2><!DOCTYPE html>
<html>
 @foreach ($user as $user)
  <p>user name</p>
<input type="text" name="name" value="{{ $user->username }}" />
 <p>mail address</p>
<input type="text" name="name" value="{{ $user->mail }}" />
 <p>bio</p>
<input type="text" name="name" value="{{ $user->bio }}" />
 <p>icon image</p>
<input type="text" name="name" value="{{ $user->images }}" />



 {!! Form::close() !!}
@endforeach
@endsection
</html>

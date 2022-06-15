@extends('layouts.login')

@section('content')
<h2><!DOCTYPE html>
<html>


<body>



      <div class="form-group">
 {!! Form::open(['url' => '/post']) !!}
      {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => 'ツイート']) !!}

  </div>
        <button type="submit" class="btn-post"><img src="images/post.png"width="100" height="100"></button><br><br>
     {!! Form::close() !!}
         @foreach ($list as $list)
      <p> <td>{{ $list->id }}</td><br>{{ $list->post }}{{ $list->created_at }}<br> </p>


     @endforeach
    </div>

</body>
<div>       <table class='table table-hover'>

@endsection

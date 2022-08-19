@extends('layouts.login')

@section('content')
{!! Form::open(['method' => 'GET']) !!}
    {!! Form::text('keyword', null) !!}
    {!! Form::submit('検索') !!}


検索ワード：「 {{$keyword}} 」

{!! Form::close() !!}
@foreach ($user as $user)
<!--ユーザー以外表示-->
@if ($user->id !== Auth::user()->id)

<h3>{{ $user->username }}

     <div class="d-flex justify-content-end flex-grow-1">
         <form action="{{ url('/search/follow/'.$user->id) }}" method="POST">
      {{ csrf_field() }}
      <button type="submit" class="btn btn-primary btn-sm">フォローする</button>
    </form>

    <form action="{{ url('/search/un_follow/{id}') }}" method="POST">
      {{ csrf_field() }}
      {{ method_field('') }}
      <button type="submit" class="btn btn-danger btn-sm">フォロー解除</button>
    </form>
</div>
</h3>

@endif
@endforeach
@endsection

@extends('layouts.login')

@section('content')

@foreach($user as $user)

<p>name：{{ $user->username }}</p>
<p>bio：{{ $user->bio }}</p>

@if($user->id))
     <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST">
         {{ csrf_field() }}
        {{ method_field('DELETE') }}
         <button type="submit" class="btn btn-danger btn-sm">フォロー解除</button>
     </form>
       @else
     <form action="{{ url('/search/follow/'.$user->id) }}" method="POST">
        {{ csrf_field() }}
        <button type="submit" class="btn btn-primary btn-sm">フォローする</button>

     </form>
          @endif
@endforeach

@endsection

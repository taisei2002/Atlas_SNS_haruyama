@extends('layouts.login')

@section('content')
{!! Form::open(['method' => 'GET']) !!}
    {!! Form::text('keyword', null) !!}
    {!! Form::submit('検索') !!}
{!! Form::close() !!}


    @foreach ($user as $user)
<h3>{{ $user->username }}</h3>

 @endforeach



  </>
</div>


@endsection

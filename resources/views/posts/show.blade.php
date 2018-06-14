@extends('layouts.app')

@section('content')
  <h1>{{$post->title}}</h1>
  <p>{{$post->content}}</p>

  <div class="row">
    <div class="col s6">
      <a href="{{route('posts.edit', $post->id)}}" class='btn green'>Edit</a>
    </div>
    <div class="col s6">
      {{ Form::open(['url' => route('posts.destroy', $post->id), 'method' => 'delete'])}}
        {{ Form::submit('delete', ['class' => 'btn red'])}}
      {{ Form::close()}}
    </div>
  </div>
@endsection

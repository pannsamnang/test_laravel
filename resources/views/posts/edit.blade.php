@extends('layouts.app')
@section('content')
  <h1>Create New Post</h1>
  @include('layouts.error')
  {{ Form::open(['url' => route('posts.update', $post->id), 'method' => 'put']) }}
    @include('posts.form')
  {{ Form::close() }}
@endsection

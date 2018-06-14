@extends('layouts.app')

@section('content')
  <h1>Create New Post</h1>
  @include('layouts.error')
  {{ Form::open(array('url' => route('posts.store'))) }}
    @include('posts.form')
  {{ Form::close() }}
@endsection

{{-- <input placeholder="Placeholder" id="first_name" type="text" class="validate">
<label for="first_name">First Name</label> --}}

@extends('layouts.app')
@section('content')
  <h1>Posts</h1>
  <a href={{ route('posts.create') }} class='btn blue'>Add Post</a>
  <table class="responsive-table">
    <tr>
      <td>No</td>
      <td>Title</td>
      <td>Content</td>
      <td>Action</td>
    </tr>
    @foreach ($posts as $key => $post)
      <tr>
        <td>{{ $key + 1 }}</td>
        <td><a href="{{ route('posts.show', $post->id)}}">{{ $post->title }}</a></td>
        <td>{{ $post->content }}</td>
        <td style="display: inline-flex;">
          <a href={{ route('posts.edit', $post->id) }} class='btn green'>Edit</a>
          {{ Form::open(['url' => route('posts.destroy', $post->id), 'method' => 'delete' ]) }}
            {{ Form::submit('delete', ['class' => 'btn red']) }}
          {{ Form::close() }}
        </td>
      </tr>
    @endforeach
  </table>
@endsection

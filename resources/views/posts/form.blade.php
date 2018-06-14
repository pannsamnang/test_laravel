<div class="input-field">
  {{ Form::label('title', 'Title') }}
  {{ Form::text('title', old('title', isset($post->title) ? $post->title : null)) }}
</div>
<div class="input-field ">
  {{ Form::label('content', 'content') }}
  {{ Form::textarea('content', old('content', isset($post->content) ? $post->content : null), array('class' => "materialize-textarea")) }}
</div>
<div>
  {{ Form::submit('Save', array('class' => 'btn')) }}
  <a href={{ route('posts.index') }} class='btn red'> Cancel</a>
</div>

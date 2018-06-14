<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;
class PostController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index() {
    $posts = Post::all();
    return view('posts.index', compact('posts'));
  }

  public function show(Post $post) {
    return view('posts.show', compact('post'));
  }

  public function create() {
    $this->authorize('create', Post::class);
    return view('posts.create');
  }

  public function store(PostRequest $request) {
    $this->authorize('create', Post::class);
    $request->validated();
    auth()->user()->posts()->create([
       'title' => request('title'),
       'content' => request('content'),
       'user_id' => auth()->user()->id,
   ]);

   return redirect('/posts')->withSuccess('Post has been successfully created!');
  }

  public function edit(Post $post) {
    $this->authorize('update', $post);
    return view('posts.edit', compact('post'));
  }

  public function update(Post $post, PostRequest $request) {
    $this->authorize('update', $post);
    $request->validated();
    $post->update([
     'title' => request('title'),
     'content' => request('content'),
   ]);
    return redirect('/posts')->withSuccess('Post has been successfully edited!');
  }

  public function destroy(Post $post) {
    $this->authorize('delete', $post);
    $post->delete();
    return redirect('/posts')->withSuccess('Post has been successfully deleted!');
  }
}

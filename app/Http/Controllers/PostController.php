<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user:id,name'])
        ->latest('id')
        ->paginate(100);
        return view('posts.index', ['posts' => $posts]);
    }
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }
    public function showUserPosts(User $user)
    {
        $posts = $user->posts;
        return view('users.showByUser', ['posts' => $posts, 'user' => $user]);
    }
    public function showAllposts()
    {
        $posts = Post::with('user')->get();
        return view('posts.posts', ['posts' => $posts]);
    }
    public function showAllusers()
    {
        $users = User::all();
        return view('users.users', ['users' => $users]);
    }
    public function create()
    {
        $users = User::all();
        return view('posts.create',['users' => $users]);
    }

    public function store(StorePostRequest $request, User $user)
    {
        $filename = Str::uuid() . '.' . $request->file('image')->getClientOriginalExtension();
        $path = $request->file('image')->storeAs('posts_images', $filename, 'public');
        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => Auth::id(),
            'image' => $path,
            'slug' => Str::slug('title')
        ]);
        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
        if(Auth::id() == $post->user_id)
        return view('posts.edit', ['post' => $post]);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
    public function update(StorePostRequest $request, Post $post)
    {
        $image = $request->file('image');
        if ($image) {
            Storage::disk('public')->delete('public/posts_images/'.$post->image);
            $filename = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('posts_images', $filename, 'public');
            $post->image = $path;
        }
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $request->user_id;
        $post->slug = Str::slug($post->title);
        $post->save();
        return redirect()->route('posts.index');
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->find($id);
        $post->restore();
        return redirect()->route('posts.bin');
    }
    public function forceDelete($id)
    {
        $post = Post::withTrashed()->find($id);
        Storage::disk('public')->delete('public/posts_images/'.$post->image);
        $post->forceDelete();
        return redirect()->route('posts.bin');
    }
    public function showTrashed()
    {
        $posts = Post::onlyTrashed()->get();
        return view('posts.bin', ['posts' => $posts]);
    }
    public function showUser(User $user)
    {
        return view('users.show', ['user' => $user]);
    }
}

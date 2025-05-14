<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function publicFeed()
    {
        $posts = Post::with('user')->latest()->paginate(10);
        return view('feed.index', compact('posts'));
        $posts = Post::with(['user', 'comments' => function ($query) {
            $query->latest()->limit(1);
        }, 'comments.user'])
        ->latest()
        ->paginate(10);

    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'caption' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = $request->file('image')->store('posts', 'public');

        Post::create([
            'user_id' => Auth::id(),
            'caption' => $request->caption,
            'image_url' => $imagePath,
        ]);

        return redirect()->route('feed')->with('success', 'Postingan berhasil diunggah!');
    }
    public function myPosts()
    {
        $posts = Post::where('user_id', Auth::id())->latest()->get();

        return view('posts.dashboard', compact('posts'));
    }
    public function edit(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403); // Biar nggak bisa edit post orang lain
        }

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'caption' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $post->caption = $request->caption;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
            $post->image_url = $imagePath;
        }

        $post->save();

        return redirect()->route('dashboard')->with('success', 'Postingan berhasil diperbarui!');
    }

    public function show(Post $post)
    {
        $post->load(['user', 'comments.user']); // load user dan komentar dengan user-nya
        return view('posts.show', compact('post'));
    }


}

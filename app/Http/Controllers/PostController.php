<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::query()
            ->with(['user', 'likes'])
            ->latest()
            ->get();

        return view('dashboard', [
            'posts' => $posts,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'caption' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = $request->file('image')->store('posts', 'public');

        Post::create([
            'user_id' => auth()->id(),
            'image_path' => $path,
            'caption' => $request->caption,
        ]);

        return back()->with('success', 'Post berhasil diupload!');
    }

    public function toggleLike(Post $post): RedirectResponse
    {
        $like = $post->likes()->where('user_id', auth()->id())->first();

        if ($like) {
            $like->delete();
        } else {
            $post->likes()->create(['user_id' => auth()->id()]);
        }

        return back();
    }
}

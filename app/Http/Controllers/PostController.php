<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::query()
            ->with(['user', 'likes'])
            ->where(function ($query) {
                $query->where('is_published', true)
                    ->orWhere('user_id', auth()->id());
            })
            ->latest()
            ->get();

        return view('dashboard', [
            'posts' => $posts,
        ]);
    }

    public function store(StorePostRequest $request): RedirectResponse
    {
        $path = $request->file('image')->store('posts', 'public');

        Post::create([
            'user_id' => auth()->id(),
            'image_path' => $path,
            'caption' => $request->caption,
            'image_original_name' => $request->file('image')->getClientOriginalName(),
            'is_published' => true,
        ]);

        return back()->with('success', 'Post berhasil diupload!');
    }

    public function update(UpdatePostRequest $request, Post $post): RedirectResponse
    {
        abort_unless($post->user_id === auth()->id(), 403);

        $data = [
            'caption' => $request->caption,
            'is_published' => $request->boolean('is_published'),
        ];

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($post->image_path);
            $data['image_path'] = $request->file('image')->store('posts', 'public');
            $data['image_original_name'] = $request->file('image')->getClientOriginalName();
        }

        $post->update($data);

        return back()->with('success', 'Post berhasil diupdate!');
    }

    public function destroy(Post $post): RedirectResponse
    {
        abort_unless($post->user_id === auth()->id(), 403);

        Storage::disk('public')->delete($post->image_path);
        $post->delete();

        return back()->with('success', 'Post berhasil dihapus!');
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

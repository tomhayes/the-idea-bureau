<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $posts = Post::with('user', 'topics')->get();

        foreach ($posts as $post) {
            if (empty($post->imgSrc)) {
                $post->imgSrc = 'images/placeholder.png';
            }
        }

        return view('welcome', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'imgSrc' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'type' => 'required|string',
            'title' => 'required|string',
            'topics' => 'nullable|array',
            'date' => 'required|date',
        ]);

        $imgSrcPath = null;
        if ($request->hasFile('imgSrc')) {
            $imgSrcPath = $request->file('imgSrc')->store('images', 'public');
        }

        $post = Post::create([
            'imgSrc' => $imgSrcPath,
            'type' => $request->type,
            'title' => $request->title,
            'author' => Auth::id(),
            'date' => $request->date,
        ]);

        if ($request->topics) {
            $post->topics()->sync($request->topics);
        }

        return redirect()->route('index')->with('success', 'Post created.');
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);
        $request->validate([
            'imgSrc' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'type' => 'required|string',
            'title' => 'required|string',
            'topics' => 'nullable|array',
            'date' => 'required|date',
        ]);

        $imgSrcPath = $post->imgSrc;
        if ($request->hasFile('imgSrc')) {
            $imgSrcPath = $request->file('imgSrc')->store('images', 'public');
        }

        $post->update([
            'imgSrc' => $imgSrcPath,
            'type' => $request->type,
            'title' => $request->title,
            'date' => $request->date,
        ]);

        if ($request->topics) {
            $post->topics()->sync($request->topics);
        }

        return redirect()->route('index')->with('success', 'Post updated.');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return redirect()->route('index')->with('success', 'Post deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     */
    public function index()
    {
        $user = Auth::user();
        $posts = Post::where('author', $user->id)->with('topics')->get();

        foreach ($posts as $post) {
            if (empty($post->imgSrc)) {
                $post->imgSrc = 'images/placeholder.png';
            }
        }

        return view('dashboard', compact('posts'));
    }
}

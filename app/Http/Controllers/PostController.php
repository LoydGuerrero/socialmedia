<?php

namespace App\Http\Controllers;

use App\Models\Post; // Ensure the Post model is imported
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Show all posts
    public function index()
    {
        $posts = Post::with('user')->latest()->get(); // Get posts with user relation
        return view('dashboard', compact('posts')); // Pass posts to the dashboard view
    }

    // Show the form for creating a new post
    public function create()
    {
        return view('posts.create'); // Create a view for creating a new post
    }

    // Store a newly created post
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        // Create the post
        Post::create([
            'user_id' => auth()->id(), // Set the user_id to the authenticated user's ID
            'content' => $request->input('content'),
        ]);

        return redirect()->route('dashboard')->with('success', 'Post created successfully!');
    }

    // Additional methods for showing, editing, updating, and destroying posts can be added here
}

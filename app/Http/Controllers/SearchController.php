<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
                'search' => 'required'
        ]);

        $search = $request->search;
        $posts = Post::where('title' ,'LIKE', "%$search%")->with('category')->get();
        return view('posts.search', compact('posts', 'search'));
    }
}

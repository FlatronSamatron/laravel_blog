<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show(Tag $tag)
    {
        $posts = $tag->posts()->with('category')->orderBy('id', 'desc')->paginate(1);
        return view('tags.show', compact('tag', 'posts'));
    }
}

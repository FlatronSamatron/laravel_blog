<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $posts = $category->posts()->orderBy('id', 'desc')->paginate(1);
        return view('categories.show', compact('category', 'posts'));
    }
}

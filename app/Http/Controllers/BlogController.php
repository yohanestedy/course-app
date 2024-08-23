<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('softui.layout.main');
    }
    public function show()
    {
        return view('blog.article.post.show');
    }
}

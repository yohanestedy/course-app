<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index($param){
        return view('blog.article.post.index');
    }
    public function show(){
        return view('blog.article.post.show');
    }
}

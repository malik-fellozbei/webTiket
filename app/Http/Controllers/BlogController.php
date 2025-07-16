<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        return view("pages.blog.blog");
    }

    public function show(Post $post)
    {
        return view('pages.blog.blog-detail', [
            'post' => $post
        ]);
    }
}

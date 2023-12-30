<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class PostsController extends Controller
{

    public function getList(Request $request)
    {
        $posts = Posts::all();

        return view('posts.index');
    }
}
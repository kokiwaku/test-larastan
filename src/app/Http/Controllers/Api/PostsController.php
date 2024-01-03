<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{

    public function getList(Request $request)
    {
        $postsData = Posts::all()->toArray();

        return response()->json($postsData);
    }
}
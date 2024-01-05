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

    public function getBy(Request $request)
    {
        $postsData = Posts::find($request->input('postsId'));

        return response()->json($postsData->toArray());
    }

    public function save(Request $request)
    {
        $posts = match ($postsId = $request->input('postsId')) {
                null => new Posts(),
                default => Posts::find($postsId),
            };
        $posts->title = $request->input('title');
        $posts->content = $request->input('content');
        $posts->save();

        return response()->json(['result' => true]);
    }

    public function delete(Request $request)
    {
        $postsData = Posts::find($request->input('postsId'));
        if ($postsData === null) {
            return null;
        }

        $postsData->delete();
        return response()->json(['result' => true]);
    }
}
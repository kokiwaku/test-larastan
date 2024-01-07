<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getList(Request $request)
    {
        $postsData = Posts::all()->toArray();

        return response()->json($postsData);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getBy(Request $request)
    {
        $postsData = Posts::find($request->input('postsId'));
        $result = [];
        if ($postsData !== null) {
            $result = $postsData->toArray();
        }

        return response()->json($result);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
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

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|null
     */
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
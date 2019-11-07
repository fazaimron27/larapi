<?php

namespace App\Http\Controllers;

use Auth;
use App\Post;
use App\Transformers\PostTransformer;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function add(Request $request, Post $post)
    {
        $this->validate($request, [
            'content' => 'required|min:10'
        ]);

        $post = $post->create([
            'user_id' => Auth::user()->id,
            'content' => $request->content
        ]);

        $response = fractal()
            ->item($post)
            ->transformWith(new PostTransformer)
            ->toArray();

        return response()->json($response, 201);
    }
}

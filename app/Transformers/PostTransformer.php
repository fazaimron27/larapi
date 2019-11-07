<?php

namespace App\Transformers;

use App\Post;
use League\Fractal\TransformerAbstract;
use Auth;

class PostTransformer extends TransformerAbstract
{
    public function transform(Post $post)
    {
        return [
            'id' => $post->id,
            'content' => $post->content,
            'author' => Auth::user()->name,
            'published' => $post->created_at->diffForHumans()
        ];
    }
}

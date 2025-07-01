<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BaseApiRequest;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostCollection;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;

/**
 * @group Posts endpoints
 *
 */
class PostController extends Controller
{
    public function index(BaseApiRequest $request)
    {
        $query = Post::with('categories')
            ->orderBy($request->sort_by, $request->sort);
        
        return new PostCollection($query->paginate($request->limit));
    }

    public function show($id)
    {
        $post = Post::with('categories')->findOrFail($id);
        return new PostResource($post);
    }
}
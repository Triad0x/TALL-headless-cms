<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BaseApiRequest;
use App\Http\Resources\PageResource;
use App\Http\Resources\PageCollection;
use App\Models\Page;
use Illuminate\Support\Facades\Cache;

/**
 * @group Pages endpoints
 *
 */
class PageController extends Controller
{
    public function index(BaseApiRequest $request)
    {
        $validated = $request->validated();
        
        $query = Page::orderBy($request->sort_by, $request->sort);
        
        return new PageCollection($query->paginate($request->limit));
    }

    public function show($id)
    {
        $page = Page::findOrFail($id);
        return new PageResource($page);
    }
}
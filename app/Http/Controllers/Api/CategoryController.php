<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BaseApiRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CategoryCollection;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

/**
 * @group Categories endpoints
 *
 */
class CategoryController extends Controller
{
    public function index(BaseApiRequest $request)
    {
        $validated = $request->validated();
        
        $query = Category::orderBy($request->sort_by, $request->sort);
        
        return new CategoryCollection($query->paginate($request->limit));
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return new CategoryResource($category);
    }
}

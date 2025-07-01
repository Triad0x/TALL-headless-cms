<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class BaseCollection extends ResourceCollection
{
    protected $resourceClass;
    protected $resourceName;

    public function __construct($resource, string $resourceClass, string $resourceName = 'data')
    {
        $this->resourceClass = $resourceClass;
        $this->resourceName = $resourceName;
        parent::__construct($resource);
    }

    public function toArray(Request $request)
    {
        return [
            $this->resourceName => $this->resourceClass::collection($this->collection),
        ];
    }

    public function toResponse($request): JsonResponse
    {
        if (method_exists($this, 'getCacheKey')) {
            $cacheKey = $this->getCacheKey($request);
            $tags = $this->getCacheTags();
            $minutes = $this->getCacheDuration();
            
            return Cache::tags($tags)->remember($cacheKey, $minutes, function() use ($request) {
                return parent::toResponse($request);
            });
        }
        
        return parent::toResponse($request);
    }

    protected function getCacheKey($request)
    {
        return md5(json_encode([
            'url' => $request->fullUrl(),
            'query' => $request->all(),
            'resource' => class_basename($this->resourceClass)
        ]));
    }

    protected function getCacheTags()
    {
        return [strtolower(class_basename($this->resourceClass)) . 's'];
    }

    protected function getCacheDuration()
    {
        return config('cache.api_expiration', 60);
    }
}

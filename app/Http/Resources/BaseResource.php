<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Cache;

class BaseResource extends JsonResource
{
    protected $cacheTags = [];

    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function toResponse($request)
    {
        $cacheKey = $this->getCacheKey($request);
        $tags = $this->getCacheTags();
        $minutes = $this->getCacheDuration();
        
        return Cache::tags($tags)->remember($cacheKey, $minutes, function() use ($request) {
            return parent::toResponse($request);
        });
    }

    protected function getCacheKey(Request $request)
    {
        return md5(json_encode([
            'url' => $request->fullUrl(),
            'query' => $request->all(),
            'resource' => class_basename($this->resource),
            'id' => $this->resource->getKey()
        ]));
    }

    protected function getCacheTags()
    {
        return $this->cacheTags ?: [$this->resource->getTable()];
    }

    protected function getCacheDuration()
    {
        return config('cache.api_expiration', 60);
    }
}
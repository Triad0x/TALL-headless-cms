<?php

namespace App\Http\Resources;

class PostCollection extends BaseCollection
{
    public function __construct($resource)
    {
        parent::__construct($resource, PostResource::class);
    }

    protected function getCacheTags()
    {
        return ['posts'];
    }
}

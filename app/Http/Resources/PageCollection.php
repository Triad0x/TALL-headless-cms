<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PageCollection extends BaseCollection
{
    public function __construct($resource)
    {
        parent::__construct($resource, PageResource::class);
    }

    protected function getCacheTags()
    {
        return ['pages'];
    }
}

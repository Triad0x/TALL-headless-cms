<?php

namespace App\Http\Resources;

class CategoryCollection extends BaseCollection
{
    public function __construct($resource)
    {
        parent::__construct($resource, CategoryResource::class);
    }

    protected function getCacheTags()
    {
        return ['categories'];
    }
}

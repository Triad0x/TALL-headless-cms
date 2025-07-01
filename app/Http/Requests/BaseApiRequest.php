<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaseApiRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'limit' => 'sometimes|integer|min:1|max:100',
            'page' => 'sometimes|integer|min:1',
            'sort' => 'sometimes|string|in:asc,desc',
            'sort_by' => 'sometimes|string',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'limit' => $this->input('limit', 10),
            'page' => $this->input('page', 1),
            'sort' => $this->input('sort', 'desc'),
            'sort_by' => $this->input('sort_by', 'created_at'),
        ]);
    }

    /**
     * Define query parameter descriptions and examples for Scribe.
     */
    public function queryParameters(): array
    {
        return [
            'limit' => [
                'description' => 'Number of items per page.',
                'example' => 10,
            ],
            'page' => [
                'description' => 'The page number.',
                'example' => 1,
            ],
            'sort' => [
                'description' => 'Sort direction (asc or desc).',
                'example' => 'desc',
            ],
            'sort_by' => [
                'description' => 'Field to sort the result by.',
                'example' => 'id',
            ],
        ];
    }
}

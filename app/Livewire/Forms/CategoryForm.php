<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Category;
use Illuminate\Validation\Rule;

class CategoryForm extends Form
{
    public string $name = '';
    public string $slug = '';
    public ?Category $category = null;

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'min:3',
                'max:255',
            ],
            'slug' => [
                'required',
                'min:3',
                'max:255',
                Rule::unique('categories', 'slug')->ignore($this->category?->id),
            ],
        ];
    }

    public function create()
    {
        $this->validate();

        Category::create([
            'name' => $this->name,
            'slug' => $this->slug,
        ]);

        $this->reset();
    }

    public function fillForm(Category $category): void
    {
        $this->category = $category;
        $this->name = $category->name;
        $this->slug = $category->slug;
    }

    public function update()
    {
        $this->validate();

        $this->category->update([
            'name' => $this->name,
            'slug' => $this->slug,
        ]);

        $this->reset();
    }
}

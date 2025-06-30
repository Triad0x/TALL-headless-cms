<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Page;
use Illuminate\Validation\Rule;

class PageForm extends Form
{
    public string $title = '';
    public string $slug = '';
    public string $status = 'draft';
    public string $body = '';
    public ?Page $page = null;

    public function rules(): array
    {
        return [
            'title' => ['required', 'min:3', 'max:255'],
            'slug' => [
                'required',
                'min:3',
                'max:255',
                Rule::unique('pages', 'slug')->ignore($this->page?->id),
            ],
            'status' => ['required', 'in:draft,published'],
            'body' => ['required', 'string', 'min:10'],
        ];
    }

    public function create()
    {
        $this->validate();

        Page::create($this->only('title', 'slug', 'status', 'body'));

        $this->reset();
    }

    public function fillForm(Page $page): void
    {
        $this->page = $page;
        $this->title = $page->title;
        $this->slug = $page->slug;
        $this->status = $page->status;
        $this->body = $page->body;
    }

    public function update()
    {
        $this->validate();

        $this->page->update($this->only('title', 'slug', 'status', 'body'));

        $this->reset();
    }
}

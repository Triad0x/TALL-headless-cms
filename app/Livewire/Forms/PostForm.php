<?php

namespace App\Livewire\Forms;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Form;

class PostForm extends Form
{
    public ?Post $post = null;

    public string $title = '';
    public string $status = 'draft';
    public $image = null;
    public $imageUrl = null;
    public string $content = '';
    public ?string $shortDescription = '';
    public array $categories = [];

    public function rules(): array
    {
        return [
            'title' => ['required', 'min:3', 'max:255'],
            'status' => ['required', 'in:draft,published'],
            'image' => [$this->post ? 'nullable' : 'required', 'image', 'max:5120'],
            'content' => ['required', 'string', 'min:10'],
            'shortDescription' => ['nullable', 'string', 'min:10', 'max:255'],
            'categories' => ['required', 'array'],
            'categories.*' => ['exists:categories,id'],
        ];
    }

    protected function getImagePath(): string
    {
        $slug = Str::slug($this->title);
        $originalName = $this->image->getClientOriginalName();
        $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
        
        // Normalize common extensions
        $extension = match($extension) {
            'jpe', 'jpeg' => 'jpg',
            'tif' => 'tiff',
            default => $extension,
        };
        
        return "posts/{$slug}/main.{$extension}";
    }

    public function create()
    {
        $this->validate();

        $post = Post::create([
            'title' => $this->title,
            'status' => $this->status,
            'image' => $this->image ? $this->image->storeAs('', $this->getImagePath(), 'public') : null,
            'content' => $this->content,
            'short_description' => $this->shortDescription,
        ]);

        $post->categories()->sync($this->categories);

        $this->reset();
    }

    public function edit(Post $post)
    {
        $this->post = $post;

        $this->title = $post->title;
        $this->status = $post->status;
        $this->content = $post->content;
        $this->imageUrl = $post->image ? asset('storage/' . $post->image) : null;
        $this->shortDescription = $post->short_description;
        $this->categories = $post->categories()->pluck('categories.id')->toArray();
    }

    public function update()
    {
        $this->validate();

        $this->post->update([
            'title' => $this->title,
            'status' => $this->status,
            'content' => $this->content,
            'short_description' => $this->shortDescription,
            'image' => $this->image
                ? $this->image->storeAs('', $this->getImagePath(), 'public')
                : $this->post->image,
        ]);

        $this->post->categories()->sync($this->categories);

        $this->reset();
    }
}

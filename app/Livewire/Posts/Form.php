<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use App\Livewire\Forms\PostForm;
use Livewire\Attributes\Computed;
use Mary\Traits\Toast;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\Cache;
use Livewire\WithFileUploads;

use App\Models\Post;
use App\Models\Category;

class Form extends Component
{
    use WithFileUploads;
    use Toast;

    public $drawer = false;
    public $postId = null;
    public PostForm $form;

    public $statusOpt = [
        ['id' => 'draft', 'name' => 'Draft'],
        ['id' => 'published', 'name' => 'Published'],
    ];

    public Array $categoryOptions = [];

    #[Computed]
    public function drawerAttr()
    {
        $action = $this->postId ? 'Edit' : 'Create';

        return [
            'title' => $action . ' Post',
            'buttonText' => $action,
        ];
    }

    public function updatingFormTitle($value): void
    {
        $this->form->slug = str($value)->slug();
    }

    #[On('create-data')]
    public function onCreate()
    {
        $this->reset(['postId']);
        $this->form->reset();
        $this->drawer  = true;
    }

    #[On('edit-data')] 
    public function edit($id)
    {
        $this->postId = $id;
        $this->form->fillForm(Post::findOrFail($id));
        $this->drawer = true;
    }

    public function updatedFormImage($value)
    {
        $this->form->imageUrl = null;
    }

    public function submit()
    {
        $action = $this->postId ? 'update' : 'create';
        
        $this->form->{$action}();
        
        $this->success("Post {$action}d successfully!");
        
        $this->dispatch('refreshTable');
        $this->drawer = false;
        $this->reset(['postId']);
    }

    public function getCategoryOptions()
    {
        $this->categoryOptions = Cache::tags(['categories'])->remember(
            'categories_option',
            now()->addDay(),
            fn () => Category::select('id', 'name')
                ->orderBy('name')
                ->get()
                ->toArray()
        );
    }


    public function mount()
    {
        $this->getCategoryOptions();
    }

    public function render()
    {
        return view('livewire.posts.form');
    }
}

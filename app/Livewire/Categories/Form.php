<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use App\Livewire\Forms\CategoryForm;
use Livewire\Attributes\Computed;
use Mary\Traits\Toast;
use Livewire\Attributes\On; 

use App\Models\Category;

class Form extends Component
{
    use Toast;

    public $drawer = false;
    public $categoryId = null;
    public CategoryForm $form;

    #[Computed]
    public function drawerAttr()
    {
        $action = $this->categoryId ? 'Edit' : 'Create';

        return [
            'title' => $action . ' Category',
            'buttonText' => $action,
        ];
    }

    #[On('create-data')]
    public function onCreate()
    {
        $this->reset(['categoryId']);
        $this->form->reset();
        $this->drawer  = true;
    }

    public function create()
    {
        $validated = $this->form->validate();
        Category::create($validated);

        $this->reset();
        $this->success('Category created successfully.');
    }

    #[On('edit-data')] 
    public function edit($id)
    {
        $this->categoryId = $id;
        $this->form->fill(Category::findOrFail($id)->toArray());
        $this->drawer = true;
    }

    public function update()
    {
        $validated = $this->form->validate();
        $category = Category::findOrFail($this->categoryId);
        $category->update($validated);

        $this->reset();
        $this->success('Category updated successfully.');
    }

    public function submit()
    {
        if ($this->categoryId) {
            $this->update();
        } else {
            $this->create();
        }
        $this->dispatch('refreshTable');
    }

    public function render()
    {
        return view('livewire.categories.form');
    }
}

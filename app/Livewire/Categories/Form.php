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

    public function updatingFormName($value): void
    {
        $this->form->slug = str($value)->slug();
    }

    #[On('create-data')]
    public function onCreate()
    {
        $this->reset(['categoryId']);
        $this->form->reset();
        $this->drawer  = true;
    }

    #[On('edit-data')] 
    public function edit($id)
    {
        $this->categoryId = $id;
        $this->form->fillForm(Category::findOrFail($id));
        $this->drawer = true;
    }

    public function submit()
    {
        $action = $this->categoryId ? 'update' : 'create';
        
        $this->form->{$action}();
        
        $this->success("Category {$action}d successfully!");
        $this->dispatch('refreshTable');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.categories.form');
    }
}

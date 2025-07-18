<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Livewire\Forms\PageForm;
use Livewire\Attributes\Computed;
use Mary\Traits\Toast;
use Livewire\Attributes\On; 

use App\Models\Page;

class Form extends Component
{
    use Toast;

    public $drawer = false;
    public $pageId = null;
    public PageForm $form;

    public $statusOpt = [
        ['id' => 'draft', 'name' => 'Draft'],
        ['id' => 'published', 'name' => 'Published'],
    ];

    #[Computed]
    public function drawerAttr()
    {
        $action = $this->pageId ? 'Edit' : 'Create';

        return [
            'title' => $action . ' Page',
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
        $this->reset(['pageId']);
        $this->form->reset();
        $this->drawer  = true;
    }

    #[On('edit-data')] 
    public function edit($id)
    {
        $this->pageId = $id;
        $this->form->fillForm(Page::findOrFail($id));
        $this->drawer = true;
    }

    public function submit()
    {
        $action = $this->pageId ? 'update' : 'create';
        
        $this->form->{$action}();
        
        $this->success("Page {$action}d successfully!");
        $this->dispatch('refreshTable');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.pages.form');
    }
}

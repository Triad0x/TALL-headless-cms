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

    #[On('create-data')]
    public function onCreate()
    {
        $this->reset(['pageId']);
        $this->form->reset();
        $this->drawer  = true;
    }

    public function create()
    {
        $validated = $this->form->validate();
        Page::create($validated);

        $this->reset();
        $this->success('Page created successfully.');
    }

    #[On('edit-data')] 
    public function edit($id)
    {
        $this->pageId = $id;
        $this->form->fill(Page::findOrFail($id)->toArray());
        $this->drawer = true;
    }

    public function update()
    {
        $validated = $this->form->validate();
        $page = Page::findOrFail($this->pageId);
        $page->update($validated);

        $this->reset();
        $this->success('Page updated successfully.');
    }

    public function submit()
    {
        if ($this->pageId) {
            $this->update();
        } else {
            $this->create();
        }
        $this->dispatch('refreshTable');
    }

    public function render()
    {
        return view('livewire.pages.form');
    }
}

<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\On; 
use Mary\Traits\Toast;
use App\Models\Page;

class Table extends Component
{
    use Toast;

    public Page $data;
    public $drawer = false;

    #[On('show-detail')] 
    public function detail($id)
    {
        $this->data = Page::findOrFail($id);
        $this->drawer = true;
    }

    public function render()
    {
        $headers = [
            [
                'key' => 'id',
                'label' => '#',
            ],
            [
                'key' => 'title',
                'label' => 'Title',
            ],
            [
                'key' => 'slug',
                'label' => 'Slug',
            ],
            [
                'key' => 'status',
                'label' => 'Status',
            ],
        ];

        return view('livewire.pages.table', [
            'headers' => $headers,
        ]);
    }
}

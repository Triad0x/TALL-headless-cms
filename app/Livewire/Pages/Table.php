<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\On; 
use Mary\Traits\Toast;

class Table extends Component
{
    use Toast;

    #[On('show-detail')] 
    public function detail($id)
    {
        $this->info('Show details for item with ID: ' . $id);
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

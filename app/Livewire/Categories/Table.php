<?php

namespace App\Livewire\Categories;

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
                'key' => 'name',
                'label' => 'Name',
            ],
            [
                'key' => 'slug',
                'label' => 'Slug',
            ],
        ];

        $actionButtons = [
            'create' => true,
            'edit' => true,
            'delete' => true,
        ];

        return view('livewire.categories.table', [
            'headers' => $headers,
            'actionButtons' => $actionButtons,
        ]);
    }
}
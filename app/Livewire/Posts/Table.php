<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use Livewire\Attributes\On; 
use Mary\Traits\Toast;
use App\Models\Post;

class Table extends Component
{
    use Toast;
    public Post $data;
    public $drawerDetail = false;

    #[On('show-detail')] 
    public function detail($id)
    {
        $this->data = Post::findOrFail($id);
        $this->drawerDetail = true;
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
            [
                'key' => 'published_at',
                'label' => 'Published At',
                'format' => ['date', 'd/m/Y']   
            ],
        ];

        return view('livewire.posts.table', [
            'headers' => $headers,
        ]);
    }
}
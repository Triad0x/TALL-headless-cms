<?php

namespace App\Livewire\Dashboard;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class PostCount extends Component
{
    public function render()
    {
        $counts = Cache::tags(['posts'])->rememberForever('post_counts', function () {
            return [
                'total' => Post::count(),
                'published' => Post::where('status', 'published')->count(),
                'draft' => Post::where('status', 'draft')->count(),
            ];
        });

        return view('livewire.dashboard.post-count', $counts);
    }
}

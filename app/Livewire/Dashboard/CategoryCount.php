<?php

namespace App\Livewire\Dashboard;

use App\Models\Category;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class CategoryCount extends Component
{
    public function render()
    {
        $counts = Cache::tags(['categories'])->rememberForever('category_counts', function () {
            return [
                'total' => Category::count(),
            ];
        });

        return view('livewire.dashboard.category-count', $counts);
    }
}

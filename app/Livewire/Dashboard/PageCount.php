<?php

namespace App\Livewire\Dashboard;

use App\Models\Page;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class PageCount extends Component
{
    public function render()
    {
        $counts = Cache::tags(['pages'])->rememberForever('page_counts', function () {
            return [
                'total' => Page::count(),
                'published' => Page::where('status', 'published')->count(),
                'draft' => Page::where('status', 'draft')->count(),
            ];
        });

        return view('livewire.dashboard.page-count', $counts);
    }
}

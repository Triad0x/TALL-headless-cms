<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class ClearApiCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clear-api-cache {model?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear API cache by model tag';

    /**
     * Execute the console command.
     */

    public function handle()
    {
        $model = $this->argument('model');
        $tags = ['posts', 'categories', 'pages'];
        
        if ($model) {
            $tags = [strtolower($model)];
        }
        
        Cache::tags($tags)->flush();
        $this->info('Cleared cache for: ' . implode(', ', $tags));
    }
}

<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use LivewireFilemanager\Filemanager\Http\Controllers\Files\FileController;

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');
Route::redirect('/', '/dashboard')->name('home');

Route::middleware(['auth'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('posts', 'posts')->name('posts');
    Route::view('pages', 'pages')->name('pages');
    Route::view('categories', 'categories')->name('categories');
    Route::view('file-manager', 'file-manager')->name('file-manager');
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';

Route::get('{path}', [FileController::class, 'show'])
    ->where('path', '.*')
    ->name('assets.show');

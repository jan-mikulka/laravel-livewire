<?php

use App\Livewire\WordIndex;
use App\Livewire\WordList;
use App\Livewire\CreateWord;
use App\Livewire\Dashboard;
use App\Livewire\EditWord;
use App\Livewire\Login;
use App\Livewire\ShowWord;
use Illuminate\Support\Facades\Route;

Route::get('/', WordIndex::class)->name('home');
Route::get('/login', Login::class)->name('login');
Route::get('/logout', function () {
    Auth::logout();

    return redirect()->route('home');
});

Route::get('/words/{word}', ShowWord::class);

Route::middleware([
    'auth',
])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/dashboard/words', WordList::class)->name('dashboard.words.index');//->lazy();
    Route::get('/dashboard/words/create', CreateWord::class);
    Route::get('/dashboard/words/{word}/edit', EditWord::class);
});

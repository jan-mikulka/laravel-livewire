<?php

use App\Livewire\BookList;
use App\Livewire\CreateBook;
use App\Livewire\EditBook;
use Illuminate\Support\Facades\Route;

use App\Livewire\Login;
use App\Livewire\WordIndex;

use App\Livewire\Dashboard;
use App\Livewire\WordList;
use App\Livewire\SourceList;
use App\Livewire\CreateSource;
use App\Livewire\ShowWord;
use App\Livewire\CreateWord;
use App\Livewire\EditWord;

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
    Route::get('/dashboard/sources', SourceList::class)->name('dashboard.sources.index');//->lazy();
    Route::get('/dashboard/sources/create', CreateSource::class)->name('dashboard.sources.create');

    Route::get('/dashboard/books', BookList::class)->name('dashboard.books.index');//->lazy();
    Route::get('/dashboard/books/create', CreateBook::class)->name('dashboard.books.create');
    Route::get('/dashboard/books/{book}/edit', EditBook::class)->name('dashboard.books.edit');


});

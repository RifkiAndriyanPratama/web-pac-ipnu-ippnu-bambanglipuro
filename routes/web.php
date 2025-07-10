<?php

use Illuminate\Support\Facades\Route;
use App\Models\Program;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/program', function () {
    $programs = Program::all(); // atau ->latest()->get()
    return view('pages.program', [
        'programs' => $programs
    ]);
})->name('program');
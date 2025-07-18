<?php

use Illuminate\Support\Facades\Route;
use App\Models\Program;
use App\Models\News;
use App\Models\NewsCategory;


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

Route::get('/news', function () {
    $news = News::latest()->get(); // Bisa juga pakai pagination
    $categories = NewsCategory::withCount('news')->get(); // Ambil kategori beserta jumlah berita

    return view('pages.news', [
        'news' => $news,
        'categories' => $categories
    ]);
})->name('news');

Route::get('/news/{slug}', function ($slug) {
    $news = \App\Models\News::where('slug', $slug)->with('newsCategory')->firstOrFail();

    $otherNews = \App\Models\News::where('id', '!=', $news->id)
        ->latest('published_at')
        ->take(3)
        ->get();

    return view('pages.news-detail', compact('news', 'otherNews'));
})->name('news.detail');


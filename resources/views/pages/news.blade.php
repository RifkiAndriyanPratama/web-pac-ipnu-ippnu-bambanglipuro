@php
    $news = \App\Models\News::with('newsCategory')->latest('published_at')->take(6)->get();
@endphp

@extends('layouts.app')

@section('title', 'Pelajar Bambanglipuro - News')

@section('content')
    <x-navigasi />
    <x-news :news="$news" :categories="$categories"/>
@endsection
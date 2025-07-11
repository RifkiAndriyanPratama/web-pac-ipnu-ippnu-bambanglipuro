@extends('layouts.app')

@section('title', $news->title)

@section('content')
    <x-navigasi />
    <x-news-detail :news="$news"/>
@endsection

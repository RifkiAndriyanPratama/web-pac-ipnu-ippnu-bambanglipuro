@php
    $periode = '2024 - 2026';
    $jumlahAnggota = \App\Models\Anggota::count();
    $jumlahPengurus = \App\Models\Pengurus::count();
    $isHome = true;
@endphp

@extends('layouts.app')

@section('title', 'Pelajar Bambanglipuro - Home')

@section('content')
    <x-navbar :is-home="true" />
    <x-carousel />

    {{-- Section Sambutan --}}
    <section class="bg-white py-16 px-6 md:px-0">
        <x-sambutan />
    </section>
    <x-statistik 
    :periode="$periode"
    :jumlahAnggota="$jumlahAnggota"
    :jumlahPengurus="$jumlahPengurus"
    />
@endsection

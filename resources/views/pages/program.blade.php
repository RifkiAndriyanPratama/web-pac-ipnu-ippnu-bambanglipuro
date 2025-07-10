@extends('layouts.app')

@section('title', 'Pelajar Bambanglipuro - Program')

@section('content')
    <x-navigasi />
    <section class="bg-white py-16 px-6 md:px-0">
        <x-program-card :programs="$programs" />
    </section>
@endsection
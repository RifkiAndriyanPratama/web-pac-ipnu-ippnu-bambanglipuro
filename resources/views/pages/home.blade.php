@extends('layouts.app')

@section('title', 'Pelajar Bambanglipuro - Home')

@section('content')
    <x-carousel />

    {{-- Section Sambutan --}}
    <section class="bg-white py-16 px-6 md:px-0">
        <div class="max-w-4xl mx-auto text-center" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                Selamat Datang di Website Resmi
                <span class="text-green-600">PAC IPNU IPPNU Bambanglipuro</span>
            </h2>
            <p class="text-lg md:text-xl text-gray-600 leading-relaxed">
                Kami hadir sebagai wadah pelajar untuk belajar, berproses, dan mengabdi demi kemajuan umat dan bangsa.
            </p>
        </div>
    </section>
@endsection

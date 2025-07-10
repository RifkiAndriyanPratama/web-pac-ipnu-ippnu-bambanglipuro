@props(['programs'])

<section class="bg-gray-50 py-16 px-4 md:px-8">
    <div class="max-w-6xl mx-auto text-center mb-12">
        <h2 class="text-3xl font-bold mb-2 text-green-700">Program Unggulan</h2>
        <p class="text-gray-600">Berikut ini adalah program kerja PAC IPNU IPPNU Bambanglipuro.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @forelse ($programs as $program)
            <div class="bg-white rounded-2xl shadow p-6 hover:shadow-lg transition duration-300">
                @if ($program->gambar)
                    <img src="{{ asset('storage/' . $program->gambar) }}" alt="{{ $program->judul }}" class="w-full h-40 object-cover rounded-lg mb-4">
                @else
                    <div class="w-full h-40 bg-gray-200 rounded-lg mb-4 flex items-center justify-center text-gray-400">
                        Tidak ada gambar
                    </div>
                @endif

                <h3 class="text-xl font-semibold text-green-700 mb-2">{{ $program->judul }}</h3>
                <p class="text-gray-600 text-sm line-clamp-3">{{ $program->deskripsi }}</p>
            </div>
        @empty
            <p class="col-span-full text-center text-gray-500">Belum ada program.</p>
        @endforelse
    </div>
</section>

@props(['news'])

<section class="bg-white py-16 px-4 md:px-8">
    <div class="max-w-4xl mx-auto">
        {{-- Gambar thumbnail --}}
        @if ($news->thumbnail)
            <img src="{{ asset('storage/' . $news->thumbnail) }}"
                 alt="{{ $news->title }}"
                 class="w-full h-64 object-cover rounded-xl mb-8 shadow-md">
        @endif

        {{-- Tanggal & Kategori --}}
        <div class="mb-4 flex items-center justify-between text-sm text-gray-500">
            <span>{{ \Carbon\Carbon::parse($news->published_at)->format('d M Y') }}</span>

            @if ($news->newsCategory)
                <span class="px-3 py-1 rounded-full text-xs font-medium text-white shadow-sm"
                      style="background-color: {{ $news->newsCategory->color }}">
                    {{ $news->newsCategory->name }}
                </span>
            @endif
        </div>

        {{-- Judul --}}
        <h1 class="text-4xl font-bold text-gray-800 leading-tight mb-6">
            {{ $news->title }}
        </h1>

        {{-- Isi konten --}}
        <div class="prose prose-lg max-w-none">
            {!! $news->content !!}
        </div>
    </div>
</section>

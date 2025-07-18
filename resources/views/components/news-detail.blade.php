@props(['news', 'otherNews'])

<section class="bg-white py-16 px-4 md:px-8">
    <div class="max-w-7xl mx-auto mt-5 grid grid-cols-1 md:grid-cols-4 gap-10">
        {{-- Kolom Konten Utama --}}
        <div class="md:col-span-3">
            @if ($news->thumbnail)
                <img src="{{ asset('storage/' . $news->thumbnail) }}"
                     alt="{{ $news->title }}"
                     class="w-full h-64 object-cover rounded-xl mb-8 shadow-md">
            @endif

            <div class="mb-4 flex items-center justify-between text-sm text-gray-500">
                <span>{{ \Carbon\Carbon::parse($news->published_at)->format('d M Y') }}</span>
                @if ($news->newsCategory)
                    <span class="px-3 py-1 rounded-full text-xs font-medium text-white shadow-sm"
                          style="background-color: {{ $news->newsCategory->color }}">
                        {{ $news->newsCategory->name }}
                    </span>
                @endif
            </div>

            <h1 class="text-4xl font-bold text-gray-800 leading-tight mb-6">
                {{ $news->title }}
            </h1>

            <div class="text-gray-800 leading-relaxed [&>p]:mb-4 [&>h1]:text-3xl [&>h2]:text-2xl [&>h3]:text-xl [&>h1]:font-bold [&>h2]:font-semibold [&>blockquote]:italic [&>blockquote]:text-gray-600 [&>blockquote]:border-l-4 [&>blockquote]:pl-4 [&>blockquote]:my-4">
                {!! $news->content !!}
            </div>

            <div class="mt-10">
                <a href="{{ route('news') }}"
                   class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-semibold rounded-lg shadow transition">
                    ← Kembali ke Berita
                </a>
            </div>
        </div>

        {{-- Sidebar: Berita Lainnya --}}
        <aside class="md:col-span-1">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Berita Lainnya</h2>

            <div class="space-y-6">
                @foreach ($otherNews as $item)
                    <div class="border border-gray-200 rounded-lg overflow-hidden shadow hover:shadow-md transition">
                        @if ($item->thumbnail)
                            <img src="{{ asset('storage/' . $item->thumbnail) }}"
                                 alt="{{ $item->title }}"
                                 class="w-full h-24 object-cover">
                        @endif

                        <div class="p-3">
                            <span class="text-xs text-gray-500 block mb-1">
                                {{ \Carbon\Carbon::parse($item->published_at)->format('d M Y') }}
                            </span>

                            <h3 class="text-sm font-semibold text-gray-800 leading-tight">
                                <a href="{{ route('news.detail', $item->slug) }}" class="hover:underline">
                                    {{ Str::limit($item->title, 50) }}
                                </a>
                            </h3>

                            <p class="text-xs text-gray-600 mt-1">
                                {{ Str::limit(strip_tags($item->content), 80) }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </aside>
    </div>
</section>

@props(['news', 'categories'])

<section class="bg-white py-16 px-4 md:px-8">
    <div class="max-w-7xl mx-auto mt-10">
        <h2 class="text-3xl font-bold text-gray-800 mb-8">Berita</h2>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            {{-- Bagian Berita --}}
            <div class="md:col-span-3 space-y-10">
                @forelse ($news as $item)
                    <div class="border border-gray-200 rounded-md shadow-sm hover:shadow-md transition overflow-hidden 
                                md:flex md:items-start md:gap-6 md:rounded-lg md:shadow-none md:border-none">

                        @if ($item->thumbnail)
                            <img src="{{ asset('storage/' . $item->thumbnail) }}"
                                 alt="{{ $item->title }}"
                                 class="w-full h-56 object-cover md:h-48 md:w-64 md:rounded-lg md:object-cover">
                        @endif

                        <div class="p-5 flex flex-col justify-between">
                            <div class="flex items-center justify-between text-sm text-green-600 mb-2">
                                <span>{{ \Carbon\Carbon::parse($item->published_at)->format('F d, Y') }}</span>
                            </div>

                            @if ($item->newsCategory)
                                <span class="text-xs font-semibold px-3 py-1 rounded-full inline-block mb-3"
                                      style="background-color: {{ $item->newsCategory->color ?? '#e5e7eb' }}; color: white; max-width: max-content;">
                                    {{ $item->newsCategory->name }}
                                </span>
                            @endif

                            <h3 class="text-xl font-semibold leading-snug mb-1">
                            <a href="{{ route('news.detail', $item->slug) }}" class="text-gray-900 hover:text-green-700 transition-colors">
                                {{ $item->title }}
                            </a>
                            </h3>

                            <p class="text-sm text-gray-700 mb-4 line-clamp-2">
                                {{ Str::limit(strip_tags($item->content), 120) }}
                            </p>

                            <a href="{{ route('news.detail', $item->slug) }}" class="text-green-700 font-semibold text-sm hover:underline flex items-center gap-1">
                                Read More
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-500">Belum ada berita.</p>
                @endforelse
            </div>

            {{-- Sidebar Kategori --}}
            <aside class="space-y-4 border-l border-gray-200 pl-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Kategori</h3>
                <ul class="space-y-2">
                    @forelse ($categories as $category)
                        <li>
                            <a href="#"
                               class="flex items-center justify-between text-sm font-medium text-gray-700 hover:text-green-600">
                                {{ $category->name }}
                                <span class="text-xs bg-gray-200 text-gray-700 px-2 py-0.5 rounded">
                                    {{ $category->news_count ?? 0 }}
                                </span>
                            </a>
                        </li>
                    @empty
                        <li class="text-gray-500 text-sm">Belum ada kategori.</li>
                    @endforelse
                </ul>
            </aside>
        </div>
    </div>
</section>

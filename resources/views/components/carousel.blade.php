@php
    $slides = [
        ['img' => 'carousel-1.jpg', 'title' => 'Selamat Datang', 'desc' => 'Ini adalah halaman utama'],
        ['img' => 'carousel-2.jpg', 'title' => 'Proyek Kami', 'desc' => 'Kami bangga dengan desain inovatif kami'],
        ['img' => 'carousel-3.jpg', 'title' => 'Tim Profesional', 'desc' => 'Dipimpin oleh arsitek berpengalaman'],
        ['img' => 'carousel-4.jpg', 'title' => 'Konsultasi Gratis', 'desc' => 'Hubungi kami untuk diskusi proyek'],
        ['img' => 'carousel-5.jpg', 'title' => 'Bangun Impian Anda', 'desc' => 'Kami siap mewujudkan visi Anda'],
    ];
@endphp

<div x-data="carousel()" x-init="start()" class="relative w-full h-screen overflow-hidden">
    <!-- Slides wrapper -->
    <div class="flex h-full"
         :class="{ 'transition-transform duration-700 ease-in-out': animated }"
         :style="`transform: translateX(-${current * 100}%);`">
        {{-- Slides asli --}}
        @foreach ($slides as $slide)
            <div class="flex-shrink-0 w-full h-full relative">
                <img src="{{ asset("images/carousel/{$slide['img']}") }}" class="w-full h-full object-cover" alt="Slide">
                <div class="absolute inset-0 bg-black/40 flex flex-col items-center justify-center text-white text-center px-4">
                    <h2 class="text-3xl md:text-5xl font-bold">{{ $slide['title'] }}</h2>
                    <p class="text-lg md:text-xl mt-2">{{ $slide['desc'] }}</p>
                </div>
            </div>
        @endforeach

        {{-- Clone slide pertama di akhir --}}
        <div class="flex-shrink-0 w-full h-full relative">
            <img src="{{ asset("images/carousel/{$slides[0]['img']}") }}" class="w-full h-full object-cover" alt="Slide">
            <div class="absolute inset-0 bg-black/40 flex flex-col items-center justify-center text-white text-center px-4">
                <h2 class="text-3xl md:text-5xl font-bold">{{ $slides[0]['title'] }}</h2>
                <p class="text-lg md:text-xl mt-2">{{ $slides[0]['desc'] }}</p>
            </div>
        </div>
    </div>

    <!-- Indicators -->
    <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 z-30 flex space-x-2">
        @foreach ($slides as $index => $slide)
            <button @click="goTo({{ $index }})"
                    :class="{ 'bg-white': currentReal === {{ $index }}, 'bg-white/50': currentReal !== {{ $index }} }"
                    class="w-3 h-3 rounded-full transition-colors"></button>
        @endforeach
    </div>

    <!-- Controls -->
    <button @click="prev" class="absolute top-1/2 left-0 transform -translate-y-1/2 z-30 p-4 text-white bg-black/30 hover:bg-black/50">&#10094;</button>
    <button @click="next" class="absolute top-1/2 right-0 transform -translate-y-1/2 z-30 p-4 text-white bg-black/30 hover:bg-black/50">&#10095;</button>
</div>

<script>
    function carousel() {
        return {
            current: 0,
            currentReal: 0,
            total: {{ count($slides) }},
            interval: null,
            animated: true,

            start() {
                this.interval = setInterval(() => this.next(), 4000);
            },

            next() {
                this.animated = true;
                this.current++;
                this.currentReal = (this.currentReal + 1) % this.total;

                // Deteksi jika sedang di slide clone
                if (this.current === this.total) {
                    setTimeout(() => {
                        this.animated = false;
                        this.current = 0;
                    }, 700); // sesuai durasi transition
                }
            },

            prev() {
                this.animated = true;

                if (this.current === 0) {
                    this.current = this.total;
                    this.animated = false;
                    this.$nextTick(() => {
                        this.animated = true;
                        this.current--;
                        this.currentReal = (this.total - 1);
                    });
                } else {
                    this.current--;
                    this.currentReal = (this.currentReal - 1 + this.total) % this.total;
                }
            },

            goTo(index) {
                this.animated = true;
                this.current = index;
                this.currentReal = index;
            }
        }
    }
</script>

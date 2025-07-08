@props(['periode', 'jumlahAnggota', 'jumlahPengurus'])

<div id="statistik-section" class=" bg-white mb-20" data-aos="fade-up">
    <div class="max-w-screen-xl mx-auto px-6 md:px-0">
        <!-- Satu Kartu Responsif -->
        <div class="bg-green-700 rounded-2xl shadow-md text-white py-10 px-6 flex flex-col items-center gap-8 text-center sm:grid sm:grid-cols-3 sm:gap-6 sm:items-start">
            
            <!-- Tahun Ajaran -->
            <div>
                <div class="text-5xl font-bold">{{ $periode }}</div>
                <div class="text-base mt-1">Periode Kepengurusan</div>
            </div>

            <!-- Peserta Didik -->
            <div>
                <div class="text-5xl font-bold" id="counter-anggota">0</div>
                <div class="text-base mt-1">Jumlah Anggota</div>
            </div>

            <!-- Tenaga Pengajar -->
            <div>
                <div class="text-5xl font-bold" id="counter-pengurus">0</div>
                <div class="text-base mt-1">Jumlah Pengurus</div>
            </div>

        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/countup.js/2.6.2/countUp.umd.js"></script>
<script>
    const anggota = new countUp.CountUp('counter-anggota', {{ $jumlahAnggota }}, { duration: 2 });
    const pengurus = new countUp.CountUp('counter-pengurus', {{ $jumlahPengurus }}, { duration: 2 });

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                if (!anggota.error) anggota.start();
                if (!pengurus.error) pengurus.start();
                observer.disconnect(); // hanya jalankan sekali
            }
        });
    }, {
        threshold: 0.5
    });

    document.addEventListener('DOMContentLoaded', () => {
        const section = document.getElementById('statistik-section');
        if (section) observer.observe(section);
    });
</script>
@endpush

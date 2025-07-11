<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My App')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-gray-900 font-sans">
    {{-- Konten halaman --}}
    <main>
        @yield('content')
    </main>
    {{-- Komponen footer --}}
    <x-footer />
<script>
  AOS.init();
</script>
  @stack('scripts')
</body>
</html>

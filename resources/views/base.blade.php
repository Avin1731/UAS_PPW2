<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('img/logo-putih.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('img/logo-putih.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/logo-putih.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/logo-putih.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/logo-putih.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/logo-putih.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('img/logo-putih.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/logo-putih.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/logo-putih.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('img/logo-putih.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/logo-putih.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('img/logo-putih.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/logo-putih.png') }}">
    <!-- Primary Meta Tags -->
    <title>{{ config('app.name') }} • @yield('title')</title>

    <meta name="title" content="{{ config('app.name') }}">
    <meta name="description" content="Aplikasi ini merupakan proyek dasar Praktikum Pemrograman Web 2 di Universitas Gadjah Mada yang dirancang untuk mendukung proses pembelajaran mahasiswa dalam pengembangan aplikasi web.">
    <meta name="keywords" content="Praktikum Pemrograman Web 2, Universitas Gadjah Mada, proyek praktikum, aplikasi web, sistem informasi akademik, pembelajaran pemrograman, Laravel, pengembangan web, proyek mahasiswa"/>
    <meta name="author" content="Abidurrahman Al-Faruq"/>

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="#">
    <meta property="og:title" content="{{ config('app.name') }}">
    <meta property="og:description" content="Aplikasi ini merupakan proyek dasar Praktikum Pemrograman Web 2 di Universitas Gadjah Mada yang dirancang untuk mendukung proses pembelajaran mahasiswa dalam pengembangan aplikasi web.">
    <meta property="og:image" content="{{ asset('img/logo-putih.png') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="website">
    <meta property="twitter:url" content="#">
    <meta property="twitter:title" content="{{ config('app.name') }}">
    <meta property="twitter:description" content="Aplikasi ini merupakan proyek dasar Praktikum Pemrograman Web 2 di Universitas Gadjah Mada yang dirancang untuk mendukung proses pembelajaran mahasiswa dalam pengembangan aplikasi web.">
    <meta property="twitter:image" content="{{ asset('img/logo-putih.png') }}">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    @stack('css')
</head>
<body role="main">

<nav class="bg-gray-100 border-b-4 border-[#C0392B]">
    <div class="max-w-screen-xl flex flex-wrap gap-3 items-center justify-between mx-auto p-4">
        <a href="#" class="flex items-center space-x-2 rtl:space-x-reverse">
            <img src="{{ asset('img/logo.png') }}" class="h-12" alt="Logo UGM"/>
            <div class="flex flex-col leading-tight">
                <span class="text-lg md:text-xl font-bold text-[#631913]">Hilarius Christiano Avin Paliling</span>
                <span class="text-xs md:text-sm font-semibold text-[#631913]">24/542159/SV/25009</span>
            </div>
        </a>
        <button id="menu-btn" type="button" class="inline-flex flex-none items-center p-1 justify-center text-sm text-gray-400 rounded-lg md:hidden hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-[#C0392B] rounded-lg md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0">
                <li>
                    <a href="{{ route('index') }}" class="block py-2 px-3 md:p-0 transition-transform hover:scale-120 text-[#96291F] @yield('menuberanda')">Beranda</a>
                </li>
                <li>
                    <a href="{{ route('pekerjaan.index') }}" class="block py-2 px-3 md:p-0 transition-transform hover:scale-120 text-[#96291F] @yield('menupekerjaan')">Pekerjaan</a>
                </li>
                <li>
                    <a href="{{ route('pegawai.index') }}" class="block py-2 px-3 md:p-0 transition-transform hover:scale-120 text-[#96291F] @yield('menupegawai')">Pegawai</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<footer class="bg-gray-900 shadow-sm">
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <div class="mx-auto w-full max-w-screen-xl p-4">
            <div class="flex flex-col sm:flex-col md:flex-row md:justify-between gap-6">
                <div>
                    <img src="{{ asset('img/logo-putih.png') }}" class="w-20 mb-3" alt="Logo UGM"/>
                    <p class="font-medium text-white">Universitas Gadjah Mada</p>
                    <div class="flex items-center gap-2 text-white m-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-current" viewBox="0 0 640 640">
                            <path d="M192 64C156.7 64 128 92.7 128 128L128 512C128 547.3 156.7 576 192 576L448 576C483.3 576 512 547.3 512 512L512 128C512 92.7 483.3 64 448 64L192 64zM304 416L336 416C353.7 416 368 430.3 368 448L368 528L272 528L272 448C272 430.3 286.3 416 304 416zM224 176C224 167.2 231.2 160 240 160L272 160C280.8 160 288 167.2 288 176L288 208C288 216.8 280.8 224 272 224L240 224C231.2 224 224 216.8 224 208L224 176zM368 160L400 160C408.8 160 416 167.2 416 176L416 208C416 216.8 408.8 224 400 224L368 224C359.2 224 352 216.8 352 208L352 176C352 167.2 359.2 160 368 160zM224 304C224 295.2 231.2 288 240 288L272 288C280.8 288 288 295.2 288 304L288 336C288 344.8 280.8 352 272 352L240 352C231.2 352 224 344.8 224 336L224 304zM368 288L400 288C408.8 288 416 295.2 416 304L416 336C416 344.8 408.8 352 400 352L368 352C359.2 352 352 344.8 352 336L352 304C352 295.2 359.2 288 368 288z"/>
                        </svg>
                        <p class="m-0">Bulaksumur, Caturtunggal, Depok, Sleman Regency<br/>Special Region of Yogyakarta 55281</p>
                    </div>
                    <div class="flex items-center gap-2 text-white m-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-current" viewBox="0 0 640 640">
                            <path d="M224 128L224 208L288 208L288 128L434.7 128L480 173.3L480 208L544 208L544 173.3C544 156.3 537.3 140 525.3 128L480 82.7C468 70.7 451.7 64 434.7 64L288 64C252.7 64 224 92.7 224 128zM96 192C78.3 192 64 206.3 64 224L64 512C64 529.7 78.3 544 96 544L144 544C161.7 544 176 529.7 176 512L176 224C176 206.3 161.7 192 144 192L96 192zM544 256L224 256L224 512C224 529.7 238.3 544 256 544L544 544C561.7 544 576 529.7 576 512L576 288C576 270.3 561.7 256 544 256zM288 352C288 338.7 298.7 328 312 328C325.3 328 336 338.7 336 352C336 365.3 325.3 376 312 376C298.7 376 288 365.3 288 352zM288 448C288 434.7 298.7 424 312 424C325.3 424 336 434.7 336 448C336 461.3 325.3 472 312 472C298.7 472 288 461.3 288 448zM400 328C413.3 328 424 338.7 424 352C424 365.3 413.3 376 400 376C386.7 376 376 365.3 376 352C376 338.7 386.7 328 400 328zM376 448C376 434.7 386.7 424 400 424C413.3 424 424 434.7 424 448C424 461.3 413.3 472 400 472C386.7 472 376 461.3 376 448zM488 328C501.3 328 512 338.7 512 352C512 365.3 501.3 376 488 376C474.7 376 464 365.3 464 352C464 338.7 474.7 328 488 328zM464 448C464 434.7 474.7 424 488 424C501.3 424 512 434.7 512 448C512 461.3 501.3 472 488 472C474.7 472 464 461.3 464 448z"/>
                        </svg>
                        <p class="m-0">(0274) 588688.</p>
                    </div>
                    <div class="flex items-center gap-2 text-white m-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-current" viewBox="0 0 640 640">
                            <path d="M112 128C85.5 128 64 149.5 64 176C64 191.1 71.1 205.3 83.2 214.4L291.2 370.4C308.3 383.2 331.7 383.2 348.8 370.4L556.8 214.4C568.9 205.3 576 191.1 576 176C576 149.5 554.5 128 528 128L112 128zM64 260L64 448C64 483.3 92.7 512 128 512L512 512C547.3 512 576 483.3 576 448L576 260L377.6 408.8C343.5 434.4 296.5 434.4 262.4 408.8L64 260z"/>
                        </svg>
                        <p class="m-0">info@ugm.ac.id</p>
                    </div>
                </div>
                <div>
                    <div class="text-white text-right">
                        <h2 class="mb-2 text-sm font-semibold uppercase">Identitas Mahasiswa</h2>
                        <p>Hilarius Christiano Avin Paliling</p>
                        <p>24/542159/SV/25009</p>
                        <p>PPW2/PL3A2</p>
                    </div>
                </div>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700"/>
            <span class="block text-center text-gray-400">© 2025 Responsi Praktikum Pemrograman Web 2</span>
        </div>
    </div>
</footer>

<script>
    const menuBtn = document.getElementById('menu-btn');
    const menu = document.getElementById('navbar-default');
    menuBtn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
        menuBtn.setAttribute('aria-expanded', !menu.classList.contains('hidden'));
    });
</script>
@stack('js')
</body>
</html>

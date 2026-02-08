<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Bengkel Las Profesional & Terpercaya di Jakarta. Spesialis konstruksi besi, kanopi, pagar, dan struktur baja kelas berat.')">
    <title>@yield('title', 'Kanal Las Baja - Bengkel Las Profesional')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#fff7ed',
                            100: '#ffedd5',
                            200: '#fed7aa',
                            300: '#fdba74',
                            400: '#fb923c',
                            500: '#f97316',
                            600: '#ea580c',
                            700: '#c2410c',
                            800: '#9a3412',
                            900: '#7c2d12',
                        },
                        dark: {
                            700: '#374151',
                            800: '#1f2937',
                            900: '#111827',
                            950: '#0a0f1a',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] {
            display: none !important;
        }

        .bg-grid-pattern {
            background-image: radial-gradient(circle, #e5e7eb 1px, transparent 1px);
            background-size: 20px 20px;
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>

    @stack('styles')
</head>

<body class="font-sans antialiased bg-white text-dark-900">
    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white shadow-sm" x-data="{ mobileMenuOpen: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center space-x-2">
                    <div class="w-10 h-10 bg-dark-900 rounded-lg flex items-center justify-center">
                        <img src="{{ asset('images/logo.jpeg') }}"
                            alt="Kanal Las Baja"
                            class="w-8 h-8 object-contain">
                    </div>
                    <span class="text-xl font-bold text-dark-900">KANAL <span class="text-primary-500">LAS BAJA</span></span>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-sm font-medium {{ request()->routeIs('home') && !request()->hasHeader('referer') ? 'text-primary-500' : 'text-dark-700 hover:text-dark-900' }}">BERANDA</a>
                    <a href="{{ route('portfolio.index') }}" class="text-sm font-medium {{ request()->routeIs('portfolio.*') ? 'text-primary-500' : 'text-dark-700 hover:text-dark-900' }}">PORTFOLIO</a>
                    <a href="{{ route('home') }}#layanan" class="text-sm font-medium {{ request()->routeIs('home') && request()->has('layanan') ? 'text-primary-500' : 'text-dark-700 hover:text-dark-900' }}" x-data="{ active: false }" :class="active ? 'text-primary-500' : ''" @click="active = true">LAYANAN</a>
                    <a href="{{ route('contact') }}" class="text-sm font-medium {{ request()->routeIs('contact') ? 'text-primary-500' : 'text-dark-700 hover:text-dark-900' }}">KONTAK</a>
                </div>

                <!-- CTA Button -->
                <div class="hidden md:block">
                    <a href="{{ route('contact') }}" class="inline-flex items-center px-5 py-2.5 bg-dark-900 text-white text-sm font-semibold rounded-lg hover:bg-dark-800 transition-colors">
                        KONSULTASI GRATIS
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden p-2 rounded-lg text-dark-700 hover:bg-gray-100">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div x-show="mobileMenuOpen" x-cloak class="md:hidden py-4 border-t">
                <div class="flex flex-col space-y-3">
                    <a href="{{ route('home') }}" class="px-3 py-2 text-sm font-medium text-dark-700 hover:text-dark-900 hover:bg-gray-50 rounded-lg">BERANDA</a>
                    <a href="{{ route('portfolio.index') }}" class="px-3 py-2 text-sm font-medium text-dark-700 hover:text-dark-900 hover:bg-gray-50 rounded-lg">PORTFOLIO</a>
                    <a href="{{ route('home') }}#layanan" class="px-3 py-2 text-sm font-medium text-dark-700 hover:text-dark-900 hover:bg-gray-50 rounded-lg">LAYANAN</a>
                    <a href="{{ route('contact') }}" class="px-3 py-2 text-sm font-medium text-dark-700 hover:text-dark-900 hover:bg-gray-50 rounded-lg">KONTAK</a>
                    <a href="{{ route('contact') }}" class="mx-3 mt-2 text-center py-2.5 bg-dark-900 text-white text-sm font-semibold rounded-lg hover:bg-dark-800">
                        KONSULTASI GRATIS
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-16">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark-950 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div class="md:col-span-1">
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="w-10 h-10 bg-dark-900 rounded-lg flex items-center justify-center">
                            <img src="{{ asset('images/logo.jpeg') }}"
                                alt="Kanal Las Baja"
                                class="w-8 h-8 object-contain">
                        </div>
                        <span class="text-xl font-bold">KANAL <span class="text-primary-500">LAS BAJA</span></span>
                    </div>
                    <p class="text-gray-400 text-sm mb-4">
                        Bengkel las spesialis konstruksi besi dan baja terpercaya di Jakarta.
                    </p>
                    <div class="flex space-x-3">
                        <a href="#" class="w-10 h-10 bg-dark-800 rounded-lg flex items-center justify-center hover:bg-dark-700 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-dark-800 rounded-lg flex items-center justify-center hover:bg-dark-700 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Navigation Links -->
                <div>
                    <h4 class="text-sm font-semibold uppercase tracking-wider mb-4">LAYANAN</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white text-sm">Pagar</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white text-sm">Kanopi</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white text-sm">Konstruksi Baja Ringan</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white text-sm">Railing & Tangga</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white text-sm">Dan Lain-Lain</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="text-sm font-semibold uppercase tracking-wider mb-4">KONTAK</h4>
                    <ul class="space-y-2">
                        <li class="flex items-start space-x-2">
                            <svg class="w-5 h-5 text-primary-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="text-gray-400 text-sm">Jl. Asam, RT.12/RW.3, Pulo Gebang, Kec. Cakung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13950</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-primary-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span class="text-gray-400 text-sm">+6256 9337 8749</span>
                        </li>
                    </ul>
                </div>

                <!-- Operating Hours -->
                <div>
                    <h4 class="text-sm font-semibold uppercase tracking-wider mb-4">JAM OPERASIONAL</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li class="flex justify-between">
                            <span>Senin - Sabtu</span>
                            <span>08:00 - 17:00</span>
                        </li>
                        <li class="flex justify-between">
                            <span>Minggu</span>
                            <span class="text-primary-500">Tutup</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-dark-800 mt-10 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-500 text-sm">© {{ date('Y') }} KANAL LAS BAJA. ALL RIGHTS RESERVED.</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="text-gray-500 hover:text-gray-400 text-sm">Privacy Policy</a>
                    <a href="#" class="text-gray-500 hover:text-gray-400 text-sm">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/{{ $appSettings->whatsapp }}?text=Halo,%20saya%20ingin%20konsultasi%20tentang%20proyek%20las"
        target="_blank"
        class="fixed bottom-6 right-6 z-50 w-14 h-14 bg-green-500 rounded-full flex items-center justify-center shadow-lg hover:bg-green-600 transition-colors group">
        <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
        </svg>
        <span class="absolute right-full mr-3 bg-white text-dark-900 px-3 py-2 rounded-lg text-sm font-medium shadow-lg opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">
            Chat via WhatsApp
        </span>
    </a>

    @stack('scripts')
</body>

</html>
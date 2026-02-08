@extends('layouts.app')

@section('title', 'Kanal Las Baja - Bengkel Las Profesional & Terpercaya')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-dark-950 via-dark-900 to-dark-800 text-white overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=%2260%22 height=%2260%22 viewBox=%220 0 60 60%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cg fill=%22none%22 fill-rule=%22evenodd%22%3E%3Cg fill=%22%23ffffff%22 fill-opacity=%220.4%22%3E%3Cpath d=%22M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>

    <!-- Sparks Effect -->
    <div class="absolute top-20 right-10 w-64 h-64 bg-primary-500/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-20 left-10 w-48 h-48 bg-primary-500/10 rounded-full blur-2xl"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <div class="flex items-center space-x-2 mb-6">
                    <div class="w-1 h-6 bg-primary-500"></div>
                    <span class="text-primary-400 text-sm font-semibold tracking-widest uppercase">EXPERT METAL CONSTRUCTION</span>
                </div>

                <h1 class="text-4xl md:text-5xl lg:text-6xl font-black leading-tight mb-6">
                    BENGKEL LAS<br>
                    <span class="text-primary-500">PROFESIONAL</span> &<br>
                    TERPERCAYA
                </h1>

                <p class="text-lg text-gray-300 mb-8 max-w-lg">
                    Kami menghadirkan presisi arsitektural untuk rumah dan industri di Jakarta. Spesialis konstruksi besi, kanopi, pagar, dan struktur baja kelas berat.
                </p>

                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-8 py-4 bg-primary-500 text-white font-bold rounded-lg hover:bg-primary-600 transition-colors">
                        HUBUNGI KAMI
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                    <a href="{{ route('portfolio.index') }}" class="inline-flex items-center justify-center px-8 py-4 bg-transparent border-2 border-white text-white font-bold rounded-lg hover:bg-white hover:text-dark-900 transition-colors">
                        LIHAT PORTFOLIO
                    </a>
                </div>
            </div>

            <div class="hidden lg:block relative">
                <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                    <img src="https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?w=600&h=500&fit=crop"
                        alt="Kanal Las Baja Workshop"
                        class="w-full h-[500px] object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-dark-900/60 to-transparent"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-4">
            <div class="flex items-center justify-center space-x-4 mb-4">
                <div class="w-12 h-px bg-primary-500"></div>
                <span class="text-primary-500 text-sm font-semibold tracking-wider">MENGAPA</span>
                <div class="w-12 h-px bg-primary-500"></div>
            </div>
            <h2 class="text-3xl md:text-4xl font-black text-dark-900">MEMILIH KAMI?</h2>
        </div>

        <p class="text-center text-gray-600 mb-12 max-w-2xl mx-auto">
            Komitmen kami adalah memberikan hasil akhir yang tidak hanya kuat secara struktural, tapi juga estetis secara visual.
        </p>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-primary-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-dark-900 mb-3">SNI STANDAR</h3>
                <p class="text-gray-600">Material berkualitas tinggi dengan standar SNI untuk keamanan maksimal.</p>
            </div>

            <!-- Feature 2 -->
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-primary-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-dark-900 mb-3">HARGA JUJUR</h3>
                <p class="text-gray-600">Transparansi biaya tanpa biaya tersembunyi. Sesuai dengan spesifikasi material.</p>
            </div>

            <!-- Feature 3 -->
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-primary-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-dark-900 mb-3">TEPAT WAKTU</h3>
                <p class="text-gray-600">Manajemen proyek profesional memastikan pengerjaan sesuai deadline.</p>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="layanan" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-primary-500 text-sm font-semibold tracking-widest uppercase">LAYANAN UNGGULAN</span>
            <h2 class="text-3xl md:text-4xl font-black text-dark-900 mt-2">SOLUSI KONSTRUKSI BESI</h2>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Service 1 -->
            <div class="bg-white rounded-xl p-6 shadow-sm hover:shadow-lg transition-shadow">
                <div class="w-12 h-12 bg-dark-900 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-dark-900 mb-2">PAGAR & PINTU</h3>
                <p class="text-sm text-gray-600">Pagar minimalis, tempa, hingga pintu lipat industri dengan material bahan besi berat.</p>
            </div>

            <!-- Service 2 -->
            <div class="bg-white rounded-xl p-6 shadow-sm hover:shadow-lg transition-shadow">
                <div class="w-12 h-12 bg-dark-900 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-dark-900 mb-2">KANOPI</h3>
                <p class="text-sm text-gray-600">Kanopi Alderon, Solarflat, hingga kaca tempered untuk perlindungan maksimal estetis.</p>
            </div>

            <!-- Service 3 -->
            <div class="bg-white rounded-xl p-6 shadow-sm hover:shadow-lg transition-shadow">
                <div class="w-12 h-12 bg-dark-900 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-dark-900 mb-2">TANGGA & RAILING</h3>
                <p class="text-sm text-gray-600">Tangga putar, tangga rekah, dan railing balkon dengan desain modern industrial.</p>
            </div>

            <!-- Service 4 -->
            <div class="bg-white rounded-xl p-6 shadow-sm hover:shadow-lg transition-shadow">
                <div class="w-12 h-12 bg-dark-900 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-dark-900 mb-2">STRUKTUR BAJA</h3>
                <p class="text-sm text-gray-600">Konstruksi gudang, rangka atap baja ringan, dan struktur besi WF/H-Beam.</p>
            </div>
        </div>

        <!-- Custom Order CTA -->
        <div class="mt-10 bg-primary-500 rounded-xl p-6 md:p-8 flex flex-col md:flex-row items-center justify-between">
            <div class="text-center md:text-left mb-4 md:mb-0">
                <h3 class="text-xl font-bold text-white mb-1">BUTUH PESANAN CUSTOM?</h3>
                <p class="text-primary-100">Punya ide proyek unik atau spesifikasi khusus? Tim ahli kami siap memberikan konsultasi desain dan material terbaik.</p>
            </div>
            <a href="{{ route('contact') }}" class="flex-shrink-0 inline-flex items-center px-6 py-3 bg-dark-900 text-white font-semibold rounded-lg hover:bg-dark-800 transition-colors">
                HUBUNGI KAMI
            </a>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="relative">
                <div class="rounded-2xl overflow-hidden shadow-xl">
                    <img src="{{ asset('images/latar.jpeg') }}"
                        alt="Workshop Interior"
                        class="w-full h-[400px] object-cover">
                </div>

                <div class="absolute -bottom-6 -right-6 bg-primary-500 text-white p-6 rounded-xl shadow-lg hidden md:block">
                    <div class="text-4xl font-black">5+</div>
                    <div class="text-sm">Tahun Pengalaman</div>
                </div>
            </div>

            <div>
                <span class="text-primary-500 text-sm font-semibold tracking-widest uppercase">KEAHLIAN</span>
                <h2 class="text-3xl md:text-4xl font-black text-dark-900 mt-2 mb-6">
                    BENGKEL LAS KANAL BAJA: AHLI KONSTRUKSI BESI
                </h2>
                <p class="text-gray-600 mb-6">
                    Berawal dari bengkel kecil di sudut kota Jakarta, kini kami telah melayani ratusan proyek. Fokus kami adalah pada integritas struktur dan detail estetika yang presisi.
                </p>
                <p class="text-gray-600 mb-8">
                    Kami memahami bahwa setiap pagar, kanopi, atau konstruksi baja bukan hanya soal fungsi, tapi juga investasi jangka panjang Anda.
                </p>

                <div class="grid grid-cols-2 gap-6">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-primary-100 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-dark-900">5+ TAHUN PENGALAMAN</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-primary-100 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-dark-900">500+ PROYEK SELESAI</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-primary-100 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-dark-900">TIM AHLI</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-primary-100 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-dark-900">GARANSI PENGERJAAN</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Portfolio Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end md:justify-between mb-12">
            <div>
                <span class="text-primary-500 text-sm font-semibold tracking-widest uppercase">PORTFOLIO</span>
                <h2 class="text-3xl md:text-4xl font-black text-dark-900 mt-2">HASIL KARYA TERBARU</h2>
            </div>
            <div class="mt-4 md:mt-0">
                <a href="{{ route('portfolio.index') }}" class="inline-flex items-center text-dark-900 font-semibold hover:text-primary-500 transition-colors">
                    LIHAT SEMUA PORTFOLIO
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>
        </div>

        @if($featuredPortfolios->count() > 0)
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($featuredPortfolios->take(4) as $portfolio)
            <a href="{{ route('portfolio.show', $portfolio) }}" class="group">
                <div class="relative rounded-xl overflow-hidden aspect-[4/3]">
                    <img src="{{ $portfolio->thumbnail }}"
                        alt="{{ $portfolio->title }}"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    <div class="absolute inset-0 bg-gradient-to-t from-dark-900/70 to-transparent"></div>
                    <div class="absolute bottom-4 left-4 right-4">
                        <span class="text-xs font-semibold text-primary-400 uppercase">{{ $portfolio->category_label }}</span>
                        <h3 class="text-white font-bold mt-1 line-clamp-2">{{ $portfolio->title }}</h3>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        @else
        <div class="text-center py-12 bg-white rounded-xl">
            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <p class="text-gray-500">Belum ada portfolio yang tersedia.</p>
        </div>
        @endif
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-primary-500">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">SIAP MEMULAI PROYEK ANDA?</h2>
        <p class="text-primary-100 mb-8">Dapatkan estimasi biaya dan konsultasi desain gratis bersama tim ahli kami hari ini.</p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="https://wa.me/{{ $appSettings->whatsapp }}?text=Halo,%20saya%20ingin%20konsultasi%20tentang%20proyek%20las"
                target="_blank"
                class="inline-flex items-center justify-center px-8 py-4 bg-green-500 text-white font-bold rounded-lg hover:bg-green-600 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                </svg>
                CHAT VIA WHATSAPP
            </a>
            <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-8 py-4 bg-transparent border-2 border-white text-white font-bold rounded-lg hover:bg-white hover:text-primary-500 transition-colors">
                HUBUNGI VIA EMAIL
            </a>
        </div>
    </div>
</section>
@endsection
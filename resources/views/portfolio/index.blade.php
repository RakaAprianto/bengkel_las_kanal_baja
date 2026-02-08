@extends('layouts.app')

@section('title', 'Portfolio Proyek - Kanal Las Baja')
@section('meta_description', 'Kumpulan karya konstruksi besi berkualitas tinggi. Berpengalaman lebih dari 5 tahun mewujudkan desain industrial dan minimalis di Jakarta.')

@section('content')
<!-- Hero Section -->
<section class="bg-white py-16 lg:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between">
            <div>
                <div class="flex items-center space-x-2 mb-4">
                    <div class="w-1 h-6 bg-primary-500"></div>
                    <span class="text-primary-500 text-sm font-semibold tracking-widest uppercase">TERJAMIN DIDUNIA LAS</span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-dark-900 leading-tight">
                    PORTOFOLIO<br>
                    <span class="text-gray-400">PROYEK</span>
                </h1>
                <p class="text-gray-600 mt-4 max-w-xl">
                    Kumpulan karya konstruksi besi berkualitas tinggi. Berpengalaman lebih dari 5 tahun mewujudkan desain industrial dan minimalis di Jakarta.
                </p>
            </div>

            <div class="mt-6 lg:mt-0">
                <a href="#" class="inline-flex items-center px-6 py-3 border-2 border-dark-900 text-dark-900 font-semibold rounded-lg hover:bg-dark-900 hover:text-white transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Download Katalog PDF
                </a>
            </div>
        </div>

        <!-- Category Filter Tabs -->
        <div class="mt-12 flex flex-wrap gap-3" x-data="{ activeCategory: '{{ $activeCategory }}' }">
            <a href="{{ route('portfolio.index') }}"
                class="px-6 py-2.5 rounded-full text-sm font-semibold transition-colors {{ $activeCategory === 'all' ? 'bg-dark-900 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                All Projects
            </a>
            @foreach($categories as $key => $label)
            <a href="{{ route('portfolio.index', ['category' => $key]) }}"
                class="px-6 py-2.5 rounded-full text-sm font-semibold transition-colors {{ $activeCategory === $key ? 'bg-dark-900 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                {{ $label }}
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- Portfolio Grid -->
<section class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($portfolios->count() > 0)
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($portfolios as $portfolio)
            <a href="{{ route('portfolio.show', $portfolio) }}" class="group bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-shadow">
                <div class="relative aspect-[4/3] overflow-hidden">
                    <img src="{{ $portfolio->thumbnail }}"
                        alt="{{ $portfolio->title }}"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @if($portfolio->is_featured)
                    <span class="absolute top-4 left-4 px-3 py-1 bg-primary-500 text-white text-xs font-semibold rounded-full">
                        FEATURED PROJECT
                    </span>
                    @endif
                </div>
                <div class="p-6">
                    <span class="text-xs font-semibold text-primary-500 uppercase tracking-wider">{{ $portfolio->category_label }}</span>
                    <h3 class="text-lg font-bold text-dark-900 mt-2 group-hover:text-primary-500 transition-colors">{{ $portfolio->title }}</h3>
                    <div class="flex items-center text-sm text-gray-500 mt-2">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        </svg>
                        {{ $portfolio->location }}
                    </div>
                    @if($portfolio->price)
                    <div class="mt-3 pt-3 border-t">
                        <span class="text-lg font-bold text-green-600">{{ $portfolio->formatted_price }}</span>
                    </div>
                    @endif
                </div>
            </a>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $portfolios->appends(request()->query())->links() }}
        </div>
        @else
        <div class="text-center py-20">
            <svg class="w-20 h-20 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <h3 class="text-xl font-bold text-gray-500 mb-2">Belum Ada Portfolio</h3>
            <p class="text-gray-400">Portfolio proyek akan segera ditampilkan.</p>
        </div>
        @endif
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-primary-500">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">
            SIAP WUJUDKAN PROYEK BESI ANDA?
        </h2>
        <p class="text-primary-100 mb-8">
            Konsultasikan desain pagar, kanopi, atau konstruksi lainnya secara GRATIS bersama tim ahli kami di Jakarta.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="https://wa.me/{{ $appSettings->whatsapp }}?text=Halo,%20saya%20tertarik%20dengan%20portfolio%20Anda"
                target="_blank"
                class="inline-flex items-center justify-center px-8 py-4 bg-green-500 text-white font-bold rounded-lg hover:bg-green-600 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                </svg>
                WHATSAPP SEKARANG
            </a>
            <a href="#" class="inline-flex items-center justify-center px-8 py-4 bg-transparent border-2 border-white text-white font-bold rounded-lg hover:bg-white hover:text-primary-500 transition-colors">
                LIHAT KATALOG HARGA
            </a>
        </div>
    </div>
</section>
@endsection
@extends('layouts.app')

@section('title', $portfolio->title . ' - Kanal Las Baja')
@section('meta_description', Str::limit($portfolio->description, 160))

@section('content')
<!-- Breadcrumb -->
<section class="bg-white py-4 border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center space-x-2 text-sm">
            <a href="{{ route('portfolio.index') }}" class="text-gray-500 hover:text-dark-900">PORTFOLIO</a>
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
            <a href="{{ route('portfolio.index', ['category' => $portfolio->category]) }}" class="text-gray-500 hover:text-dark-900 uppercase">{{ $portfolio->category_label }}</a>
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
            <span class="text-dark-900 font-medium">{{ $portfolio->title }}</span>
        </nav>
    </div>
</section>

<!-- Portfolio Detail -->
<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-12">
            <!-- Left Column - Content -->
            <div class="lg:col-span-2">
                <h1 class="text-3xl md:text-4xl font-black text-dark-900 mb-2">{{ Str::upper($portfolio->title) }}</h1>
                <p class="text-gray-600 text-lg mb-8">{{ $portfolio->description ?? 'Industrial-grade craftsmanship for modern residential security. A fusion of durability and minimalist aesthetic.' }}</p>

                <!-- Main Image Gallery -->
                <div x-data="{ activeImage: 0 }" class="mb-8">
                    <!-- Main Image -->
                    <div class="relative rounded-2xl overflow-hidden aspect-[16/10] mb-4">
                        @if($portfolio->images->count() > 0)
                        @foreach($portfolio->images as $index => $image)
                        <img x-show="activeImage === {{ $index }}"
                            src="{{ $image->url }}"
                            alt="{{ $portfolio->title }}"
                            class="w-full h-full object-cover"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100">
                        @endforeach
                        @if($portfolio->is_featured)
                        <span class="absolute top-4 left-4 px-4 py-2 bg-primary-500 text-white text-xs font-bold rounded-full uppercase">
                            Featured Project
                        </span>
                        @endif
                        @else
                        <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=800&h=500&fit=crop"
                            alt="{{ $portfolio->title }}"
                            class="w-full h-full object-cover">
                        @endif
                    </div>

                    <!-- Thumbnails -->
                    @if($portfolio->images->count() > 1)
                    <div class="grid grid-cols-4 gap-3">
                        @foreach($portfolio->images->take(4) as $index => $image)
                        <button @click="activeImage = {{ $index }}"
                            class="rounded-lg overflow-hidden aspect-square border-2 transition-colors"
                            :class="activeImage === {{ $index }} ? 'border-primary-500' : 'border-transparent hover:border-gray-300'">
                            <img src="{{ $image->url }}"
                                alt="Thumbnail {{ $index + 1 }}"
                                class="w-full h-full object-cover">
                        </button>
                        @endforeach
                    </div>
                    @endif
                </div>

                <!-- Challenge & Craft -->
                @if($portfolio->challenge)
                <div class="border-t pt-8">
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="w-1 h-6 bg-primary-500"></div>
                        <h2 class="text-xl font-black text-dark-900 uppercase">TANTANGAN & KESULITAN</h2>
                    </div>

                    <div class="prose prose-lg max-w-none text-gray-600">
                        {!! nl2br(e($portfolio->challenge)) !!}
                    </div>
                </div>
                @endif
            </div>

            <!-- Right Column - Specs & CTA -->
            <div class="lg:col-span-1">
                <!-- Technical Specifications -->
                <div class="bg-gray-50 rounded-xl p-6 mb-6">
                    <h3 class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-6">SPESIFIKASI TEKNIS</h3>

                    <div class="space-y-5">
                        @if($portfolio->price)
                        <div class="flex items-start space-x-3 bg-green-50 -mx-2 px-2 py-3 rounded-lg">
                            <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs font-semibold text-gray-500 uppercase">HARGA PROYEK</p>
                                <p class="text-lg font-bold text-green-600">{{ $portfolio->formatted_price }}</p>
                            </div>
                        </div>
                        @endif

                        @if($portfolio->material)
                        <div class="flex items-start space-x-3">
                            <div class="w-10 h-10 bg-primary-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs font-semibold text-gray-500 uppercase">MATERIAL</p>
                                <p class="text-dark-900 font-medium">{{ $portfolio->material }}</p>
                            </div>
                        </div>
                        @endif

                        <div class="flex items-start space-x-3">
                            <div class="w-10 h-10 bg-primary-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs font-semibold text-gray-500 uppercase">LOKASI</p>
                                <p class="text-dark-900 font-medium">{{ $portfolio->location }}</p>
                            </div>
                        </div>

                        @if($portfolio->finishing)
                        <div class="flex items-start space-x-3">
                            <div class="w-10 h-10 bg-primary-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs font-semibold text-gray-500 uppercase">FINISH</p>
                                <p class="text-dark-900 font-medium">{{ $portfolio->finishing }}</p>
                            </div>
                        </div>
                        @endif

                        <div class="flex items-start space-x-3">
                            <div class="w-10 h-10 bg-primary-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs font-semibold text-gray-500 uppercase">TAHUN PENGERJAAN</p>
                                <p class="text-dark-900 font-medium">{{ $portfolio->completion_year }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CTA Buttons -->
                <div class="space-y-3">
                    <a href="{{ route('contact') }}"
                        class="w-full inline-flex items-center justify-center px-6 py-4 bg-dark-900 text-white font-bold rounded-lg hover:bg-dark-800 transition-colors">
                        MINTA PENAWARAN SERUPA
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>

                    <a href="https://wa.me/{{ $appSettings->whatsapp }}?text=Halo,%20saya%20tertarik%20dengan%20proyek%20{{ urlencode($portfolio->title) }}"
                        target="_blank"
                        class="w-full inline-flex items-center justify-center px-6 py-4 border-2 border-green-500 text-green-600 font-bold rounded-lg hover:bg-green-500 hover:text-white transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                        </svg>
                        KONSULTASI VIA WHATSAPP
                    </a>
                </div>

                <!-- Guarantees -->
                <div class="mt-8 space-y-4">
                    <div class="flex items-start space-x-3 p-4 bg-green-50 rounded-lg">
                        <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Respon cepat dalam <strong class="text-dark-900">1x24 jam</strong> untuk wilayah Jakarta & sekitarnya.</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-3 p-4 bg-primary-50 rounded-lg">
                        <div class="w-8 h-8 bg-primary-500 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-dark-900">Garansi 2 Tahun</p>
                            <p class="text-sm text-gray-600">Jaminan kekuatan las & antikarat.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Projects -->
@if($relatedPortfolios->count() > 0)
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-black text-dark-900 uppercase">YOU MIGHT ALSO LIKE</h2>
            <a href="{{ route('portfolio.index') }}" class="inline-flex items-center text-dark-900 font-semibold hover:text-primary-500 transition-colors">
                VIEW ALL PROJECTS
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                </svg>
            </a>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @foreach($relatedPortfolios as $related)
            <a href="{{ route('portfolio.show', $related) }}" class="group bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-shadow">
                <div class="relative aspect-[4/3] overflow-hidden">
                    <img src="{{ $related->thumbnail }}"
                        alt="{{ $related->title }}"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-5">
                    <span class="text-xs font-semibold text-primary-500 uppercase tracking-wider">{{ $related->category_label }}</span>
                    <h3 class="text-lg font-bold text-dark-900 mt-1 group-hover:text-primary-500 transition-colors uppercase">{{ $related->title }}</h3>
                    <p class="text-sm text-gray-500 mt-1">{{ $related->location }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
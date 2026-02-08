@extends('layouts.app')

@section('title', 'Kontak & Lokasi - Kanal Las Baja')
@section('meta_description', 'Hubungi bengkel las profesional di Jakarta. Konsultasi gratis untuk pagar, kanopi, railing, dan konstruksi baja.')

@section('content')
<!-- Hero Section -->
<section class="bg-white py-16 lg:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-dark-900 leading-tight">
            KONTAK<br>
            <span class="text-gray-400">& LOKASI</span>
        </h1>
        <p class="text-gray-600 mt-4 max-w-xl text-lg">
            Layanan pengelasan profesional dan konstruksi besi presisi. Kunjungi bengkel kami di Jakarta untuk kebutuhan fabrikasi custom.
        </p>
    </div>
</section>

<!-- Contact Section -->
<section class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12">
            <!-- Left Column - Contact Info & Form -->
            <div>
                <!-- Quick Contact Cards -->
                <div class="grid grid-cols-2 gap-4 mb-8">
                    <div class="bg-white rounded-xl p-6 border-2 border-gray-100">
                        <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <p class="text-xs font-semibold text-gray-500 uppercase mb-1">Telpon</p>
                        <p class="text-lg font-bold text-dark-900">+6256 9337 8749</p>
                    </div>

                    <div class="bg-white rounded-xl p-6 border-2 border-gray-100">
                        <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-primary-500" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                            </svg>
                        </div>
                        <p class="text-xs font-semibold text-gray-500 uppercase mb-1">WHATSAPP</p>
                        <p class="text-lg font-bold text-dark-900">+6256 9337 8749</p>
                    </div>
                </div>

                <!-- Workshop Address -->
                <div class="bg-white rounded-xl p-6 border-2 border-primary-200 mb-8">
                    <div class="flex items-start space-x-3">
                        <div class="w-10 h-10 bg-primary-500 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-gray-500 uppercase mb-1">Alamat Bengkel</p>
                            <p class="text-lg font-bold text-dark-900">Jl. Asam, RT.12/RW.3, Pulo Gebang, Kec. Cakung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13950</p>
                            <p class="text-sm text-gray-500 mt-1">Dekat Terminal Pulo Gebang</p>
                        </div>
                    </div>
                </div>

                <!-- Inquiry Form -->
                <div class="bg-white rounded-xl p-6 border border-gray-200">
                    <h2 class="text-2xl font-black text-dark-900 mb-6">Kirim Pertanyaan Atau Permintaan</h2>

                    @if(session('success'))
                    <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg">
                        {{ session('success') }}
                    </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf

                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="name" class="block text-xs font-semibold text-gray-500 uppercase mb-2">Nama</label>
                                <input type="text"
                                    name="name"
                                    id="name"
                                    value="{{ old('name') }}"
                                    placeholder="Raka A"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 @error('name') border-red-500 @enderror">
                                @error('name')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="phone" class="block text-xs font-semibold text-gray-500 uppercase mb-2">Telepon / WA</label>
                                <input type="text"
                                    name="phone"
                                    id="phone"
                                    value="{{ old('phone') }}"
                                    placeholder="0812..."
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 @error('phone') border-red-500 @enderror">
                                @error('phone')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="project_type" class="block text-xs font-semibold text-gray-500 uppercase mb-2">JENIS PROYEK</label>
                            <select name="project_type"
                                id="project_type"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 @error('project_type') border-red-500 @enderror">
                                <option value="">Pilih Jenis Proyek...</option>
                                @foreach($projectTypes as $key => $label)
                                <option value="{{ $label }}" {{ old('project_type') == $label ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                                <option value="Structural Steel Construction" {{ old('project_type') == 'Structural Steel Construction' ? 'selected' : '' }}>Structural Steel Construction</option>
                                <option value="Other" {{ old('project_type') == 'Other' ? 'selected' : '' }}>Lainnya / Proyek Kustom</option>
                            </select>
                            @error('project_type')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="message" class="block text-xs font-semibold text-gray-500 uppercase mb-2">PESAN</label>
                            <textarea name="message"
                                id="message"
                                rows="4"
                                placeholder="Jelaskan kebutuhan proyek Anda..."
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 resize-none @error('message') border-red-500 @enderror">{{ old('message') }}</textarea>
                            @error('message')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="w-full px-6 py-4 bg-dark-900 text-white font-bold rounded-lg hover:bg-dark-800 transition-colors">
                            KIRIM PERMINTAAN >
                        </button>
                    </form>
                </div>
            </div>

            <!-- Right Column - Map & Hours -->
            <div>
                <!-- Location Label -->
                <div class="inline-block px-4 py-2 bg-primary-500 text-white text-sm font-bold rounded-t-lg">
                    Lokasi Bengkel Kami
                </div>

                <!-- Map -->
                <div class="bg-gray-200 rounded-b-xl rounded-tr-xl overflow-hidden h-80 mb-6">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.3789074713386!2d106.95334537483572!3d-6.213657060861808!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698deec4a50fe7%3A0xa73425afe4c18e7d!2sBengkel%20Las%20Kanal%20Baja!5e0!3m2!1sid!2sid!4v1767959787328!5m2!1sid!2sid"
                        width="100%"
                        height="100%"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

                <a href="https://maps.google.com" target="_blank" class="inline-flex items-center text-dark-900 font-semibold hover:text-primary-500 transition-colors mb-8">
                    OPEN IN GOOGLE MAPS
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                </a>

                <!-- Operating Hours -->
                <div class="bg-dark-900 rounded-xl p-6 text-white">
                    <div class="flex items-center space-x-2 mb-6">
                        <div class="w-8 h-8 bg-primary-500 rounded-full flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold uppercase">JAM OPERASIONAL</h3>
                    </div>

                    <div class="space-y-3">
                        <div class="flex justify-between items-center py-2 border-b border-dark-700">
                            <span class="text-gray-300">Senin — Jumat</span>
                            <span class="font-semibold">08:00 - 17:00</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-dark-700">
                            <span class="text-gray-300">Sabtu</span>
                            <span class="font-semibold">08:00 - 17:00</span>
                        </div>
                        <div class="flex justify-between items-center py-2">
                            <span class="text-gray-300">Sunday</span>
                            <span class="font-semibold text-red-400">CLOSED</span>
                        </div>
                    </div>

                    <p class="text-sm text-gray-400 mt-6">
                        * Perbaikan darurat atau kunjungan ke lokasi dapat dijadwalkan melalui WhatsApp di luar jam kerja reguler.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Marquee -->
<section class="py-8 bg-dark-900 overflow-hidden">
    <div class="flex animate-marquee whitespace-nowrap">
        <span class="text-4xl font-black text-dark-700 mx-8">LAS TIG</span>
        <span class="text-4xl font-black text-dark-700 mx-8">LAS MIG</span>
        <span class="text-4xl font-black text-dark-700 mx-8">STRUKTUR BAJA</span>
        <span class="text-4xl font-black text-dark-700 mx-8">PEKERJAAN BESI</span>
        <span class="text-4xl font-black text-dark-700 mx-8">FABRIKASI KUSTOM</span>
        <span class="text-4xl font-black text-dark-700 mx-8">PEMBUATAN KANOPI</span>
        <span class="text-4xl font-black text-dark-700 mx-8">BAJA RINGAN</span>
        <span class="text-4xl font-black text-dark-700 mx-8">PEMBUATAN PAGAR</span>
    </div>
</section>

@push('styles')
<style>
    @keyframes marquee {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-50%);
        }
    }

    .animate-marquee {
        animation: marquee 20s linear infinite;
    }
</style>
@endpush
@endsection
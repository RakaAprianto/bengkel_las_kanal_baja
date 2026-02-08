@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Welcome Section -->
    <div class="bg-gradient-to-r from-primary-600 to-primary-700 rounded-xl p-6 text-white">
        <h1 class="text-2xl font-bold mb-2">Selamat Datang, {{ auth()->user()->name ?? 'Admin' }}! </h1>
        <p class="text-primary-100">Kelola portfolio, permintaan layanan, dan pengaturan website Anda dari sini.</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Portfolios -->
        <div class="bg-white rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Portfolio</p>
                    <p class="text-3xl font-bold text-dark-900 mt-1">{{ $stats['total_portfolios'] }}</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm">
                <span class="text-green-500 font-medium">{{ $stats['published_portfolios'] }} published</span>
                <span class="text-gray-400 mx-2">•</span>
                <span class="text-yellow-500 font-medium">{{ $stats['draft_portfolios'] }} draft</span>
            </div>
        </div>

        <!-- Published -->
        <div class="bg-white rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Published</p>
                    <p class="text-3xl font-bold text-dark-900 mt-1">{{ $stats['published_portfolios'] }}</p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <p class="mt-4 text-sm text-gray-500">Portfolio tersedia di website</p>
        </div>

        <!-- New Inquiries -->
        <div class="bg-white rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Layanan Masuk Baru</p>
                    <p class="text-3xl font-bold text-dark-900 mt-1">{{ $stats['new_inquiries'] }}</p>
                </div>
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
            <p class="mt-4 text-sm text-gray-500">Menunggu tanggapan</p>
        </div>

        <!-- Total Inquiries -->
        <div class="bg-white rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Layanan Masuk</p>
                    <p class="text-3xl font-bold text-dark-900 mt-1">{{ $stats['total_inquiries'] }}</p>
                </div>
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                    </svg>
                </div>
            </div>
            <p class="mt-4 text-sm text-gray-500">Semua pesan</p>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Portfolios -->
        <div class="bg-white rounded-xl shadow-sm">
            <div class="flex items-center justify-between px-6 py-4 border-b">
                <h2 class="text-lg font-bold text-dark-900">Portofolio Terbaru</h2>
                <a href="{{ route('admin.portfolio.index') }}" class="text-sm text-primary-600 font-medium hover:text-primary-700">View All</a>
            </div>
            <div class="p-6">
                @if($recentPortfolios->count() > 0)
                <div class="space-y-4">
                    @foreach($recentPortfolios as $portfolio)
                    <div class="flex items-center space-x-4">
                        <div class="w-16 h-12 bg-gray-100 rounded-lg overflow-hidden flex-shrink-0">
                            <img src="{{ $portfolio->thumbnail }}"
                                alt="{{ $portfolio->title }}"
                                class="w-full h-full object-cover">
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-dark-900 truncate">{{ $portfolio->title }}</p>
                            <p class="text-xs text-gray-500">{{ $portfolio->category_label }}</p>
                        </div>
                        <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $portfolio->status === 'published' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                            {{ ucfirst($portfolio->status) }}
                        </span>
                    </div>
                    @endforeach
                </div>
                @else
                <p class="text-gray-500 text-center py-8">Tidak Ada Portofolio.</p>
                @endif
            </div>
        </div>

        <!-- Recent Inquiries -->
        <div class="bg-white rounded-xl shadow-sm">
            <div class="flex items-center justify-between px-6 py-4 border-b">
                <h2 class="text-lg font-bold text-dark-900">Layanan Masuk Terbaru</h2>
                <a href="{{ route('admin.contacts.index') }}" class="text-sm text-primary-600 font-medium hover:text-primary-700">View All</a>
            </div>
            <div class="p-6">
                @if($recentInquiries->count() > 0)
                <div class="space-y-4">
                    @foreach($recentInquiries as $inquiry)
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-sm font-semibold text-gray-600">{{ substr($inquiry->name, 0, 1) }}</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-dark-900">{{ $inquiry->name }}</p>
                            <p class="text-xs text-gray-500 truncate">{{ $inquiry->message }}</p>
                        </div>
                        <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $inquiry->status_color }}">
                            {{ ucfirst($inquiry->status) }}
                        </span>
                    </div>
                    @endforeach
                </div>
                @else
                <p class="text-gray-500 text-center py-8">Tidak Ada Layanan Masuk.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Quick Links -->
    <div class="bg-white rounded-xl p-6 shadow-sm">
        <h2 class="text-lg font-bold text-dark-900 mb-4">Tindakan Cepat</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="{{ route('admin.portfolio.create') }}" class="flex flex-col items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center mb-2">
                    <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </div>
                <span class="text-sm font-medium text-dark-900">Tambah Portofolio</span>
            </a>

            <a href="{{ route('admin.contacts.index') }}" class="flex flex-col items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mb-2">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <span class="text-sm font-medium text-dark-900">Lihat Layanan Masuk</span>
            </a>

            <a href="{{ route('admin.settings.index') }}" class="flex flex-col items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                <div class="w-12 h-12 bg-gray-200 rounded-lg flex items-center justify-center mb-2">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <span class="text-sm font-medium text-dark-900">Settings</span>
            </a>

            <a href="{{ route('home') }}" target="_blank" class="flex flex-col items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-2">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                </div>
                <span class="text-sm font-medium text-dark-900">View Website</span>
            </a>
        </div>
    </div>
</div>
@endsection
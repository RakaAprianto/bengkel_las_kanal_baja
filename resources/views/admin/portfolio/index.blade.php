@extends('layouts.admin')

@section('title', 'Manage Portfolio')
@section('page_title', 'Manage Portfolio')

@section('header_actions')
<a href="{{ route('admin.portfolio.create') }}" class="inline-flex items-center px-4 py-2 bg-primary-600 text-white font-medium rounded-lg hover:bg-primary-700 transition-colors">
    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
    </svg>
    Add Portfolio
</a>
@endsection

@section('content')
<div class="bg-white rounded-xl shadow-sm">
    <!-- Filters -->
    <div class="px-6 py-4 border-b flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div class="flex items-center space-x-4">
            <select onchange="window.location.href=this.value" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                <option value="{{ route('admin.portfolio.index') }}" {{ !request('status') || request('status') == 'all' ? 'selected' : '' }}>All Status</option>
                <option value="{{ route('admin.portfolio.index', ['status' => 'published']) }}" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
                <option value="{{ route('admin.portfolio.index', ['status' => 'draft']) }}" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
            </select>

            <select onchange="window.location.href=this.value" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                <option value="{{ route('admin.portfolio.index') }}" {{ !request('category') || request('category') == 'all' ? 'selected' : '' }}>All Categories</option>
                @foreach($categories as $key => $label)
                <option value="{{ route('admin.portfolio.index', ['category' => $key]) }}" {{ request('category') == $key ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
            </select>
        </div>

        <p class="text-sm text-gray-500">{{ $portfolios->total() }} portfolio ditemukan</p>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Portfolio</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Kategori</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Harga</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase     tracking-wider">Lokasi</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Tanggal</th>
                    <th class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($portfolios as $portfolio)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-4">
                            <div class="w-16 h-12 bg-gray-100 rounded-lg overflow-hidden flex-shrink-0">
                                <img src="{{ $portfolio->thumbnail }}"
                                    alt="{{ $portfolio->title }}"
                                    class="w-full h-full object-cover">
                            </div>
                            <div>
                                <p class="text-sm font-medium text-dark-900">{{ $portfolio->title }}</p>
                                <p class="text-xs text-gray-500">{{ $portfolio->completion_year }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="text-sm text-gray-600">{{ $portfolio->category_label }}</span>
                    </td>
                    <td class="px-6 py-4">
                        @if($portfolio->price)
                        <span class="text-sm font-medium text-green-600">{{ $portfolio->formatted_price }}</span>
                        @else
                        <span class="text-sm text-gray-400">-</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <span class="text-sm text-gray-600">{{ $portfolio->location }}</span>
                    </td>
                    <td class="px-6 py-4">
                        @if($portfolio->status === 'published')
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            Published
                        </span>
                        @else
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                            Draft
                        </span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <span class="text-sm text-gray-500">{{ $portfolio->created_at->format('M d, Y') }}</span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end space-x-2">
                            <a href="{{ route('portfolio.show', $portfolio) }}"
                                target="_blank"
                                class="p-2 text-gray-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors"
                                title="View on site">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                </svg>
                            </a>
                            <a href="{{ route('admin.portfolio.edit', $portfolio) }}"
                                class="p-2 text-gray-400 hover:text-primary-600 hover:bg-primary-50 rounded-lg transition-colors"
                                title="Edit">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                            <form action="{{ route('admin.portfolio.destroy', $portfolio) }}"
                                method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this portfolio?')"
                                class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors"
                                    title="Delete">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-12 text-center">
                        <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <p class="text-gray-500 mb-4">No Portofolio ditemukan</p>
                        <a href="{{ route('admin.portfolio.create') }}" class="inline-flex items-center px-4 py-2 bg-primary-600 text-white font-medium rounded-lg hover:bg-primary-700">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Add Your First Portfolio
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($portfolios->hasPages())
    <div class="px-6 py-4 border-t">
        {{ $portfolios->links() }}
    </div>
    @endif
</div>
@endsection
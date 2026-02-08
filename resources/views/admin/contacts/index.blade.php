@extends('layouts.admin')

@section('title', 'Service Requests')
@section('page_title', 'Service Requests')

@section('content')
<div class="bg-white rounded-xl shadow-sm">
    <!-- Filters -->
    <div class="px-6 py-4 border-b flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div class="flex items-center space-x-4">
            <select onchange="window.location.href=this.value" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                <option value="{{ route('admin.contacts.index') }}" {{ !request('status') || request('status') == 'all' ? 'selected' : '' }}>All Status</option>
                <option value="{{ route('admin.contacts.index', ['status' => 'new']) }}" {{ request('status') == 'new' ? 'selected' : '' }}>New</option>
                <option value="{{ route('admin.contacts.index', ['status' => 'read']) }}" {{ request('status') == 'read' ? 'selected' : '' }}>Read</option>
                <option value="{{ route('admin.contacts.index', ['status' => 'replied']) }}" {{ request('status') == 'replied' ? 'selected' : '' }}>Replied</option>
            </select>
        </div>

        <p class="text-sm text-gray-500">{{ $inquiries->total() }} Layanan Masuk</p>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Kontak</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Tipe Proyek</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Pesan</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Tanggal</th>
                    <th class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($inquiries as $inquiry)
                <tr class="hover:bg-gray-50 {{ $inquiry->status === 'new' ? 'bg-yellow-50' : '' }}">
                    <td class="px-6 py-4">
                        <div>
                            <p class="text-sm font-medium text-dark-900">{{ $inquiry->name }}</p>
                            <p class="text-xs text-gray-500">{{ $inquiry->phone }}</p>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="text-sm text-gray-600">{{ $inquiry->project_type }}</span>
                    </td>
                    <td class="px-6 py-4 max-w-xs">
                        <p class="text-sm text-gray-600 truncate">{{ $inquiry->message }}</p>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $inquiry->status_color }}">
                            {{ ucfirst($inquiry->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="text-sm text-gray-500">{{ $inquiry->created_at->format('M d, Y') }}</span>
                        <p class="text-xs text-gray-400">{{ $inquiry->created_at->format('H:i') }}</p>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end space-x-2">
                            <a href="{{ route('admin.contacts.show', $inquiry) }}"
                                class="p-2 text-gray-400 hover:text-primary-600 hover:bg-primary-50 rounded-lg transition-colors"
                                title="View Details">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </a>
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $inquiry->phone) }}"
                                target="_blank"
                                class="p-2 text-gray-400 hover:text-green-600 hover:bg-green-50 rounded-lg transition-colors"
                                title="Reply via WhatsApp">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347" />
                                </svg>
                            </a>
                            <form action="{{ route('admin.contacts.destroy', $inquiry) }}"
                                method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this inquiry?')"
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
                    <td colspan="6" class="px-6 py-12 text-center">
                        <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <p class="text-gray-500">Tidak ada layanan masuk ditemukan</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($inquiries->hasPages())
    <div class="px-6 py-4 border-t">
        {{ $inquiries->links() }}
    </div>
    @endif
</div>
@endsection
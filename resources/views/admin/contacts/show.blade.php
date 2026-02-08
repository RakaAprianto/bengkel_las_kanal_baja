@extends('layouts.admin')

@section('title', 'View Inquiry')
@section('page_title', 'View Inquiry')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <!-- Header -->
        <div class="px-6 py-4 border-b bg-gray-50 flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-primary-100 rounded-full flex items-center justify-center">
                    <span class="text-lg font-bold text-primary-600">{{ substr($contact->name, 0, 1) }}</span>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-dark-900">{{ $contact->name }}</h2>
                    <p class="text-sm text-gray-500">{{ $contact->phone }}</p>
                </div>
            </div>
            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $contact->status_color }}">
                {{ ucfirst($contact->status) }}
            </span>
        </div>

        <!-- Content -->
        <div class="p-6 space-y-6">
            <!-- Project Type -->
            <div>
                <p class="text-xs font-semibold text-gray-500 uppercase mb-1">PROJECT TYPE</p>
                <p class="text-dark-900">{{ $contact->project_type }}</p>
            </div>

            <!-- Message -->
            <div>
                <p class="text-xs font-semibold text-gray-500 uppercase mb-1">MESSAGE</p>
                <p class="text-dark-900 whitespace-pre-wrap">{{ $contact->message }}</p>
            </div>

            <!-- Date -->
            <div>
                <p class="text-xs font-semibold text-gray-500 uppercase mb-1">RECEIVED</p>
                <p class="text-dark-900">{{ $contact->created_at->format('F d, Y \a\t H:i') }}</p>
            </div>

            <!-- Status Update -->
            <div class="border-t pt-6">
                <p class="text-xs font-semibold text-gray-500 uppercase mb-3">UPDATE STATUS</p>
                <form action="{{ route('admin.contacts.status', $contact) }}" method="POST" class="flex items-center space-x-3">
                    @csrf
                    @method('PATCH')
                    <select name="status" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                        <option value="new" {{ $contact->status == 'new' ? 'selected' : '' }}>New</option>
                        <option value="read" {{ $contact->status == 'read' ? 'selected' : '' }}>Read</option>
                        <option value="replied" {{ $contact->status == 'replied' ? 'selected' : '' }}>Replied</option>
                    </select>
                    <button type="submit" class="px-4 py-2 bg-primary-600 text-white font-medium rounded-lg hover:bg-primary-700 transition-colors">
                        Update
                    </button>
                </form>
            </div>
        </div>

        <!-- Actions -->
        <div class="px-6 py-4 border-t bg-gray-50 flex items-center justify-between">
            <a href="{{ route('admin.contacts.index') }}" class="text-gray-600 hover:text-gray-900 font-medium">
                ← Back to List
            </a>

            <div class="flex items-center space-x-3">
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact->phone) }}?text=Halo%20{{ urlencode($contact->name) }},%20terima%20kasih%20sudah%20menghubungi%20Kanal%20Las%20Baja.%20Mengenai%20permintaan%20{{ urlencode($contact->project_type) }}%20Anda..."
                    target="_blank"
                    class="inline-flex items-center px-4 py-2 bg-green-500 text-white font-medium rounded-lg hover:bg-green-600 transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347" />
                    </svg>
                    Reply via WhatsApp
                </a>

                <form action="{{ route('admin.contacts.destroy', $contact) }}"
                    method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this inquiry?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-500 text-white font-medium rounded-lg hover:bg-red-600 transition-colors">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
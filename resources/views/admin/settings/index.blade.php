@extends('layouts.admin')

@section('title', 'Settings')
@section('page_title', 'Settings')

@section('content')
<form action="{{ route('admin.settings.update') }}" method="POST">
    @csrf
    @method('PUT')

    <div class="max-w-3xl space-y-6">
        <!-- Company Information -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h2 class="text-lg font-bold text-dark-900 mb-6">Informasi Perusahaan</h2>

            <div class="space-y-4">
                <div>
                    <label for="company_name" class="block text-sm font-medium text-gray-700 mb-1">Nama Perusahaan</label>
                    <input type="text"
                        name="company_name"
                        id="company_name"
                        value="{{ old('company_name', $settings['company_name']) }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 @error('company_name') border-red-500 @enderror">
                    @error('company_name')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="company_tagline" class="block text-sm font-medium text-gray-700 mb-1">Tagline</label>
                    <input type="text"
                        name="company_tagline"
                        id="company_tagline"
                        value="{{ old('company_tagline', $settings['company_tagline']) }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 @error('company_tagline') border-red-500 @enderror">
                    @error('company_tagline')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Contact Information -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h2 class="text-lg font-bold text-dark-900 mb-6">Informasi Kontak</h2>

            <div class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Telepon</label>
                        <input type="text"
                            name="phone"
                            id="phone"
                            value="{{ old('phone', $settings['phone']) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 @error('phone') border-red-500 @enderror">
                        @error('phone')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="whatsapp" class="block text-sm font-medium text-gray-700 mb-1">WhatsApp</label>
                        <input type="text"
                            name="whatsapp"
                            id="whatsapp"
                            value="{{ old('whatsapp', $settings['whatsapp']) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 @error('whatsapp') border-red-500 @enderror">
                        @error('whatsapp')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email"
                        name="email"
                        id="email"
                        value="{{ old('email', $settings['email']) }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 @error('email') border-red-500 @enderror">
                    @error('email')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                    <textarea name="address"
                        id="address"
                        rows="2"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 resize-none @error('address') border-red-500 @enderror">{{ old('address', $settings['address']) }}</textarea>
                    @error('address')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Social Media -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h2 class="text-lg font-bold text-dark-900 mb-6">Social Media</h2>

            <div class="space-y-4">
                <div>
                    <label for="instagram" class="block text-sm font-medium text-gray-700 mb-1">Instagram URL</label>
                    <input type="text"
                        name="instagram"
                        id="instagram"
                        value="{{ old('instagram', $settings['instagram']) }}"
                        placeholder="https://instagram.com/yourpage"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                </div>

                <div>
                    <label for="facebook" class="block text-sm font-medium text-gray-700 mb-1">Facebook URL</label>
                    <input type="text"
                        name="facebook"
                        id="facebook"
                        value="{{ old('facebook', $settings['facebook']) }}"
                        placeholder="https://facebook.com/yourpage"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                </div>
            </div>
        </div>

        <!-- Google Maps -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h2 class="text-lg font-bold text-dark-900 mb-6">Google Maps Embed</h2>

            <div>
                <label for="google_maps_embed" class="block text-sm font-medium text-gray-700 mb-1">Embed URL</label>
                <textarea name="google_maps_embed"
                    id="google_maps_embed"
                    rows="3"
                    placeholder="Paste your Google Maps embed URL here..."
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 resize-none font-mono text-sm">{{ old('google_maps_embed', $settings['google_maps_embed']) }}</textarea>
                <p class="mt-1 text-xs text-gray-500">Get this from Google Maps → Share → Embed a map</p>
            </div>
        </div>

        <!-- Submit -->
        <div class="flex items-center justify-end space-x-4">
            <button type="submit" class="px-6 py-3 bg-primary-600 text-white font-semibold rounded-lg hover:bg-primary-700 transition-colors">
                Save Settings
            </button>
        </div>
    </div>
</form>
@endsection
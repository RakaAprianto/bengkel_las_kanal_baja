@extends('layouts.admin')

@section('title', 'Add New Portfolio')
@section('page_title', 'Add New Portfolio')

@section('header_actions')
<button type="button" onclick="document.getElementById('portfolio-form').submit();" class="inline-flex items-center px-4 py-2 bg-primary-600 text-white font-medium rounded-lg hover:bg-primary-700 transition-colors">
    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
    </svg>
    Terbitkan Proyek
</button>
@endsection

@section('content')
<form id="portfolio-form" action="{{ route('admin.portfolio.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Left Column - Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- General Information -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex items-center space-x-2 mb-6">
                    <div class="w-8 h-8 bg-primary-100 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h2 class="text-lg font-bold text-dark-900">Informasi Umum</h2>
                </div>

                <div class="space-y-4">
                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul Proyek</label>
                        <input type="text"
                            name="title"
                            id="title"
                            value="{{ old('title') }}"
                            placeholder="e.g. Industrial Steel Framework - Warehouse B"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 @error('title') border-red-500 @enderror">
                        @error('title')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <!-- Category -->
                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                            <select name="category"
                                id="category"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 @error('category') border-red-500 @enderror">
                                <option value="">Select category...</option>
                                @foreach($categories as $key => $label)
                                <option value="{{ $key }}" {{ old('category') == $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('category')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Completion Year -->
                        <div>
                            <label for="completion_year" class="block text-sm font-medium text-gray-700 mb-1">Tahun Pengerjaan</label>
                            <select name="completion_year"
                                id="completion_year"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 @error('completion_year') border-red-500 @enderror">
                                @foreach($years as $year)
                                <option value="{{ $year }}" {{ old('completion_year', date('Y')) == $year ? 'selected' : '' }}>{{ $year }}</option>
                                @endforeach
                            </select>
                            @error('completion_year')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Price -->
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Harga Proyek (Rp)</label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-500 font-medium">Rp</span>
                            <input type="number"
                                name="price"
                                id="price"
                                value="{{ old('price') }}"
                                placeholder="e.g. 15000000"
                                step="1000"
                                min="0"
                                class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 @error('price') border-red-500 @enderror">
                        </div>
                        <p class="mt-1 text-xs text-gray-500">Kosongkan jika tidak ingin menampilkan harga</p>
                        @error('price')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Technical Details -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex items-center space-x-2 mb-6">
                    <div class="w-8 h-8 bg-primary-100 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <h2 class="text-lg font-bold text-dark-900">Detail Teknis</h2>
                </div>

                <div class="space-y-4">
                    <!-- Location -->
                    <div>
                        <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Lokasi Proyek</label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                </svg>
                            </span>
                            <input type="text"
                                name="location"
                                id="location"
                                value="{{ old('location') }}"
                                placeholder="City, State / Project Site"
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 @error('location') border-red-500 @enderror">
                        </div>
                        @error('location')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Material -->
                    <div>
                        <label for="material" class="block text-sm font-medium text-gray-700 mb-1">Material & Fabrication</label>
                        <textarea name="material"
                            id="material"
                            rows="3"
                            placeholder="Detail the materials used (e.g., T-6061 Aluminum, Grade 50 Steel) and specific techniques applied..."
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 resize-none @error('material') border-red-500 @enderror">{{ old('material') }}</textarea>
                        @error('material')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Finishing -->
                    <div>
                        <label for="finishing" class="block text-sm font-medium text-gray-700 mb-1">Finishing</label>
                        <input type="text"
                            name="finishing"
                            id="finishing"
                            value="{{ old('finishing') }}"
                            placeholder="e.g., Matte Black Powder Coating"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 @error('finishing') border-red-500 @enderror">
                        @error('finishing')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex items-center space-x-2 mb-6">
                    <div class="w-8 h-8 bg-primary-100 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                        </svg>
                    </div>
                    <h2 class="text-lg font-bold text-dark-900">Deskripsi Proyek</h2>
                </div>

                <div class="space-y-4">
                    <!-- Short Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea name="description"
                            id="description"
                            rows="4"
                            placeholder="Describe the project, its purpose, and key features..."
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 resize-none @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                        @error('description')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Challenge & Craft -->
                    <div>
                        <label for="challenge" class="block text-sm font-medium text-gray-700 mb-1">Tantangan & Kesulitan (Optional)</label>
                        <textarea name="challenge"
                            id="challenge"
                            rows="4"
                            placeholder="Describe the challenges faced and craftsmanship applied..."
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 resize-none @error('challenge') border-red-500 @enderror">{{ old('challenge') }}</textarea>
                        @error('challenge')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column - Images & Status -->
        <div class="space-y-6">
            <!-- Project Gallery -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex items-center space-x-2 mb-6">
                    <div class="w-8 h-8 bg-primary-100 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h2 class="text-lg font-bold text-dark-900">Galeri Proyek</h2>
                </div>

                <div x-data="imageUploader()" class="space-y-4">
                    <!-- Drop Zone -->
                    <div class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center hover:border-primary-400 transition-colors cursor-pointer"
                        @click="$refs.fileInput.click()"
                        @dragover.prevent="dragover = true"
                        @dragleave.prevent="dragover = false"
                        @drop.prevent="handleDrop($event)"
                        :class="{ 'border-primary-500 bg-primary-50': dragover }">
                        <input type="file"
                            name="images[]"
                            multiple
                            accept="image/jpeg,image/png,image/jpg,image/webp"
                            class="hidden"
                            x-ref="fileInput"
                            @change="handleFiles($event)">

                        <div class="w-16 h-16 bg-primary-100 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                            </svg>
                        </div>
                        <p class="text-dark-900 font-medium">Drop photos here</p>
                        <p class="text-sm text-gray-500">or click to browse from device</p>
                        <p class="text-xs text-gray-400 mt-2">JPG, PNG, WEBP (MAX 10MB)</p>
                    </div>

                    <!-- Preview -->
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-2">PENDING UPLOADS (<span x-text="files.length">0</span>)</p>

                        <div x-show="files.length === 0" class="text-center py-8 bg-gray-50 rounded-lg">
                            <svg class="w-12 h-12 text-gray-300 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <p class="text-sm text-gray-400">No images selected yet</p>
                        </div>

                        <div x-show="files.length > 0" class="grid grid-cols-3 gap-2">
                            <template x-for="(file, index) in files" :key="index">
                                <div class="relative aspect-square rounded-lg overflow-hidden bg-gray-100">
                                    <img :src="file.preview" class="w-full h-full object-cover">
                                    <button type="button"
                                        @click="removeFile(index)"
                                        class="absolute top-1 right-1 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center hover:bg-red-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </template>
                        </div>
                    </div>

                    <!-- Tip -->
                    <div class="flex items-start space-x-2 p-3 bg-yellow-50 rounded-lg">
                        <svg class="w-5 h-5 text-yellow-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                        <p class="text-xs text-yellow-700">
                            <strong>Tip:</strong> Unggah setidaknya 3 foto beresolusi tinggi yang menampilkan berbagai sudut pengelasan serta struktur akhir.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Status & Options -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h2 class="text-lg font-bold text-dark-900 mb-4">Publish Settings</h2>

                <div class="space-y-4">
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select name="status"
                            id="status"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                            <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status', 'published') == 'published' ? 'selected' : '' }}>Published</option>
                        </select>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox"
                            name="is_featured"
                            id="is_featured"
                            value="1"
                            {{ old('is_featured') ? 'checked' : '' }}
                            class="w-4 h-4 text-primary-600 border-gray-300 rounded focus:ring-primary-500">
                        <label for="is_featured" class="ml-2 text-sm text-gray-700">Mark as Featured Project</label>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col gap-3">
                <button type="submit" name="status" value="published" class="w-full px-6 py-3 bg-primary-600 text-white font-semibold rounded-lg hover:bg-primary-700 transition-colors">
                    Publish Project
                </button>
                <button type="submit" name="status" value="draft" class="w-full px-6 py-3 bg-gray-100 text-gray-700 font-semibold rounded-lg hover:bg-gray-200 transition-colors">
                    Save as Draft
                </button>
                <a href="{{ route('admin.portfolio.index') }}" class="w-full px-6 py-3 text-center text-gray-500 font-medium hover:text-gray-700 transition-colors">
                    Discard Changes
                </a>
            </div>
        </div>
    </div>
</form>

@push('scripts')
<script>
    function imageUploader() {
        return {
            dragover: false,
            files: [],

            handleFiles(event) {
                const newFiles = Array.from(event.target.files);
                this.addFiles(newFiles);
            },

            handleDrop(event) {
                this.dragover = false;
                const newFiles = Array.from(event.dataTransfer.files);
                this.addFiles(newFiles);
            },

            addFiles(newFiles) {
                newFiles.forEach(file => {
                    if (file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            this.files.push({
                                file: file,
                                preview: e.target.result
                            });
                        };
                        reader.readAsDataURL(file);
                    }
                });
            },

            removeFile(index) {
                this.files.splice(index, 1);
            }
        }
    }
</script>
@endpush
@endsection
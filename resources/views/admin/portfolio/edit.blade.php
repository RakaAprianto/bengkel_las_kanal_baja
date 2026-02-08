@extends('layouts.admin')

@section('title', 'Edit Portfolio')
@section('page_title', 'Edit Portfolio')

@section('header_actions')
<button type="button" onclick="document.getElementById('portfolio-form').submit();" class="inline-flex items-center px-4 py-2 bg-primary-600 text-white font-medium rounded-lg hover:bg-primary-700 transition-colors">
    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
    </svg>
    Update Project
</button>
@endsection

@section('content')
<form id="portfolio-form" action="{{ route('admin.portfolio.update', $portfolio) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

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
                            value="{{ old('title', $portfolio->title) }}"
                            placeholder="e.g. Industrial Steel Framework - Warehouse B"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 @error('title') border-red-500 @enderror">
                        @error('title')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <!-- Category -->
                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                            <select name="category"
                                id="category"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 @error('category') border-red-500 @enderror">
                                <option value="">Plih Kategori...</option>
                                @foreach($categories as $key => $label)
                                <option value="{{ $key }}" {{ old('category', $portfolio->category) == $key ? 'selected' : '' }}>{{ $label }}</option>
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
                                <option value="{{ $year }}" {{ old('completion_year', $portfolio->completion_year) == $year ? 'selected' : '' }}>{{ $year }}</option>
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
                                value="{{ old('price', $portfolio->price) }}"
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
                                value="{{ old('location', $portfolio->location) }}"
                                placeholder="City, State / Project Site"
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 @error('location') border-red-500 @enderror">
                        </div>
                        @error('location')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Material -->
                    <div>
                        <label for="material" class="block text-sm font-medium text-gray-700 mb-1">Material & Fabrication Description</label>
                        <textarea name="material"
                            id="material"
                            rows="3"
                            placeholder="Detail the materials used..."
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 resize-none @error('material') border-red-500 @enderror">{{ old('material', $portfolio->material) }}</textarea>
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
                            value="{{ old('finishing', $portfolio->finishing) }}"
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
                    <h2 class="text-lg font-bold text-dark-900">Project Description</h2>
                </div>

                <div class="space-y-4">
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea name="description"
                            id="description"
                            rows="4"
                            placeholder="Describe the project..."
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 resize-none @error('description') border-red-500 @enderror">{{ old('description', $portfolio->description) }}</textarea>
                        @error('description')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="challenge" class="block text-sm font-medium text-gray-700 mb-1">Tantangan & Kesulitan (Opsional)</label>
                        <textarea name="challenge"
                            id="challenge"
                            rows="4"
                            placeholder="Describe the challenges faced..."
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 resize-none @error('challenge') border-red-500 @enderror">{{ old('challenge', $portfolio->challenge) }}</textarea>
                        @error('challenge')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column - Images & Status -->
        <div class="space-y-6">
            <!-- Existing Images -->
            @if($portfolio->images->count() > 0)
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h2 class="text-lg font-bold text-dark-900 mb-4">Gambar Sekarang</h2>
                <div class="grid grid-cols-2 gap-3">
                    @foreach($portfolio->images as $image)
                    <div class="relative aspect-square rounded-lg overflow-hidden bg-gray-100 group" x-data="{ deleting: false }">
                        <img src="{{ $image->url }}"
                            alt="Portfolio image"
                            class="w-full h-full object-cover">

                        @if($image->is_primary)
                        <span class="absolute top-2 left-2 px-2 py-1 bg-primary-500 text-white text-xs font-medium rounded">Primary</span>
                        @endif

                        <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center space-x-2">
                            @if(!$image->is_primary)
                            <button type="button"
                                @click="fetch('{{ route('admin.portfolio.image.primary', $image) }}', { method: 'POST', headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }}).then(() => location.reload())"
                                class="w-8 h-8 bg-white text-primary-600 rounded-full flex items-center justify-center hover:bg-primary-100"
                                title="Set as primary">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </button>
                            @endif
                            <button type="button"
                                @click="if(confirm('Delete this image?')) fetch('{{ route('admin.portfolio.image.delete', $image) }}', { method: 'DELETE', headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }}).then(() => location.reload())"
                                class="w-8 h-8 bg-white text-red-600 rounded-full flex items-center justify-center hover:bg-red-100"
                                title="Delete">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Add More Images -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h2 class="text-lg font-bold text-dark-900 mb-4">Tambahkan Gambar</h2>

                <div x-data="imageUploader()" class="space-y-4">
                    <!-- Drop Zone -->
                    <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-primary-400 transition-colors cursor-pointer"
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

                        <div class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                        </div>
                        <p class="text-sm text-dark-900 font-medium">Tambahkan Gambar Lagi</p>
                        <p class="text-xs text-gray-500">JPG, PNG, WEBP (MAX 10MB)</p>
                    </div>

                    <!-- Preview -->
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
                            <option value="draft" {{ old('status', $portfolio->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status', $portfolio->status) == 'published' ? 'selected' : '' }}>Published</option>
                        </select>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox"
                            name="is_featured"
                            id="is_featured"
                            value="1"
                            {{ old('is_featured', $portfolio->is_featured) ? 'checked' : '' }}
                            class="w-4 h-4 text-primary-600 border-gray-300 rounded focus:ring-primary-500">
                        <label for="is_featured" class="ml-2 text-sm text-gray-700">Mark as Featured Project</label>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col gap-3">
                <button type="submit" class="w-full px-6 py-3 bg-primary-600 text-white font-semibold rounded-lg hover:bg-primary-700 transition-colors">
                    Update Project
                </button>
                <a href="{{ route('admin.portfolio.index') }}" class="w-full px-6 py-3 text-center text-gray-500 font-medium hover:text-gray-700 transition-colors">
                    Cancel
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
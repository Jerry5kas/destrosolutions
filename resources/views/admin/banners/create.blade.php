<x-admin-layout :title="'Create Banner'" :header="'Create Banner'">
    <form method="POST" action="{{ route('admin.banners.store') }}" enctype="multipart/form-data" class="bg-white border border-gray-200 rounded-xl p-6 space-y-6">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Title <span class="text-red-500">*</span></label>
                <input name="title" value="{{ old('title') }}" class="input-field {{ $errors->has('title') ? 'input-error' : '' }}" placeholder="Enter banner title" required />
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Slogan</label>
                <input name="slogan" value="{{ old('slogan') }}" class="input-field" placeholder="Enter banner slogan" />
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Page <span class="text-red-500">*</span></label>
                <select name="page" class="input-field {{ $errors->has('page') ? 'input-error' : '' }}" required>
                    <option value="homepage" {{ old('page', 'homepage') == 'homepage' ? 'selected' : '' }}>Homepage</option>
                    <option value="page1" {{ old('page') == 'page1' ? 'selected' : '' }}>Page 1</option>
                    <option value="page2" {{ old('page') == 'page2' ? 'selected' : '' }}>Page 2</option>
                    <option value="page3" {{ old('page') == 'page3' ? 'selected' : '' }}>Page 3</option>
                </select>
                @error('page')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Image</label>
                <div class="drag-zone" x-data="{ files: [] }" @dragover.prevent @drop.prevent="files = Array.from($event.dataTransfer.files); $refs.fileInput.files = $event.dataTransfer.files">
                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="mt-2">
                        <p class="text-sm text-gray-600">Drag & drop an image here, or</p>
                        <label class="mt-2 cursor-pointer">
                            <span class="inline-flex items-center px-3 py-2 border border-gray-300 rounded-md text-sm text-gray-700 bg-white hover:bg-gray-50">
                                <x-icons name="plus" size="w-4 h-4" class="mr-2" />
                                Browse files
                            </span>
                            <input type="file" name="image" x-ref="fileInput" class="hidden" accept="image/*" />
                        </label>
                    </div>
                    <p class="mt-2 text-xs text-gray-500">PNG, JPG, WebP up to 10MB</p>
                </div>
                @error('image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
            <textarea name="description" rows="4" class="textarea-field {{ $errors->has('description') ? 'input-error' : '' }}" placeholder="Enter banner description...">{{ old('description') }}</textarea>
            @error('description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Text 1</label>
                <input name="text1" value="{{ old('text1') }}" class="input-field" placeholder="Enter text 1" />
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Text 2</label>
                <input name="text2" value="{{ old('text2') }}" class="input-field" placeholder="Enter text 2" />
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Text 3</label>
                <input name="text3" value="{{ old('text3') }}" class="input-field" placeholder="Enter text 3" />
            </div>
        </div>
        <div class="flex items-center">
            <input type="checkbox" name="is_active" value="1" id="is_active" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500" {{ old('is_active', true) ? 'checked' : '' }}>
            <label for="is_active" class="ml-2 text-sm font-medium text-gray-700">Active</label>
        </div>
        <div class="flex items-center gap-3 pt-4">
            <button type="submit" class="btn-primary" x-data="{ loading: false }" @click="loading = true" :disabled="loading">
                <span x-show="!loading">Create Banner</span>
                <span x-show="loading" class="flex items-center">
                    <x-loading-spinner size="sm" color="white" />
                    <span class="ml-2">Creating...</span>
                </span>
            </button>
            <a href="{{ route('admin.banners.index') }}" class="px-4 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">Cancel</a>
        </div>
    </form>
</x-admin-layout>



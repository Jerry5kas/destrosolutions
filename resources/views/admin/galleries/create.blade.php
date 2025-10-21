<x-admin-layout :title="'Create Gallery'" :header="'Create Gallery'">
    <form method="POST" action="{{ route('admin.galleries.store') }}" enctype="multipart/form-data" class="bg-white border border-gray-200 rounded-xl p-6 space-y-6">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Title <span class="text-red-500">*</span></label>
                <input name="title" value="{{ old('title') }}" class="input-field {{ $errors->has('title') ? 'input-error' : '' }}" placeholder="Enter gallery title" required />
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" min="0" class="input-field {{ $errors->has('sort_order') ? 'input-error' : '' }}" placeholder="Display order" />
                @error('sort_order')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
            <textarea name="description" rows="4" class="textarea-field {{ $errors->has('description') ? 'input-error' : '' }}" placeholder="Enter gallery description...">{{ old('description') }}</textarea>
            @error('description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Images <span class="text-red-500">*</span></label>
            <div x-data="{ images: [], addImage() { this.images.push({ file: null, preview: null }); }, removeImage(index) { this.images.splice(index, 1); }, handleFileChange(index, event) { const file = event.target.files[0]; if (file) { this.images[index].file = file; this.images[index].preview = URL.createObjectURL(file); } } }">
                <div class="space-y-4">
                    <template x-for="(image, index) in images" :key="index">
                        <div class="border border-gray-200 rounded-lg p-4">
                            <div class="flex items-center gap-4">
                                <div class="flex-shrink-0">
                                    <div x-show="!image.preview" class="w-20 h-20 bg-gray-100 rounded-lg flex items-center justify-center">
                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <img x-show="image.preview" :src="image.preview" class="w-20 h-20 object-cover rounded-lg" />
                                </div>
                                <div class="flex-1">
                                    <input type="file" 
                                           :name="`images[${index}]`"
                                           @change="handleFileChange(index, $event)"
                                           class="input-field" 
                                           accept="image/*" 
                                           required />
                                </div>
                                <button type="button" 
                                        @click="removeImage(index)"
                                        class="px-3 py-2 text-red-600 hover:bg-red-50 rounded-md">
                                    <x-icons name="delete" size="w-4 h-4" />
                                </button>
                            </div>
                        </div>
                    </template>
                </div>
                
                <button type="button" 
                        @click="addImage()"
                        class="mt-4 px-4 py-2 text-blue-600 hover:bg-blue-50 rounded-md flex items-center gap-2 border border-blue-200">
                    <x-icons name="plus" size="w-4 h-4" />
                    Add Image
                </button>
                
                <div x-init="addImage()"></div>
            </div>
            @error('images')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
            @error('images.*')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="flex items-center">
            <input type="checkbox" name="is_active" value="1" id="is_active" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500" {{ old('is_active', true) ? 'checked' : '' }}>
            <label for="is_active" class="ml-2 text-sm font-medium text-gray-700">Active</label>
        </div>
        
        <div class="flex items-center gap-3 pt-4">
            <button type="submit" class="btn-primary">
                Create Gallery
            </button>
            <a href="{{ route('admin.galleries.index') }}" class="px-4 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">Cancel</a>
        </div>
    </form>
</x-admin-layout>


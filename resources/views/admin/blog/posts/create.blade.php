@push('scripts')
    @vite('resources/js/quill-editor.js')
@endpush

<x-admin-layout :title="'Create Blog Post'" :header="'Create Blog Post'">
    <form method="POST" action="{{ route('admin.blog.posts.store') }}" enctype="multipart/form-data" class="bg-white border border-gray-200 rounded-xl p-6 space-y-6">
        @csrf
        
        <!-- Basic Information -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Title <span class="text-red-500">*</span></label>
                <input name="title" value="{{ old('title') }}" class="input-field {{ $errors->has('title') ? 'input-error' : '' }}" placeholder="Enter blog post title" required />
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Category <span class="text-red-500">*</span></label>
                <select name="category_id" class="input-field {{ $errors->has('category_id') ? 'input-error' : '' }}" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <!-- Feature Image -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Feature Image</label>
            <input type="file" name="image" class="input-field" accept="image/*" />
            <p class="mt-1 text-xs text-gray-500">This image will be displayed as the main feature image for the blog post.</p>
            @error('image')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <!-- Status and Featured -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="flex items-center">
                <input type="checkbox" name="is_active" value="1" id="is_active" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500" {{ old('is_active', true) ? 'checked' : '' }}>
                <label for="is_active" class="ml-2 text-sm font-medium text-gray-700">Active</label>
            </div>
            <div class="flex items-center">
                <input type="checkbox" name="is_featured" value="1" id="is_featured" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500" {{ old('is_featured') ? 'checked' : '' }}>
                <label for="is_featured" class="ml-2 text-sm font-medium text-gray-700">Featured/Suggested Post</label>
            </div>
        </div>
        
        <!-- Description -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Short Description <span class="text-red-500">*</span></label>
            <textarea name="description" rows="4" class="textarea-field {{ $errors->has('description') ? 'input-error' : '' }}" placeholder="Enter a short description/excerpt..." required>{{ old('description') }}</textarea>
            @error('description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <!-- Rich Text Content -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Full Content</label>
            <input type="hidden" name="subcontent" id="subcontent-input" value="{{ old('subcontent', '') }}" />
            <div id="subcontent-editor" class="bg-white {{ $errors->has('subcontent') ? 'border-2 border-red-500' : '' }}" data-content="{{ old('subcontent', '') }}"></div>
            <p class="mt-1 text-xs text-gray-500">Use this rich text editor to create formatted content with headings, lists, images, links, and more.</p>
            @error('subcontent')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <!-- Gallery Images -->
        <div x-data="{ imageCount: 1 }">
            <label class="block text-sm font-medium text-gray-700 mb-2">Gallery Images</label>
            <p class="text-xs text-gray-500 mb-3">Add multiple images to create a gallery in your blog post.</p>
            
            <div class="space-y-4" id="gallery-container">
                <template x-for="i in imageCount" :key="i">
                    <div class="border border-gray-200 rounded-lg p-4">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div class="md:col-span-3">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Image</label>
                                <input type="file" :name="'gallery_images[]'" class="input-field" accept="image/*" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Alt Text</label>
                                <input type="text" :name="'gallery_alt[]'" class="input-field" placeholder="Alt text..." />
                            </div>
                        </div>
                    </div>
                </template>
            </div>
            
            <button type="button" @click="imageCount++" class="mt-4 px-4 py-2 text-sm font-medium text-blue-700 bg-blue-50 border border-blue-300 rounded-md hover:bg-blue-100">
                + Add Another Image
            </button>
            @error('gallery_images.*')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <!-- Actions -->
        <div class="flex items-center gap-3 pt-4 border-t border-gray-200">
            <button type="submit" class="btn-primary">
                Create Post
            </button>
            <a href="{{ route('admin.blog.posts.index') }}" class="px-4 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">Cancel</a>
        </div>
    </form>
</x-admin-layout>
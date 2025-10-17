<x-admin-layout :title="'Edit Category'" :header="'Edit Category'">
    <form method="POST" action="{{ route('admin.blog.categories.update', $category) }}" class="bg-white border border-gray-200 rounded-xl p-6 space-y-6">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Name <span class="text-red-500">*</span></label>
                <input name="name" value="{{ old('name', $category->name) }}" class="input-field {{ $errors->has('name') ? 'input-error' : '' }}" placeholder="Enter category name" required />
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Slug</label>
                <input name="slug" value="{{ old('slug', $category->slug) }}" class="input-field {{ $errors->has('slug') ? 'input-error' : '' }}" placeholder="Auto-generated from name" readonly />
                <p class="mt-1 text-xs text-gray-500">Slug will be automatically generated from the category name</p>
                @error('slug')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
            <textarea name="description" rows="4" class="textarea-field {{ $errors->has('description') ? 'input-error' : '' }}" placeholder="Enter category description...">{{ old('description', $category->description) }}</textarea>
            @error('description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex items-center">
            <input type="checkbox" name="is_active" value="1" id="is_active" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500" {{ old('is_active', $category->is_active) ? 'checked' : '' }}>
            <label for="is_active" class="ml-2 text-sm font-medium text-gray-700">Active</label>
        </div>
        <div class="flex items-center gap-3 pt-4">
            <button type="submit" class="btn-primary">
                Update Category
            </button>
            <a href="{{ route('admin.blog.categories.index') }}" class="px-4 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">Cancel</a>
        </div>
    </form>
</x-admin-layout>
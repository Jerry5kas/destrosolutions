<x-admin-layout :title="'Create Service'" :header="'Create Service'">
    <form method="POST" action="{{ route('admin.services.store') }}" enctype="multipart/form-data" class="bg-white border border-gray-200 rounded-xl p-6 space-y-6">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Title <span class="text-red-500">*</span></label>
                <input name="title" value="{{ old('title') }}" class="input-field {{ $errors->has('title') ? 'input-error' : '' }}" placeholder="Enter service title" required />
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Subtitle</label>
                <input name="subtitle" value="{{ old('subtitle') }}" class="input-field {{ $errors->has('subtitle') ? 'input-error' : '' }}" placeholder="Enter service subtitle" />
                @error('subtitle')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Image</label>
                <input type="file" name="image" class="input-field" accept="image/*" />
                @error('image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
            <textarea name="description" rows="4" class="textarea-field {{ $errors->has('description') ? 'input-error' : '' }}" placeholder="Enter service description...">{{ old('description') }}</textarea>
            @error('description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Key Features</label>
            <div x-data="{ features: [''] }">
                <template x-for="(feature, index) in features" :key="index">
                    <div class="flex gap-2 mb-2">
                        <input type="text" 
                               :name="`key_features[${index}]`"
                               x-model="features[index]"
                               class="input-field flex-1" 
                               placeholder="Enter key feature" />
                        <button type="button" 
                                @click="features.splice(index, 1)"
                                x-show="features.length > 1"
                                class="px-3 py-2 text-red-600 hover:bg-red-50 rounded-md">
                            <x-icons name="delete" size="w-4 h-4" />
                        </button>
                    </div>
                </template>
                <button type="button" 
                        @click="features.push('')"
                        class="mt-2 px-3 py-2 text-blue-600 hover:bg-blue-50 rounded-md flex items-center gap-2">
                    <x-icons name="plus" size="w-4 h-4" />
                    Add Feature
                </button>
            </div>
        </div>
        <div class="flex items-center">
            <input type="checkbox" name="is_active" value="1" id="is_active" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500" {{ old('is_active', true) ? 'checked' : '' }}>
            <label for="is_active" class="ml-2 text-sm font-medium text-gray-700">Active</label>
        </div>
        <div class="flex items-center gap-3 pt-4">
            <button type="submit" class="btn-primary">
                Create Service
            </button>
            <a href="{{ route('admin.services.index') }}" class="px-4 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">Cancel</a>
        </div>
    </form>
</x-admin-layout>
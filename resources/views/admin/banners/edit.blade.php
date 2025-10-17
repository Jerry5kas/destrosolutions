<x-admin-layout :title="'Edit Banner'" :header="'Edit Banner'">
    <form method="POST" action="{{ route('admin.banners.update', $banner) }}" enctype="multipart/form-data" class="glass-card rounded-xl p-6 space-y-6">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-white/90 mb-2">Title <span class="text-red-400">*</span></label>
                <input name="title" value="{{ old('title', $banner->title) }}" class="glass-input w-full rounded-lg px-4 py-3 {{ $errors->has('title') ? 'border-red-400/50' : '' }}" placeholder="Enter banner title" required />
                @error('title')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-white/90 mb-2">Slogan</label>
                <input name="slogan" value="{{ old('slogan', $banner->slogan) }}" class="glass-input w-full rounded-lg px-4 py-3" placeholder="Enter banner slogan" />
            </div>
            <div>
                <label class="block text-sm font-medium text-white/90 mb-2">Page <span class="text-red-400">*</span></label>
                <select name="page" class="glass-input w-full rounded-lg px-4 py-3 {{ $errors->has('page') ? 'border-red-400/50' : '' }}" required>
                    <option value="homepage" {{ old('page', $banner->page) == 'homepage' ? 'selected' : '' }}>Homepage</option>
                    <option value="page1" {{ old('page', $banner->page) == 'page1' ? 'selected' : '' }}>Page 1</option>
                    <option value="page2" {{ old('page', $banner->page) == 'page2' ? 'selected' : '' }}>Page 2</option>
                    <option value="page3" {{ old('page', $banner->page) == 'page3' ? 'selected' : '' }}>Page 3</option>
                </select>
                @error('page')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-white/90 mb-2">Image</label>
                @if($banner->image)
                    <div class="mb-3">
                        <p class="text-sm text-gray-600 mb-2">Current image:</p>
                        <img src="{{ Storage::url($banner->image) }}" class="h-24 w-24 object-cover rounded border border-gray-200" />
                    </div>
                @endif
                <input type="file" name="image" class="glass-input w-full rounded-lg px-4 py-3" accept="image/*" />
                @error('image')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium text-white/90 mb-2">Description</label>
            <textarea name="description" rows="4" class="glass-input w-full rounded-lg px-4 py-3 {{ $errors->has('description') ? 'border-red-400/50' : '' }}" placeholder="Enter banner description...">{{ old('description', $banner->description) }}</textarea>
            @error('description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-white/90 mb-2">Text 1</label>
                <input name="text1" value="{{ old('text1', $banner->text1) }}" class="glass-input w-full rounded-lg px-4 py-3" placeholder="Enter text 1" />
            </div>
            <div>
                <label class="block text-sm font-medium text-white/90 mb-2">Text 2</label>
                <input name="text2" value="{{ old('text2', $banner->text2) }}" class="glass-input w-full rounded-lg px-4 py-3" placeholder="Enter text 2" />
            </div>
            <div>
                <label class="block text-sm font-medium text-white/90 mb-2">Text 3</label>
                <input name="text3" value="{{ old('text3', $banner->text3) }}" class="glass-input w-full rounded-lg px-4 py-3" placeholder="Enter text 3" />
            </div>
        </div>
        <div class="flex items-center">
            <input type="checkbox" name="is_active" value="1" id="is_active" class="h-4 w-4 rounded border-white/30 text-blue-400 focus:ring-blue-500 bg-white/10" {{ old('is_active', $banner->is_active) ? 'checked' : '' }}>
            <label for="is_active" class="ml-2 text-sm font-medium text-white/90">Active</label>
        </div>
        <div class="flex items-center gap-3 pt-4">
            <button type="submit" class="glass-button px-6 py-3 rounded-lg hover:bg-white/20 transition-all">
                Update Banner
            </button>
            <a href="{{ route('admin.banners.index') }}" class="px-4 py-2.5 text-sm font-medium text-white/80 bg-white/10 backdrop-blur-sm border border-white/20 rounded-md hover:bg-white/20 transition-all">Cancel</a>
        </div>
    </form>
</x-admin-layout>
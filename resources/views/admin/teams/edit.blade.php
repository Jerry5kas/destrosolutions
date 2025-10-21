<x-admin-layout :title="'Edit Team Member'" :header="'Edit Team Member'">
    <form method="POST" action="{{ route('admin.teams.update', $team) }}" enctype="multipart/form-data" class="bg-white border border-gray-200 rounded-xl p-6 space-y-6">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Name <span class="text-red-500">*</span></label>
                <input name="name" value="{{ old('name', $team->name) }}" class="input-field {{ $errors->has('name') ? 'input-error' : '' }}" placeholder="Enter team member name" required />
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Designation <span class="text-red-500">*</span></label>
                <input name="designation" value="{{ old('designation', $team->designation) }}" class="input-field {{ $errors->has('designation') ? 'input-error' : '' }}" placeholder="Enter designation/role" required />
                @error('designation')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Profile Image</label>
                @if($team->image)
                <div class="mb-3">
                    <img src="{{ Storage::url($team->image) }}" class="w-20 h-20 object-cover rounded-lg border border-gray-200" />
                    <p class="text-sm text-gray-500 mt-1">Current image</p>
                </div>
                @endif
                <input type="file" name="image" class="input-field" accept="image/*" />
                @error('image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $team->sort_order) }}" min="0" class="input-field {{ $errors->has('sort_order') ? 'input-error' : '' }}" placeholder="Display order" />
                @error('sort_order')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
            <textarea name="description" rows="4" class="textarea-field {{ $errors->has('description') ? 'input-error' : '' }}" placeholder="Enter team member description...">{{ old('description', $team->description) }}</textarea>
            @error('description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Social Media Links</label>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Facebook</label>
                    <input type="url" name="social_links[facebook]" value="{{ old('social_links.facebook', $team->social_links['facebook'] ?? '') }}" class="input-field" placeholder="https://facebook.com/username" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Instagram</label>
                    <input type="url" name="social_links[instagram]" value="{{ old('social_links.instagram', $team->social_links['instagram'] ?? '') }}" class="input-field" placeholder="https://instagram.com/username" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Twitter/X</label>
                    <input type="url" name="social_links[twitter]" value="{{ old('social_links.twitter', $team->social_links['twitter'] ?? '') }}" class="input-field" placeholder="https://twitter.com/username" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">LinkedIn</label>
                    <input type="url" name="social_links[linkedin]" value="{{ old('social_links.linkedin', $team->social_links['linkedin'] ?? '') }}" class="input-field" placeholder="https://linkedin.com/in/username" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">YouTube</label>
                    <input type="url" name="social_links[youtube]" value="{{ old('social_links.youtube', $team->social_links['youtube'] ?? '') }}" class="input-field" placeholder="https://youtube.com/@username" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Website</label>
                    <input type="url" name="social_links[website]" value="{{ old('social_links.website', $team->social_links['website'] ?? '') }}" class="input-field" placeholder="https://website.com" />
                </div>
            </div>
            @error('social_links.*')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="flex items-center">
            <input type="checkbox" name="is_active" value="1" id="is_active" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500" {{ old('is_active', $team->is_active) ? 'checked' : '' }}>
            <label for="is_active" class="ml-2 text-sm font-medium text-gray-700">Active</label>
        </div>
        
        <div class="flex items-center gap-3 pt-4">
            <button type="submit" class="btn-primary">
                Update Team Member
            </button>
            <a href="{{ route('admin.teams.index') }}" class="px-4 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">Cancel</a>
        </div>
    </form>
</x-admin-layout>

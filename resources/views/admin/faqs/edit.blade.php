<x-admin-layout :title="'Edit FAQ'" :header="'Edit FAQ'">
    <form method="POST" action="{{ route('admin.faqs.update', $faq) }}" class="bg-white border border-gray-200 rounded-xl p-6 space-y-6">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Question <span class="text-red-500">*</span></label>
                <input name="question" value="{{ old('question', $faq->question) }}" class="input-field {{ $errors->has('question') ? 'input-error' : '' }}" placeholder="Enter FAQ question" required />
                @error('question')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $faq->sort_order) }}" min="0" class="input-field {{ $errors->has('sort_order') ? 'input-error' : '' }}" placeholder="Display order" />
                @error('sort_order')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Answer <span class="text-red-500">*</span></label>
            <textarea name="answer" rows="6" class="textarea-field {{ $errors->has('answer') ? 'input-error' : '' }}" placeholder="Enter detailed answer..." required>{{ old('answer', $faq->answer) }}</textarea>
            @error('answer')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="flex items-center">
            <input type="checkbox" name="is_active" value="1" id="is_active" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500" {{ old('is_active', $faq->is_active) ? 'checked' : '' }}>
            <label for="is_active" class="ml-2 text-sm font-medium text-gray-700">Active</label>
        </div>
        
        <div class="flex items-center gap-3 pt-4">
            <button type="submit" class="btn-primary">
                Update FAQ
            </button>
            <a href="{{ route('admin.faqs.index') }}" class="px-4 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">Cancel</a>
        </div>
    </form>
</x-admin-layout>


@props(['name', 'label', 'type' => 'text', 'required' => false, 'placeholder' => '', 'value' => '', 'options' => [], 'accept' => 'image/*'])

@php
    $value = $value ?: old($name);
    $hasError = $errors->has($name);
@endphp

<div>
    <label class="block text-sm font-medium text-gray-700 mb-2">
        {{ $label }}
        @if($required)
            <span class="text-red-500">*</span>
        @endif
    </label>
    
    @if($type === 'textarea')
        <textarea name="{{ $name }}" 
                  rows="4" 
                  class="textarea-field {{ $hasError ? 'input-error' : '' }}" 
                  placeholder="{{ $placeholder }}"
                  {{ $required ? 'required' : '' }}>{{ $value }}</textarea>
    @elseif($type === 'select')
        <select name="{{ $name }}" 
                class="input-field {{ $hasError ? 'input-error' : '' }}" 
                {{ $required ? 'required' : '' }}>
            @foreach($options as $optionValue => $optionLabel)
                <option value="{{ $optionValue }}" {{ $value == $optionValue ? 'selected' : '' }}>
                    {{ $optionLabel }}
                </option>
            @endforeach
        </select>
    @elseif($type === 'checkbox')
        <div class="flex items-center">
            <input type="checkbox" 
                   name="{{ $name }}" 
                   value="1" 
                   id="{{ $name }}" 
                   class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500" 
                   {{ $value ? 'checked' : '' }}>
            <label for="{{ $name }}" class="ml-2 text-sm font-medium text-gray-700">{{ $label }}</label>
        </div>
    @elseif($type === 'file')
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
                    <input type="file" name="{{ $name }}" x-ref="fileInput" class="hidden" accept="{{ $accept }}" />
                </label>
            </div>
            <p class="mt-2 text-xs text-gray-500">PNG, JPG, WebP up to 10MB</p>
        </div>
    @elseif($type === 'file-edit')
        @if($value)
            <div class="mb-3">
                <p class="text-sm text-gray-600 mb-2">Current image:</p>
                <img src="{{ Storage::url($value) }}" class="h-24 w-24 object-cover rounded border border-gray-200" />
            </div>
        @endif
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
                    <input type="file" name="{{ $name }}" x-ref="fileInput" class="hidden" accept="{{ $accept }}" />
                </label>
            </div>
            <p class="mt-2 text-xs text-gray-500">PNG, JPG, WebP up to 10MB</p>
        </div>
    @else
        <input type="{{ $type }}" 
               name="{{ $name }}" 
               value="{{ $value }}" 
               class="input-field {{ $hasError ? 'input-error' : '' }}" 
               placeholder="{{ $placeholder }}"
               {{ $required ? 'required' : '' }} />
    @endif
    
    @error($name)
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

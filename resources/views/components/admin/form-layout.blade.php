@props(['title', 'method' => 'POST', 'action', 'enctype' => false])

<x-admin-layout :title="$title" :header="$title">
    <form method="{{ $method }}" action="{{ $action }}" @if($enctype) enctype="multipart/form-data" @endif class="bg-white border border-gray-200 rounded-xl p-6 space-y-6">
        @csrf
        @if($method !== 'POST')
            @method($method)
        @endif
        
        {{ $slot }}
        
        <div class="flex items-center gap-3 pt-4">
            <button type="submit" class="btn-primary" x-data="{ loading: false }" @click="loading = true" :disabled="loading">
                <span x-show="!loading">{{ $submitLabel ?? 'Save' }}</span>
                <span x-show="loading" class="flex items-center">
                    <x-loading-spinner size="sm" color="white" />
                    <span class="ml-2">{{ $submitLoadingLabel ?? 'Saving...' }}</span>
                </span>
            </button>
            <a href="{{ $cancelRoute ?? url()->previous() }}" class="px-4 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                Cancel
            </a>
        </div>
    </form>
</x-admin-layout>

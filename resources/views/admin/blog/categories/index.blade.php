<x-admin-layout :title="'Blog Categories'" :header="'Blog Categories'">
    <x-admin-table-layout 
        title="Blog Categories"
        description="Manage your blog categories"
        :createRoute="route('admin.blog.categories.create')"
        createLabel="Create Category"
        :items="$categories"
        :pagination="$categories">
        
        <x-slot name="header">
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Posts</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
        </x-slot>
        
        <td class="px-6 py-4 whitespace-nowrap">
            <div class="w-4 h-4 rounded border border-gray-300 flex items-center justify-center">
                <div class="w-2 h-2 bg-gray-400 rounded-full"></div>
            </div>
        </td>

        <td class="px-6 py-4">
            <div class="text-sm font-medium text-gray-900">{{ $item->name }}</div>
        </td>

        <td class="px-6 py-4">
            <div class="text-sm text-gray-500">{{ Str::limit($item->description, 60) }}</div>
        </td>

        <td class="px-6 py-4 whitespace-nowrap">
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                {{ $item->posts_count ?? 0 }} posts
            </span>
        </td>

        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->created_at->format('M d, Y') }}</td>

        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
            <div class="flex items-center justify-end gap-2" x-show="showActions" x-transition>
                <a href="{{ route('admin.blog.categories.edit', $item) }}" 
                   class="inline-flex items-center px-3 py-1.5 border border-blue-300 rounded-md text-xs font-medium text-blue-700 bg-blue-50 hover:bg-blue-100 transition-colors">
                    <x-icons name="edit" size="w-3 h-3" class="mr-1" />
                    Edit
                </a>
                <form method="POST" action="{{ route('admin.blog.categories.destroy', $item) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this category?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="inline-flex items-center px-3 py-1.5 border border-red-300 rounded-md text-xs font-medium text-red-700 bg-red-50 hover:bg-red-100 transition-colors">
                        <x-icons name="delete" size="w-3 h-3" class="mr-1" />
                        Delete
                    </button>
                </form>
            </div>
        </td>
        
        <x-slot name="emptyIcon">
            <div class="w-12 h-12 rounded border border-gray-300 flex items-center justify-center">
                <div class="w-6 h-6 bg-gray-400 rounded-full"></div>
            </div>
        </x-slot>
        <x-slot name="emptyTitle">No categories found</x-slot>
        <x-slot name="emptyDescription">Get started by creating your first blog category.</x-slot>
    </x-admin-table-layout>
</x-admin-layout>
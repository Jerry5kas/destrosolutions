<x-admin-layout :title="'Blog Posts'" :header="'Blog Posts'">
    <x-admin-table-layout 
        title="Blog Posts"
        description="Manage your blog posts"
        :createRoute="route('admin.blog.posts.create')"
        createLabel="Create Post"
        :items="$posts"
        :pagination="$posts">
        
        <x-slot name="header">
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
        </x-slot>
        
        <td class="px-6 py-4 whitespace-nowrap">
            @if($item->image)
                <img src="{{ Storage::url($item->image) }}" class="h-12 w-12 object-cover rounded-lg border border-gray-200 shadow-sm" />
            @else
                <div class="h-12 w-12 bg-gradient-to-br from-gray-100 to-gray-200 rounded-lg border border-gray-200 flex items-center justify-center">
                    <x-icons name="blog" size="w-6 h-6" class="text-gray-400" />
                </div>
            @endif
        </td>

        <td class="px-6 py-4">
            <div class="text-sm font-medium text-gray-900">{{ $item->title }}</div>
            @if($item->description)
                <div class="text-sm text-gray-500">{{ Str::limit($item->description, 60) }}</div>
            @endif
        </td>

        <td class="px-6 py-4 whitespace-nowrap">
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                {{ $item->category->name ?? 'Uncategorized' }}
            </span>
        </td>

        <td class="px-6 py-4 whitespace-nowrap">
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $item->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                <div class="w-2 h-2 rounded-full mr-1.5 {{ $item->is_active ? 'bg-green-400' : 'bg-red-400' }}"></div>
                {{ $item->is_active ? 'Active' : 'Inactive' }}
            </span>
        </td>

        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->created_at->format('M d, Y') }}</td>

        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
            <div class="flex items-center justify-end gap-2" x-show="showActions" x-transition>
                <a href="{{ route('admin.blog.posts.edit', $item) }}" 
                   class="inline-flex items-center px-3 py-1.5 border border-blue-300 rounded-md text-xs font-medium text-blue-700 bg-blue-50 hover:bg-blue-100 transition-colors">
                    <x-icons name="edit" size="w-3 h-3" class="mr-1" />
                    Edit
                </a>
                <form method="POST" action="{{ route('admin.blog.posts.destroy', $item) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this post?')">
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
            <x-icons name="blog" size="w-12 h-12" class="text-blue-600" />
        </x-slot>
        <x-slot name="emptyTitle">No blog posts found</x-slot>
        <x-slot name="emptyDescription">Get started by creating your first blog post.</x-slot>
    </x-admin-table-layout>
</x-admin-layout>
<x-admin-layout :title="'Training'" :header="'Training'">
    <x-admin-table-layout 
        title="Training"
        description="Manage your training content"
        :createRoute="route('admin.training.create')"
        createLabel="Create Training"
        :items="$training"
        :pagination="$training">
        
        <x-slot name="header">
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
        </x-slot>
        
        <x-admin-table-row 
            :item="$item"
            :editRoute="route('admin.training.edit', $item)"
            :deleteRoute="route('admin.training.destroy', $item)"
            showImage="true">
        </x-admin-table-row>
        
        <x-slot name="emptyIcon">
            <x-icons name="training" size="w-12 h-12" class="text-blue-600" />
        </x-slot>
        <x-slot name="emptyTitle">No training content found</x-slot>
        <x-slot name="emptyDescription">Get started by creating your first training content.</x-slot>
    </x-admin-table-layout>
</x-admin-layout>
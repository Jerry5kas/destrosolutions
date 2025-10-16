<x-admin-layout :title="'Quantum'" :header="'Quantum'">
    <x-admin-table-layout 
        title="Quantum"
        description="Manage your quantum content"
        :createRoute="route('admin.quantum.create')"
        createLabel="Create Quantum"
        :items="$quantum"
        :pagination="$quantum">
        
        <x-slot name="header">
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
        </x-slot>
        
        <x-admin-table-row 
            :item="$item"
            :editRoute="route('admin.quantum.edit', $item)"
            :deleteRoute="route('admin.quantum.destroy', $item)"
            showImage="true">
        </x-admin-table-row>
        
        <x-slot name="emptyIcon">
            <x-icons name="quantum" size="w-12 h-12" class="text-blue-600" />
        </x-slot>
        <x-slot name="emptyTitle">No quantum content found</x-slot>
        <x-slot name="emptyDescription">Get started by creating your first quantum content.</x-slot>
    </x-admin-table-layout>
</x-admin-layout>
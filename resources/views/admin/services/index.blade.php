<x-admin-layout :title="'Services'" :header="'Services'">
    <x-admin-table-layout 
        title="Services"
        description="Manage your services content"
        :createRoute="route('admin.services.create')"
        createLabel="Create Service"
        :items="$services"
        :pagination="$services">
        
        <x-slot name="header">
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
        </x-slot>
        
        <x-admin-table-row 
            :item="$item"
            :editRoute="route('admin.services.edit', $item)"
            :deleteRoute="route('admin.services.destroy', $item)"
            showImage="true">
        </x-admin-table-row>
        
        <x-slot name="emptyIcon">
            <x-icons name="services" size="w-12 h-12" class="text-blue-600" />
        </x-slot>
        <x-slot name="emptyTitle">No services found</x-slot>
        <x-slot name="emptyDescription">Get started by creating your first service.</x-slot>
    </x-admin-table-layout>
</x-admin-layout>
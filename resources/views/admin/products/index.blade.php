<x-admin-layout :title="'Products'" :header="'Products'">
    <x-admin-table-layout 
        title="Products"
        description="Manage your products content"
        :createRoute="route('admin.products.create')"
        createLabel="Create Product"
        :items="$products"
        :pagination="$products">
        
        <x-slot name="header">
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
        </x-slot>
        
        <x-admin-table-row 
            :item="$item"
            :editRoute="route('admin.products.edit', $item)"
            :deleteRoute="route('admin.products.destroy', $item)"
            showImage="true">
        </x-admin-table-row>
        
        <x-slot name="emptyIcon">
            <x-icons name="products" size="w-12 h-12" class="text-blue-600" />
        </x-slot>
        <x-slot name="emptyTitle">No products found</x-slot>
        <x-slot name="emptyDescription">Get started by creating your first product.</x-slot>
    </x-admin-table-layout>
</x-admin-layout>
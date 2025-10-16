<x-admin-layout :title="'Contacts'" :header="'Contacts'">
    <x-admin-table-layout 
        title="Contacts"
        description="Manage your contact messages"
        :createRoute="route('admin.contacts.create')"
        createLabel="View Messages"
        :items="$contacts"
        :pagination="$contacts">
        
        <x-slot name="header">
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Message</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
        </x-slot>
        
        <td class="px-6 py-4 whitespace-nowrap">
            <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold text-xs">
                {{ substr($item->name, 0, 1) }}
            </div>
        </td>

        <td class="px-6 py-4">
            <div class="text-sm font-medium text-gray-900">{{ $item->name }}</div>
            <div class="text-sm text-gray-500">{{ $item->email }}</div>
        </td>

        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->phone ?? 'N/A' }}</td>

        <td class="px-6 py-4">
            <div class="text-sm text-gray-900">{{ Str::limit($item->message, 50) }}</div>
        </td>

        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->created_at->format('M d, Y') }}</td>

        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
            <div class="flex items-center justify-end gap-2" x-show="showActions" x-transition>
                <button @click="showMessage = !showMessage" 
                        class="inline-flex items-center px-3 py-1.5 border border-blue-300 rounded-md text-xs font-medium text-blue-700 bg-blue-50 hover:bg-blue-100 transition-colors">
                    <x-icons name="eye" size="w-3 h-3" class="mr-1" />
                    View
                </button>
                <form method="POST" action="{{ route('admin.contacts.destroy', $item) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this message?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="inline-flex items-center px-3 py-1.5 border border-red-300 rounded-md text-xs font-medium text-red-700 bg-red-50 hover:bg-red-100 transition-colors">
                        <x-icons name="delete" size="w-3 h-3" class="mr-1" />
                        Delete
                    </button>
                </form>
            </div>
            
            <!-- Message Modal -->
            <div x-show="showMessage" 
                 x-data="{ showMessage: false }"
                 x-transition:enter="transition ease-out duration-100"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-75"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                <div class="bg-white rounded-xl p-6 max-w-md w-full mx-4">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Contact Message</h3>
                    <div class="space-y-3">
                        <div><strong>Name:</strong> {{ $item->name }}</div>
                        <div><strong>Email:</strong> {{ $item->email }}</div>
                        @if($item->phone)
                            <div><strong>Phone:</strong> {{ $item->phone }}</div>
                        @endif
                        <div><strong>Message:</strong></div>
                        <div class="text-gray-700 bg-gray-50 p-3 rounded">{{ $item->message }}</div>
                    </div>
                    <button @click="showMessage = false" class="mt-4 w-full px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        Close
                    </button>
                </div>
            </div>
        </td>
        
        <x-slot name="emptyIcon">
            <x-icons name="contacts" size="w-12 h-12" class="text-blue-600" />
        </x-slot>
        <x-slot name="emptyTitle">No contact messages found</x-slot>
        <x-slot name="emptyDescription">Contact messages will appear here when users submit the contact form.</x-slot>
    </x-admin-table-layout>
</x-admin-layout>
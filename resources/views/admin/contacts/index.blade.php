<x-admin-layout :title="'Contacts'" :header="'Contacts'">
    <div x-data="{ 
        loading: false,
        init() {
            // Show loading on page load
            this.loading = true;
            setTimeout(() => {
                this.loading = false;
            }, 1000);
        }
    }">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-xl font-semibold text-gray-800">Contacts</h2>
                <p class="text-sm text-gray-600 mt-1">Manage your contact messages</p>
            </div>
        </div>
        
        <!-- Loading State -->
        <div x-show="loading" x-transition>
            <x-loading-skeleton type="table" :count="5" />
        </div>
        
        <!-- Content State -->
        <div x-show="!loading" x-transition>
            @if($contacts->count() > 0)
                <div class="bg-white border border-gray-200 rounded-xl overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50 sticky top-0 z-10">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Message</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($contacts as $index => $item)
                                    <tr class="hover:bg-gray-50 {{ $index % 2 === 0 ? 'bg-white' : 'bg-gray-50/50' }}" 
                                        x-data="{ showActions: false, showMessage: false }"
                                        @mouseenter="showActions = true"
                                        @mouseleave="showActions = false">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold text-xs mr-3">
                                                    {{ substr($item->name, 0, 1) }}
                                                </div>
                                                <div class="text-sm font-medium text-gray-900">{{ $item->name }}</div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">{{ $item->email }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->phone ?? 'N/A' }}</td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900 max-w-xs truncate">{{ Str::limit($item->message, 50) }}</div>
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
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
                @if($contacts->hasPages())
                    <div class="mt-6">
                        {{ $contacts->links() }}
                    </div>
                @endif
                
                <!-- Message Modal -->
                <div x-show="showMessage" 
                     x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                     class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
                     @click.self="showMessage = false">
                    <div class="bg-white rounded-xl p-6 max-w-md w-full mx-4">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Contact Message</h3>
                        <div class="space-y-3">
                            @foreach($contacts as $contact)
                                <div x-show="showMessage" style="display: none;">
                                    <div><strong>Name:</strong> {{ $contact->name }}</div>
                                    <div><strong>Email:</strong> {{ $contact->email }}</div>
                                    @if($contact->phone)
                                        <div><strong>Phone:</strong> {{ $contact->phone }}</div>
                                    @endif
                                    <div><strong>Message:</strong></div>
                                    <div class="text-gray-700 bg-gray-50 p-3 rounded">{{ $contact->message }}</div>
                                </div>
                            @endforeach
                        </div>
                        <button @click="showMessage = false" class="mt-4 w-full px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            Close
                        </button>
                    </div>
                </div>
            @else
                <div class="text-center py-12">
                    <div class="mx-auto w-24 h-24 bg-gradient-to-br from-blue-100 to-blue-200 rounded-full flex items-center justify-center mb-4">
                        <svg class="h-12 w-12 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No contact messages found</h3>
                    <p class="text-gray-500 mb-6">Contact messages will appear here when users submit the contact form.</p>
                </div>
            @endif
        </div>
    </div>
</x-admin-layout>
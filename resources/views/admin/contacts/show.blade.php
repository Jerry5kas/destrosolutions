<x-admin-layout :title="'Contact Details'" :header="'Contact Details'">
    <div x-data="{ 
        loading: false,
        init() {
            this.loading = true;
            setTimeout(() => {
                this.loading = false;
            }, 1000);
        }
    }">
        <!-- Loading State -->
        <div x-show="loading" x-transition>
            <div class="animate-pulse">
                <div class="h-8 bg-gray-200 rounded w-1/4 mb-6"></div>
                <div class="space-y-4">
                    <div class="h-4 bg-gray-200 rounded w-3/4"></div>
                    <div class="h-4 bg-gray-200 rounded w-1/2"></div>
                    <div class="h-4 bg-gray-200 rounded w-2/3"></div>
                </div>
            </div>
        </div>

        <!-- Content State -->
        <div x-show="!loading" x-transition>
            <!-- Back Button -->
            <div class="mb-6">
                <a href="{{ route('admin.contacts.index') }}" 
                   class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Contacts
                </a>
            </div>

            <!-- Contact Details Card -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
                <!-- Header -->
                <div class="bg-gradient-to-r from-blue-600 to-purple-600 px-6 py-6 text-white">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-2xl font-bold">{{ $contact->name }}</h1>
                                <p class="text-blue-100 text-sm">{{ $contact->email }}</p>
                                <p class="text-blue-100 text-xs mt-1">Submitted {{ $contact->created_at->format('M d, Y \a\t g:i A') }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <a href="mailto:{{ $contact->email }}" 
                               class="inline-flex items-center gap-2 px-4 py-2 bg-white/20 hover:bg-white/30 rounded-lg transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                Reply
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-6">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Contact Information -->
                        <div class="space-y-6">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    Contact Information
                                </h3>
                                <div class="space-y-4">
                                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        <div>
                                            <p class="text-sm text-gray-500">Full Name</p>
                                            <p class="font-semibold text-gray-900">{{ $contact->name }}</p>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                        <div>
                                            <p class="text-sm text-gray-500">Email Address</p>
                                            <a href="mailto:{{ $contact->email }}" class="font-semibold text-blue-600 hover:text-blue-800">{{ $contact->email }}</a>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                        </svg>
                                        <div>
                                            <p class="text-sm text-gray-500">Phone Number</p>
                                            <p class="font-semibold text-gray-900">{{ $contact->phone ?? 'Not provided' }}</p>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <div>
                                            <p class="text-sm text-gray-500">Submitted Date</p>
                                            <p class="font-semibold text-gray-900">{{ $contact->created_at->format('M d, Y \a\t g:i A') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Message Content -->
                        <div class="space-y-6">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                    </svg>
                                    Message Content
                                </h3>
                                <div class="bg-blue-50 rounded-xl p-6 border border-blue-200">
                                    <div class="bg-white rounded-lg p-4 border border-blue-100">
                                        <p class="text-gray-800 leading-relaxed whitespace-pre-wrap">{{ $contact->message }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center justify-between pt-6 mt-6 border-t border-gray-200">
                        <div class="flex items-center gap-3">
                            <a href="mailto:{{ $contact->email }}" 
                               class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                Reply via Email
                            </a>
                            <a href="tel:{{ $contact->phone }}" 
                               x-show="{{ $contact->phone ? 'true' : 'false' }}"
                               class="inline-flex items-center gap-2 px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                Call
                            </a>
                        </div>
                        
                        <form method="POST" action="{{ route('admin.contacts.destroy', $contact) }}" 
                              class="inline" 
                              onsubmit="return confirm('Are you sure you want to delete this contact? This action cannot be undone.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="inline-flex items-center gap-2 px-6 py-3 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                Delete Contact
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>

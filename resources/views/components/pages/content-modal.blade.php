<!-- Generic Content Detail Modal -->
<div id="content-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
    <div class="flex items-center justify-center min-h-screen p-4">
        <!-- Modal Content -->
        <div class="bg-white rounded-2xl max-w-7xl w-full max-h-[95vh] overflow-hidden shadow-2xl backdrop-blur-sm">
            <!-- Modal Header -->
            <div class="relative bg-gradient-to-r from-slate-50 to-gray-50 px-8 py-6 border-b border-gray-100">
                <div class="flex justify-between items-center">
                    <div>
                        <h2 id="modal-header-title" class="text-3xl font-bold bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Content Details</h2>
                        <p class="text-sm text-gray-500 mt-1">Detailed information and specifications</p>
                    </div>
                    <button id="close-modal" class="p-2 rounded-full bg-white shadow-md hover:shadow-lg text-gray-400 hover:text-gray-600 transition-all duration-200 hover:scale-105">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
            
            <!-- Modal Body -->
            <div class="flex flex-col lg:flex-row max-h-[calc(95vh-120px)] overflow-hidden">
                <!-- Left Side - Image -->
                <div class="lg:w-1/2 p-8 bg-gradient-to-br from-slate-50 to-gray-100 flex items-center justify-center">
                    <div class="relative w-full h-full max-h-[500px]">
                        <img id="modal-image" src="" alt="" class="w-full h-full object-cover rounded-xl shadow-xl hidden">
                        <div id="modal-image-placeholder" class="w-full h-full bg-gradient-to-br from-blue-500 via-purple-600 to-indigo-700 rounded-xl flex items-center justify-center shadow-xl">
                            <div class="text-white text-center">
                                <div class="w-20 h-20 mx-auto mb-4 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
                                    <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <p class="text-lg font-medium">Content Image</p>
                                <p class="text-sm opacity-80">No image available</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Right Side - Content -->
                <div class="lg:w-1/2 p-8 overflow-y-auto bg-white">
                    <div class="space-y-8">
                        <!-- Title Section -->
                        <div class="space-y-4">
                            <h3 id="modal-title" class="text-4xl font-bold bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent leading-tight">Default Title</h3>
                            <div class="flex items-center space-x-6">
                                <div id="modal-date" class="flex items-center px-3 py-1.5 bg-blue-50 rounded-full text-sm text-blue-700">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                    </svg>
                                    Unknown Date
                                </div>
                                <div class="flex items-center px-3 py-1.5 bg-green-50 rounded-full text-sm text-green-700">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span id="modal-status-text">Active</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Description -->
                        <div class="space-y-3">
                            <h4 class="text-xl font-semibold text-gray-900 flex items-center">
                                <div class="w-1 h-6 bg-gradient-to-b from-blue-500 to-purple-600 rounded-full mr-3"></div>
                                Description
                            </h4>
                            <p id="modal-description" class="text-gray-600 leading-relaxed text-lg">No description available.</p>
                        </div>
                        
                        <!-- Features -->
                        <div class="space-y-4">
                            <h4 class="text-xl font-semibold text-gray-900 flex items-center">
                                <div class="w-1 h-6 bg-gradient-to-b from-green-500 to-emerald-600 rounded-full mr-3"></div>
                                Key Features
                            </h4>
                            <ul id="modal-features" class="space-y-3">
                                <!-- Features will be populated by JavaScript -->
                            </ul>
                        </div>
                        
                        <!-- Category Badge -->
                        <div class="space-y-3">
                            <h4 class="text-xl font-semibold text-gray-900 flex items-center">
                                <div class="w-1 h-6 bg-gradient-to-b from-purple-500 to-pink-600 rounded-full mr-3"></div>
                                Category
                            </h4>
                            <span id="modal-category" class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                Content
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('content-modal');
    const closeBtn = document.getElementById('close-modal');
    
    // Add click event listeners to all content cards
    document.querySelectorAll('.content-card').forEach(card => {
        card.addEventListener('click', function() {
            const itemData = JSON.parse(this.getAttribute('data-item') || 'null');
            const contentType = this.getAttribute('data-type') || 'content';
            console.log('Card clicked, item data:', itemData, 'Type:', contentType);
            openContentModal(itemData, contentType);
        });
    });
    
    // Close modal when clicking close button
    closeBtn.addEventListener('click', function() {
        modal.classList.add('hidden');
    });
    
    // Close modal when clicking backdrop
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            modal.classList.add('hidden');
        }
    });
    
    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
            modal.classList.add('hidden');
        }
    });
    
    // Function to open modal
    function openContentModal(itemData, contentType) {
        console.log('Opening modal with data:', itemData, 'Type:', contentType);
        
        // Update header title based on content type
        const headerTitle = document.getElementById('modal-header-title');
        const categoryElement = document.getElementById('modal-category');
        
        switch(contentType) {
            case 'quantum':
                headerTitle.textContent = 'Quantum Solution Details';
                categoryElement.textContent = 'Quantum Technology';
                categoryElement.className = 'inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-100 text-purple-800';
                break;
            case 'product':
                headerTitle.textContent = 'Product Details';
                categoryElement.textContent = 'Product';
                categoryElement.className = 'inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800';
                break;
            case 'training':
                headerTitle.textContent = 'Training Details';
                categoryElement.textContent = 'Training';
                categoryElement.className = 'inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800';
                break;
            case 'service':
                headerTitle.textContent = 'Service Details';
                categoryElement.textContent = 'Service';
                categoryElement.className = 'inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-orange-100 text-orange-800';
                break;
            case 'blog':
                headerTitle.textContent = 'Blog Post Details';
                categoryElement.textContent = 'Blog Post';
                categoryElement.className = 'inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-pink-100 text-pink-800';
                break;
            default:
                headerTitle.textContent = 'Content Details';
                categoryElement.textContent = 'Content';
                categoryElement.className = 'inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800';
        }
        
        if (itemData && itemData !== null) {
            // Update title
            document.getElementById('modal-title').textContent = itemData.title || 'Default Title';
            
            // Update description
            document.getElementById('modal-description').textContent = itemData.description || 'No description available.';
            
            // Update image
            const imageElement = document.getElementById('modal-image');
            const placeholderElement = document.getElementById('modal-image-placeholder');
            
            if (itemData.image) {
                // Handle both full URLs and storage paths
                let imageSrc = itemData.image;
                if (!imageSrc.startsWith('http') && !imageSrc.startsWith('/')) {
                    imageSrc = '/storage/' + imageSrc;
                }
                imageElement.src = imageSrc;
                imageElement.alt = itemData.title;
                imageElement.classList.remove('hidden');
                placeholderElement.classList.add('hidden');
            } else {
                imageElement.classList.add('hidden');
                placeholderElement.classList.remove('hidden');
            }
            
            // Update date
            if (itemData.created_at) {
                const date = new Date(itemData.created_at);
                document.getElementById('modal-date').innerHTML = `
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                    </svg>
                    ${date.toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' })}
                `;
            }
            
            
            // Update features - handle different feature field names
            const featuresList = document.getElementById('modal-features');
            featuresList.innerHTML = '';
            
            let features = [];
            if (itemData.key_features && itemData.key_features.length > 0) {
                features = itemData.key_features;
            } else if (itemData.features && itemData.features.length > 0) {
                features = itemData.features;
            }
            
            if (features.length > 0) {
                features.forEach(feature => {
                    const li = document.createElement('li');
                    li.className = 'flex items-start p-3 bg-gradient-to-r from-green-50 to-emerald-50 rounded-lg border border-green-100 hover:shadow-sm transition-all duration-200';
                    li.innerHTML = `
                        <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">
                            <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <span class="text-gray-700 font-medium">${feature}</span>
                    `;
                    featuresList.appendChild(li);
                });
            } else {
                const li = document.createElement('li');
                li.className = 'text-gray-500 italic text-center py-8 bg-gray-50 rounded-lg';
                li.textContent = 'No features available.';
                featuresList.appendChild(li);
            }
        } else {
            console.log('No item data provided');
        }
        
        modal.classList.remove('hidden');
    }
    
    // Make function globally available
    window.openContentModal = openContentModal;
});
</script>

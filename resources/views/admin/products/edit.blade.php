<x-admin-form-layout 
    title="Edit Product"
    method="PUT"
    :action="route('admin.products.update', $product)"
    enctype="true"
    submitLabel="Update Product"
    submitLoadingLabel="Updating..."
    :cancelRoute="route('admin.products.index')">
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <x-admin-form-field 
            name="title" 
            label="Title" 
            placeholder="Enter product title"
            :value="$product->title"
            required="true" />
        
        <x-admin-form-field 
            name="image" 
            label="Image" 
            type="file-edit"
            :value="$product->image" />
    </div>
    
    <div>
        <x-admin-form-field 
            name="description" 
            label="Description" 
            type="textarea"
            placeholder="Enter product description..."
            :value="$product->description" />
    </div>
    
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Key Features</label>
        <div x-data="{ features: {{ json_encode($product->key_features ?: ['']) }} }">
            <template x-for="(feature, index) in features" :key="index">
                <div class="flex gap-2 mb-2">
                    <input type="text" 
                           :name="`key_features[${index}]`"
                           x-model="features[index]"
                           class="input-field flex-1" 
                           placeholder="Enter key feature" />
                    <button type="button" 
                            @click="features.splice(index, 1)"
                            x-show="features.length > 1"
                            class="px-3 py-2 text-red-600 hover:bg-red-50 rounded-md">
                        <x-icons name="delete" size="w-4 h-4" />
                    </button>
                </div>
            </template>
            <button type="button" 
                    @click="features.push('')"
                    class="mt-2 px-3 py-2 text-blue-600 hover:bg-blue-50 rounded-md flex items-center gap-2">
                <x-icons name="plus" size="w-4 h-4" />
                Add Feature
            </button>
        </div>
    </div>
    
    <x-admin-form-field 
        name="is_active" 
        label="Active" 
        type="checkbox" 
        :value="$product->is_active" />
</x-admin-form-layout>
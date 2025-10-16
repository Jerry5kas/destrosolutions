<x-admin-form-layout 
    title="Create Training"
    method="POST"
    :action="route('admin.training.store')"
    enctype="true"
    submitLabel="Create Training"
    submitLoadingLabel="Creating..."
    :cancelRoute="route('admin.training.index')">
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <x-admin-form-field 
            name="title" 
            label="Title" 
            placeholder="Enter training title"
            required="true" />
        
        <x-admin-form-field 
            name="image" 
            label="Image" 
            type="file" />
    </div>
    
    <div>
        <x-admin-form-field 
            name="description" 
            label="Description" 
            type="textarea"
            placeholder="Enter training description..." />
    </div>
    
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Objectives</label>
        <div x-data="{ objectives: [''] }">
            <template x-for="(objective, index) in objectives" :key="index">
                <div class="flex gap-2 mb-2">
                    <input type="text" 
                           :name="`objectives[${index}]`"
                           x-model="objectives[index]"
                           class="input-field flex-1" 
                           placeholder="Enter objective" />
                    <button type="button" 
                            @click="objectives.splice(index, 1)"
                            x-show="objectives.length > 1"
                            class="px-3 py-2 text-red-600 hover:bg-red-50 rounded-md">
                        <x-icons name="delete" size="w-4 h-4" />
                    </button>
                </div>
            </template>
            <button type="button" 
                    @click="objectives.push('')"
                    class="mt-2 px-3 py-2 text-blue-600 hover:bg-blue-50 rounded-md flex items-center gap-2">
                <x-icons name="plus" size="w-4 h-4" />
                Add Objective
            </button>
        </div>
    </div>
    
    <x-admin-form-field 
        name="is_active" 
        label="Active" 
        type="checkbox" 
        :value="true" />
</x-admin-form-layout>
<x-admin-form-layout 
    title="Create Category"
    method="POST"
    :action="route('admin.blog.categories.store')"
    submitLabel="Create Category"
    submitLoadingLabel="Creating..."
    :cancelRoute="route('admin.blog.categories.index')">
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <x-admin-form-field 
            name="name" 
            label="Name" 
            placeholder="Enter category name"
            required="true" />
        
        <x-admin-form-field 
            name="slug" 
            label="Slug" 
            placeholder="Enter category slug"
            required="true" />
    </div>
    
    <div>
        <x-admin-form-field 
            name="description" 
            label="Description" 
            type="textarea"
            placeholder="Enter category description..." />
    </div>
</x-admin-form-layout>
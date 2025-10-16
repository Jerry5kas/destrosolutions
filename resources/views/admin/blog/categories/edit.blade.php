<x-admin-form-layout 
    title="Edit Category"
    method="PUT"
    :action="route('admin.blog.categories.update', $category)"
    submitLabel="Update Category"
    submitLoadingLabel="Updating..."
    :cancelRoute="route('admin.blog.categories.index')">
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <x-admin-form-field 
            name="name" 
            label="Name" 
            placeholder="Enter category name"
            :value="$category->name"
            required="true" />
        
        <x-admin-form-field 
            name="slug" 
            label="Slug" 
            placeholder="Enter category slug"
            :value="$category->slug"
            required="true" />
    </div>
    
    <div>
        <x-admin-form-field 
            name="description" 
            label="Description" 
            type="textarea"
            placeholder="Enter category description..."
            :value="$category->description" />
    </div>
</x-admin-form-layout>
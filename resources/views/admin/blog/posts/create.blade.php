<x-admin-form-layout 
    title="Create Blog Post"
    method="POST"
    :action="route('admin.blog.posts.store')"
    enctype="true"
    submitLabel="Create Post"
    submitLoadingLabel="Creating..."
    :cancelRoute="route('admin.blog.posts.index')">
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <x-admin-form-field 
            name="title" 
            label="Title" 
            placeholder="Enter blog post title"
            required="true" />
        
        <x-admin-form-field 
            name="category_id" 
            label="Category" 
            type="select"
            :options="[null => 'Select Category'] + $categories->pluck('name', 'id')->toArray()"
            required="true" />
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <x-admin-form-field 
            name="image" 
            label="Image" 
            type="file" />
        
        <x-admin-form-field 
            name="is_active" 
            label="Active" 
            type="checkbox" 
            :value="true" />
    </div>
    
    <div>
        <x-admin-form-field 
            name="description" 
            label="Description" 
            type="textarea"
            placeholder="Enter blog post description..."
            required="true" />
    </div>
</x-admin-form-layout>
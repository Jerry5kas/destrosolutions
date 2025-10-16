<x-admin-form-layout 
    title="Edit Blog Post"
    method="PUT"
    :action="route('admin.blog.posts.update', $post)"
    enctype="true"
    submitLabel="Update Post"
    submitLoadingLabel="Updating..."
    :cancelRoute="route('admin.blog.posts.index')">
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <x-admin-form-field 
            name="title" 
            label="Title" 
            placeholder="Enter blog post title"
            :value="$post->title"
            required="true" />
        
        <x-admin-form-field 
            name="category_id" 
            label="Category" 
            type="select"
            :options="[null => 'Select Category'] + $categories->pluck('name', 'id')->toArray()"
            :value="$post->category_id"
            required="true" />
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <x-admin-form-field 
            name="image" 
            label="Image" 
            type="file-edit"
            :value="$post->image" />
        
        <x-admin-form-field 
            name="is_active" 
            label="Active" 
            type="checkbox" 
            :value="$post->is_active" />
    </div>
    
    <div>
        <x-admin-form-field 
            name="description" 
            label="Description" 
            type="textarea"
            placeholder="Enter blog post description..."
            :value="$post->description"
            required="true" />
    </div>
</x-admin-form-layout>
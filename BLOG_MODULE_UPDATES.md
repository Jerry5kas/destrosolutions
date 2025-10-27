# Blog Module Updates - Rich Content & Gallery

## Overview
Updated the Blog module to support rich text editing with Quill, block-based subcontent, multiple gallery images, and featured posts.

## Changes Made

### 1. Database Migrations

#### New Fields Added to `blog_posts` table:
- `subcontent` (JSON) - Stores rich content from Quill editor in block format
- `is_featured` (boolean) - Marks posts as featured/suggested posts

#### New Table: `blog_post_images`
- Stores multiple gallery images for each blog post
- Fields: `blog_post_id`, `image`, `alt`, `order`, `timestamps`

### 2. Models Updated

#### `BlogPost` Model:
- Added `subcontent` and `is_featured` to fillable array
- Added casts: `subcontent` as 'array', `is_featured` as 'boolean'
- Added `images()` relationship to BlogPostImage

#### New `BlogPostImage` Model:
- Has relationship to BlogPost
- Stores gallery images with alt text and ordering

### 3. Controller Updates

#### `BlogPostController`:
- Updated validation to handle `subcontent` (JSON) and `is_featured`
- Added gallery image handling in `store()` and `update()`
- Updated `destroy()` to delete associated gallery images
- Loads images relationship in index and edit methods

### 4. Rich Text Editor Integration

#### Quill Editor Installation:
- Installed Quill via npm: `npm install quill`
- Created `resources/js/quill-editor.js` for initialization
- Added Quill CSS import to the file
- Updated `vite.config.js` to include the editor bundle

#### Features:
- Full toolbar with formatting options (bold, italic, underline, etc.)
- Headers (H1-H6)
- Lists (ordered and unordered)
- Links and images
- Code blocks and blockquotes
- Color and background color options
- Text alignment
- Indentation

### 5. Views Updated

#### `create.blade.php`:
- Added Quill editor for rich content editing
- Added `is_featured` checkbox
- Renamed existing image to "Feature Image" with description
- Added gallery images upload section with Alpine.js for dynamic fields
- Enhanced form layout and descriptions

#### `edit.blade.php`:
- Added Quill editor with existing content loading
- Added `is_featured` checkbox
- Shows existing gallery images
- Allows adding new gallery images
- Enhanced layout similar to create form

#### `index.blade.php`:
- Added "Featured" column to show featured posts
- Featured posts display with a star icon and purple badge

#### `app.blade.php` (Admin Layout):
- Added Quill CSS custom styles
- Added `@stack('scripts')` for loading editor JS

### 6. Asset Build
- Built production assets with Vite
- Quill editor CSS and JS bundled separately: `quill-editor.js` and `quill-editor-CfZ7kyuK.css`

## Features

### Rich Text Editor
- Block-based content storage (JSON format)
- Customizable layout based on subcontent blocks
- Full WYSIWYG editing experience
- Supports complex formatting and media

#### Fixed Text Visibility Issue:
- Added proper text color styling (#1f2937 - dark gray)
- Links display in blue (#3b82f6) with underline
- Toolbar icons styled for dark admin theme
- All text elements (p, headings, lists, etc.) visible on white background

### Feature Image vs Gallery
- **Feature Image**: Main image for the blog post (existing `image` field)
- **Gallery Images**: Multiple images stored in `blog_post_images` table
- Separate handling for each type

### Featured Posts
- `is_featured` field to mark posts as featured/suggested
- Displayed with purple badge and star icon in admin index
- Can be used to showcase important posts

## Usage

### Creating a Blog Post:
1. Fill in title, category, and description
2. Upload a feature image (optional)
3. Check "Active" to publish immediately
4. Check "Featured" to mark as suggested post
5. Use the rich text editor to create formatted content
6. Add multiple gallery images with alt text
7. Submit the form

### Rich Content Structure:
The `subcontent` field stores data in Quill's Delta format (JSON), which is a structured format for rich text content. This allows for:
- Block-based customization
- Consistent formatting
- Easy content manipulation programmatically

## Storage
- Feature images: `storage/app/public/uploads/blog/`
- Gallery images: `storage/app/public/uploads/blog/gallery/`

## Next Steps / Customization Ideas
1. **Content Rendering**: Create a Blade component to render the Quill content nicely on the frontend
2. **Image Management**: Add ability to reorder/delete gallery images
3. **Content Blocks**: Customize subcontent structure for specific layout requirements
4. **Featured Posts Widget**: Create a component to display featured posts on the homepage
5. **Media Library**: Add a media library picker for images

## Migration Commands
```bash
php artisan migrate           # Run migrations
npm run build                 # Build assets
```

## Dependencies
- quill: Latest version installed
- Laravel 12
- Alpine.js (already in project)
- Tailwind CSS (already in project)


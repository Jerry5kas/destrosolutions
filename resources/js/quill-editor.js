import Quill from 'quill';
import 'quill/dist/quill.snow.css';

document.addEventListener('DOMContentLoaded', function() {
    // Initialize Quill editor if there's an element with id="subcontent-editor"
    const editorElement = document.getElementById('subcontent-editor');
    
    if (editorElement) {
        const quill = new Quill('#subcontent-editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                    [{ 'font': [] }],
                    [{ 'size': ['small', false, 'large', 'huge'] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'color': [] }, { 'background': [] }],
                    [{ 'script': 'sub'}, { 'script': 'super' }],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    [{ 'indent': '-1'}, { 'indent': '+1' }],
                    [{ 'align': [] }],
                    ['link', 'image', 'video', 'code-block'],
                    ['clean'],
                    ['blockquote'],
                    [{ 'direction': 'rtl' }]
                ]
            },
            placeholder: 'Write your blog content here...',
        });
        
        // Get existing content from data-content attribute
        const existingContent = editorElement.getAttribute('data-content');
        
        // Initialize with existing content if available
        if (existingContent && existingContent.trim() !== '') {
            try {
                const parsedContent = JSON.parse(existingContent);
                if (parsedContent && parsedContent.ops) {
                    quill.setContents(parsedContent);
                    console.log('Content loaded successfully');
                }
            } catch (e) {
                console.error('Error parsing existing content:', e);
                console.error('Content:', existingContent);
            }
        }
        
        // Sync Quill content to hidden input on text change
        quill.on('text-change', function() {
            const hiddenInput = document.getElementById('subcontent-input');
            if (hiddenInput) {
                const content = quill.getContents();
                hiddenInput.value = JSON.stringify(content);
            }
        });
        
        // Also sync initial state
        const hiddenInput = document.getElementById('subcontent-input');
        if (hiddenInput && !hiddenInput.value) {
            hiddenInput.value = JSON.stringify(quill.getContents());
        }
        
        // Store quill instance globally for form submission
        window.quillEditor = quill;
    }
});


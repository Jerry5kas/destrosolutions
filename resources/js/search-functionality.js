// Search functionality for admin interface
document.addEventListener('alpine:init', () => {
    Alpine.data('search', () => ({
        query: '',
        results: [],
        isOpen: false,
        
        init() {
            // Keyboard shortcut for search (Cmd+K / Ctrl+K)
            document.addEventListener('keydown', (e) => {
                if ((e.metaKey || e.ctrlKey) && e.key === 'k') {
                    e.preventDefault();
                    this.$refs.searchInput?.focus();
                }
            });
        },
        
        async search() {
            if (this.query.length < 2) {
                this.results = [];
                return;
            }
            
            // Simulate search results (replace with actual API call)
            this.results = [
                {
                    type: 'banner',
                    title: 'Banner Management',
                    url: '{{ route("admin.banners.index") }}',
                    description: 'Manage banner content'
                },
                {
                    type: 'blog',
                    title: 'Blog Posts',
                    url: '{{ route("admin.blog.posts.index") }}',
                    description: 'Manage blog posts and articles'
                },
                {
                    type: 'contact',
                    title: 'Contact Messages',
                    url: '{{ route("admin.contacts.index") }}',
                    description: 'View and manage contact form submissions'
                }
            ].filter(item => 
                item.title.toLowerCase().includes(this.query.toLowerCase()) ||
                item.description.toLowerCase().includes(this.query.toLowerCase())
            );
            
            this.isOpen = this.results.length > 0;
        },
        
        selectResult(result) {
            window.location.href = result.url;
        },
        
        clearSearch() {
            this.query = '';
            this.results = [];
            this.isOpen = false;
        }
    }));
    
    // Global search command palette
    Alpine.data('commandPalette', () => ({
        isOpen: false,
        query: '',
        
        commands: [
            {
                name: 'Create Banner',
                description: 'Create a new banner',
                action: () => window.location.href = '{{ route("admin.banners.create") }}',
                icon: 'banners'
            },
            {
                name: 'Create Blog Post',
                description: 'Create a new blog post',
                action: () => window.location.href = '{{ route("admin.blog.posts.create") }}',
                icon: 'blog'
            },
            {
                name: 'View Dashboard',
                description: 'Go to dashboard',
                action: () => window.location.href = '{{ route("admin.dashboard") }}',
                icon: 'dashboard'
            },
            {
                name: 'Manage Services',
                description: 'Manage services content',
                action: () => window.location.href = '{{ route("admin.services.index") }}',
                icon: 'services'
            },
            {
                name: 'View Contacts',
                description: 'View contact messages',
                action: () => window.location.href = '{{ route("admin.contacts.index") }}',
                icon: 'contacts'
            }
        ],
        
        filteredCommands() {
            if (!this.query) return this.commands;
            
            return this.commands.filter(command => 
                command.name.toLowerCase().includes(this.query.toLowerCase()) ||
                command.description.toLowerCase().includes(this.query.toLowerCase())
            );
        },
        
        executeCommand(command) {
            command.action();
            this.close();
        },
        
        open() {
            this.isOpen = true;
            this.query = '';
            this.$nextTick(() => {
                this.$refs.commandInput?.focus();
            });
        },
        
        close() {
            this.isOpen = false;
            this.query = '';
        }
    }));
});

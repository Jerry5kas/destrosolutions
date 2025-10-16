// Global loading helpers for Alpine.js
document.addEventListener('alpine:init', () => {
    Alpine.data('loadingState', () => ({
        loading: false,
        
        startLoading() {
            this.loading = true;
            this.$dispatch('loading-start');
        },
        
        stopLoading() {
            this.loading = false;
            this.$dispatch('loading-end');
        },
        
        simulateLoading(duration = 1000) {
            this.startLoading();
            setTimeout(() => {
                this.stopLoading();
            }, duration);
        }
    }));
    
    // Global loading event listeners
    Alpine.directive('loading', (el, { expression }, { evaluateLater, effect }) => {
        const getLoadingState = evaluateLater(expression);
        
        effect(() => {
            getLoadingState(loading => {
                if (loading) {
                    el.classList.add('opacity-50', 'pointer-events-none');
                } else {
                    el.classList.remove('opacity-50', 'pointer-events-none');
                }
            });
        });
    });
    
    // Form submission loading
    Alpine.directive('submit-loading', (el, { expression }, { evaluateLater, effect }) => {
        const getLoadingState = evaluateLater(expression);
        
        effect(() => {
            getLoadingState(loading => {
                const submitBtn = el.querySelector('button[type="submit"]');
                if (submitBtn) {
                    if (loading) {
                        submitBtn.disabled = true;
                        submitBtn.classList.add('opacity-75');
                    } else {
                        submitBtn.disabled = false;
                        submitBtn.classList.remove('opacity-75');
                    }
                }
            });
        });
    });
});

// Utility functions for loading states
window.loadingHelpers = {
    // Show global loading overlay
    showGlobalLoading() {
        window.dispatchEvent(new CustomEvent('loading-start'));
    },
    
    // Hide global loading overlay
    hideGlobalLoading() {
        window.dispatchEvent(new CustomEvent('loading-end'));
    },
    
    // Show loading with error handling
    async withLoading(callback, errorCallback = null) {
        try {
            this.showGlobalLoading();
            const result = await callback();
            return result;
        } catch (error) {
            if (errorCallback) {
                errorCallback(error);
            }
            console.error('Loading operation failed:', error);
        } finally {
            this.hideGlobalLoading();
        }
    },
    
    // Simulate loading for demo purposes
    simulateLoading(duration = 1000) {
        this.showGlobalLoading();
        setTimeout(() => {
            this.hideGlobalLoading();
        }, duration);
    }
};

import './bootstrap';
import Alpine from 'alpinejs';
import './loading-helpers';
import './search-functionality';
import './reveal';
import './cursor';

// Import simple GSAP animations (non-conflicting)
import './animations/simple-gsap.js';

window.Alpine = Alpine;
Alpine.start();

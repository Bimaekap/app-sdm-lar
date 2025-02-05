import './bootstrap';

// #NOTE: Module Alpinejs
// #README: https://benjamincrozat.com/alpine-js-laravel
import Alpine from 'alpinejs'
import collapse from '@alpinejs/collapse'
import focus from '@alpinejs/focus'
 
Alpine.plugin(focus)
Alpine.plugin(collapse)
Alpine.start()

// If you want Alpine's instance to be available globally
window.Alpine = Alpine
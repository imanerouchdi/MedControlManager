import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;
import './bootstrap';

import '../sass/app.scss'

Alpine.plugin(focus);

Alpine.start();

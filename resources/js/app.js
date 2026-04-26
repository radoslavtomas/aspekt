import './bootstrap';
import '../css/app.css';
import 'animate.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import MasonryWall from '@yeger/vue-masonry-wall'
import store from "./store/index.js";

import { library } from '@fortawesome/fontawesome-svg-core'
import { faFacebook, faInstagram } from '@fortawesome/free-brands-svg-icons'
import { faLink } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(faFacebook, faInstagram, faLink)

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${appName} | ${title}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    progress: {
        color: '#4B5563',
    },
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(MasonryWall)
            .use(store)
            .component('font-awesome-icon', FontAwesomeIcon)
            .mount(el);
    },
});

import { createApp } from 'vue';
import './style.css';
import AppIndice from './AppIndice.vue';
import AppAvisos from './AppAvisos.vue';
import Indice from './components/Indice.vue';
import Avisos from './components/Avisos.vue';
import {
    Carousel,
    Navigation,
    Pagination,
    Slide
} from 'vue3-carousel';
import InlineSvg from 'vue-inline-svg';

if (document.querySelector('#appIndice') !== null) {
    const appIndice = createApp(AppIndice);

    appIndice.component('Indice', Indice);
    appIndice.component('Carousel', Carousel);
    appIndice.component('Navigation', Navigation);
    appIndice.component('Pagination', Pagination);
    appIndice.component('Slide', Slide);
    appIndice.component('InlineSvg', InlineSvg);

    appIndice.mount('#appIndice')
}

if (document.querySelector('#appAvisos') !== null) {
    const appAvisos = createApp(AppAvisos);

    appAvisos.component('Avisos', Avisos);
    appAvisos.component('Carousel', Carousel);
    appAvisos.component('Navigation', Navigation);
    appAvisos.component('Pagination', Pagination);
    appAvisos.component('Slide', Slide);
    appAvisos.component('InlineSvg', InlineSvg);

    appAvisos.mount('#appAvisos');
}

import { createApp } from 'vue';
import './style.css';
import AppIndice from './AppIndice.vue';
import Indice from './components/Indice.vue';
import {
    Carousel,
    Navigation,
    Pagination,
    Slide
} from 'vue3-carousel';
import InlineSvg from 'vue-inline-svg';

const appIndice = createApp(AppIndice);

appIndice.component('Indice', Indice);
appIndice.component('Carousel', Carousel);
appIndice.component('Navigation', Navigation);
appIndice.component('Pagination', Pagination);
appIndice.component('Slide', Slide);
appIndice.component('InlineSvg', InlineSvg);

appIndice.mount('#appIndice')

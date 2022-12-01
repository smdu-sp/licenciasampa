import { createApp } from 'vue';
import './style.css';
import App from './App.vue';
import Indice from './components/Indice.vue';
import {
    Carousel,
    Navigation,
    Pagination,
    Slide
} from 'vue3-carousel';

const app = createApp(App);

app.component('Indice', Indice);
app.component('Carousel', Carousel);
app.component('Navigation', Navigation);
app.component('Pagination', Pagination);
app.component('Slide', Slide);

app.mount('#appHome')

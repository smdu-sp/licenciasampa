<?php
/*
Template Name: Home
*/

get_header();

if (have_posts()) : while (have_posts()) : the_post();

        the_content();

?>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios@1.2.0/dist/axios.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue3-carousel@0.2.5/dist/carousel.min.js"></script>

        <div id="appHome">
            <!-- Carousel -->
            <template>
                <Carousel>
                    <Slide v-for="slide in 10" :key="slide">
                        <div class="carousel__item">{{ slide }}</div>
                    </Slide>

                    <template #addons>
                        <Navigation />
                        <Pagination />
                    </template>
                </Carousel>
            </template>

        </div>

        <script type="module">
            import {
                Carousel,
                Navigation,
                Pagination,
                Slide
            } from 'vue3-carousel';

            import 'vue3-carousel/dist/carousel.css';

            export default defineComponent({
                name: 'Basic',
                components: {
                    Carousel,
                    Slide,
                    Pagination,
                    Navigation,
                },
            });
        </script>

        <script>
            const {
                createApp
            } = Vue;

            createApp({
                data() {
                    return {
                        postsRaw: '',
                    }
                },
                mounted() {
                    axios
                        .get('/wp-json/wp/v2/pages/?per_page=100')
                        .then(response => {
                            this.postsRaw = response.data;
                        });

                }
            }).mount('#appHome')
        </script>

        <style>
            .carousel__item {
                min-height: 200px;
                width: 100%;
                background-color: var(--vc-clr-primary);
                color: var(--vc-clr-white);
                font-size: 20px;
                border-radius: 8px;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .carousel__slide {
                padding: 10px;
            }

            .carousel__prev,
            .carousel__next {
                box-sizing: content-box;
                border: 5px solid white;
            }
        </style>

<?php
    endwhile;
endif;

get_footer();
?>
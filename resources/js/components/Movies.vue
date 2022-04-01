<template>
    <div class="container mx-auto">
        <Splide :options="options">
            <SplideSlide v-for="(movie, index) in movies" :key="index">
                <img class="max-w-[200px] h-[285px] m-auto rounded shadow-md duration-300" :src="movie.image_url" :alt="movie.title">
            </SplideSlide>
        </Splide>
    </div>
</template>

<script>
import { onMounted, ref } from '@vue/runtime-core';

import { Splide, SplideSlide } from '@splidejs/vue-splide'
import '@splidejs/splide/dist/css/themes/splide-sea-green.min.css';

    export default {

        setup() {

            const movies = ref([]);

            const getMovies = async () => {
                const res = await fetch('/movies');
                const data = await res.json();

                movies.value = data;
            }

            onMounted( () => {
                getMovies();
            });

            return {
                movies,
                options: {
                    type: 'loop',
                    perPage: 3
                },

                Splide,
                SplideSlide
            }
        }
    }
</script>

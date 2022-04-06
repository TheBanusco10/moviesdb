<template>
    <div class="container mx-auto">
        <p class="text-[25px]">All movies</p>
        <button 
            class="border border-black hover:bg-black hover:text-white p-2 transition"
            @click="addMovie"
            >Add movie</button>
        <section id="movies" class="flex flex-wrap justify-center">
            <div 
                class="movie p-5"
                v-for="(movie, index) in movies" :key="index"
            >

                <img 
                    class="max-h-[200px] rounded"
                    :src="movie.image_url"
                    :alt="movie.title">
                <p>
                    {{ movie.title }}
                </p>

            </div>
        </section>
    </div>
</template>

<script>
import { onMounted, ref } from '@vue/runtime-core';

    export default {

        setup() {

            const movies = ref([]);

            const getMovies = async () => {
                const res = await fetch('/movies');
                const data = await res.json();

                movies.value = data;
            }

            const addMovie = async () => {

                const _token = document.getElementById('token').getAttribute('content');

                const res = await fetch('/movies', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': _token,
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({
                        title: 'Moon Knight',
                        image_url: 'https://cloudfront-us-east-1.images.arcpublishing.com/gruporepublica/CU3VKR5VYZALHI75YSKUOSK6S4.jpg',
                        created_at: new Date(),
                        updated_at: new Date()
                    })
                });

                const data = await res.json();

                console.log(data);

            }

            onMounted( () => {
                getMovies();
            });

            return {
                movies,

                addMovie
            }
        }
    }
</script>

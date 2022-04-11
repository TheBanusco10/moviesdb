<template>
    <div class="container mx-auto text-center">
        <p class="text-[25px]">All movies</p>
        <button
            class="border border-black hover:bg-black hover:text-white p-2 transition"
            data-modal-toggle="addMovieModal"
            >Add movie</button>
        <section id="movies" class="flex flex-wrap justify-center gap-10 mt-5">
            <div
                class="movie relative rounded"
                v-for="(movie, index) in movies" :key="index"
            >

                <button class="top-2 right-0 absolute z-10">
                    <svg class="w-6 h-6 text-white" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path></svg>
                </button>

                <img
                    class="max-h-[200px] rounded brightness-50"
                    :src="movie.image_url"
                    :alt="movie.image_url" />

                <div class="acciones absolute top-2/4 w-full text-white">
                    <ul>
                        <button class="w-full">
                            <li class="p-2">Mi lista</li>
                        </button>
                        <button class="w-full">
                            <li class="p-2">Eliminar</li>
                        </button>
                    </ul>
                </div>

            </div>
        </section>


    </div>
    <div id="addMovieModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">

            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

                <div class="flex justify-between items-start p-5 rounded-t border-b dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 lg:text-2xl dark:text-white">
                        Add new movie
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="addMovieModal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>

                <div class="p-6 space-y-6">
                    <div class="relative z-0 mb-6 w-full group">
                        <div class="relative z-0 mb-6 w-full group">
                            <input type="text" name="title" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required
                            v-model="newMovie.title"
                            />
                            <label for="title" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Title</label>
                        </div>

                        <div class="relative z-0 mb-6 w-full group">
                            <input type="url" name="image_url" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required
                            v-model="newMovie.image_url"
                            />
                            <label for="image_url" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Image URL</label>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <button data-modal-toggle="addMovieModal" type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        @click="addMovie"
                        >Add</button>
                    <button data-modal-toggle="addMovieModal" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Close</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { onMounted, ref } from '@vue/runtime-core';

    export default {

        setup() {

            const movies = ref([]);
            const newMovie = ref({
                image_url: '',
                image_url: ''
            });

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
                        title: newMovie.value.title,
                        image_url: newMovie.value.image_url,
                        created_at: new Date(),
                        updated_at: new Date()
                    })
                });

                const data = await res.json();

                movies.value.push(data);

                console.log(data);

            }

            onMounted( () => {
                getMovies();
            });

            return {
                movies,
                newMovie,

                addMovie
            }
        }
    }
</script>

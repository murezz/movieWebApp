<script setup>
import Layout from '@/Layouts/Authenticated.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import Container from '@/Components/Container.vue';

defineProps({
    movie: Object
})

</script>

<template>
  <Head title="Detail" />

    <Layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Detail 
            </h2>
        </template>

        <Container>
            <div class="py-12">
                <div class="flex flex-wrap w-full rounded-2xl bg-gray-700"> 
                    <!-- <div class="rounded-2xl bg-gray-700 w-full"> -->
                        <div class="w-3/5 h-full relative">
                            <div class="w-full absolute inset-0 bg-gradient-to-l from-gray-700 via-transparent to-transparent"></div>
                            <img class="w-full h-full rounded-2xl" :src="`https://image.tmdb.org/t/p/original/${movie.backdrop_path}`" alt="">
                        </div>
                        <div class="w-2/5 h-full relative -left-40">
                            <div class="py-16 px-10 -mr-40">
                                <div class="text-white font-semibold text-3xl underline decoration-1 underline-offset-2">
                                    {{ movie.original_title }}
                                </div>
                                <div class="flex gap-x-2 text-lg mt-6 text-slate-200 font-semibold">
                                    <div v-for="genres in movie.genres" :key="genres.id">
                                        <span>{{ genres.name }}</span>
                                    </div>
                                </div>
                                <div class="mt-4 text-sm text-white font-semibold">
                                    {{ movie.overview }}
                                </div>
                                <Link :href="`/movie/trailer/${movie.id}`">
                                    <div class="w-1/4 mt-6 py-3 px-6 text-center rounded-xl bg-pink-500 text-white text-sm font-semibold">
                                        Watching
                                    </div>
                                </Link>
                            </div>
                        </div>
                    <!-- </div> -->
                </div>
            </div>
        </Container>

    </Layout>
    
</template>

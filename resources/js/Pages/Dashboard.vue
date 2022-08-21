<script setup>
import Layout from '@/Layouts/Authenticated.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import Container from '@/Components/Container.vue'

defineProps({
    now_playing: Array,
    upcoming: Array,
    date: String
})

</script>

<template>
  <Head title="Dashboard" />

    <Layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard 
            </h2>
        </template>

        <Container>
            
        </Container>

            <div class="py-4">
                <Container>
                    <div class="py-4">
                        <div class="font-bold text-3xl text-gray-800 underline decoration-3 decoration-pink-500 underline-offset-2">
                            <span class="bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-violet-500">
                                Now Playing 
                            </span>
                        </div>
                    </div>
                </Container>
                <div class="snap-x mx-auto snap-mandatory h-auto flex w-full overflow-scroll">
                    <div v-for="now_play in now_playing.results" :key="now_play.id">
                        <div class="pl-14">
                            <div class="snap-start w-80 flex scroll-ml-12">
                                <Link :href="`movie/${now_play.id}`">
                                    <img class="rounded-xl h-44 w-80" :src="`https://image.tmdb.org/t/p/original/${now_play.backdrop_path}`" loading="lazy" alt="{{ now_play.title }}">
                                    <h3 class="-mt-10 p-2.5 font-semibold backdrop-blur-lg bg-transparent text-white rounded-xl truncate">
                                        {{ now_play.original_title }}
                                    </h3>
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <Container>
            <div class="py-4">
                <div class="py-4">
                    <div class="font-bold text-3xl text-gray-800 underline decoration-3 decoration-pink-500 underline-offset-2">
                        <span class="bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-violet-500">
                            Up coming 
                        </span>
                    </div>
                </div>
                <div class="snap-x mx-auto snap-mandatory h-auto flex w-full overflow-scroll">
                    <div v-for="upcoming in upcoming.results" :key="upcoming.id">
                        <div v-if="upcoming.release_date > date && upcoming.poster_path != null">
                            <div class="pl-14">
                                <div class="snap-start w-24 flex scroll-ml-12">
                                    <Link :href="`movie/${upcoming.id}`">
                                        <img class="rounded-xl h-44 w-auto shadow-md" :src="`https://image.tmdb.org/t/p/original/${upcoming.poster_path}`" :alt="`${upcoming.title}`">
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </Container>
    </Layout>
    
</template>

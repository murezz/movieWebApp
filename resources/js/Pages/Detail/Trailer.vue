<script setup>
import Layout from '@/Layouts/Authenticated.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import Container from '@/Components/Container.vue';

defineProps({
    detail: Object,
    trailer: Array,
})

</script>

<template>
  <Head title="Trailer" />

    <Layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Trailer 
            </h2>
        </template>

        <Container>
            <div class="py-12">
                <div class="">
                    <div class="w-3/5">
                        <div v-for="video in trailer.results" :key="video.id">
                            <div v-if="video.name == 'Official Trailer'">
                                <iframe class="w-full aspect-video rounded-xl" :src="`https://www.youtube.com/embed/${video.key}?controls=1&modestbranding=1&rel=0&showinfo=0`" title="YouTube video player" frameborder="0" allow="autoplay; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>

                        <div class="my-5 font-semibold text-gray-800 text-2xl">
                            {{ detail.original_title }}
                        </div>
                    </div>

                    <div class="w-1/4">

                    </div>
                </div>
            </div>
        </Container>

    </Layout>
    
</template>

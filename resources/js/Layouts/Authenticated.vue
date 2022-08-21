<script setup>
import { ref } from 'vue';
import Navbar from './Navbar.vue';
</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-100">

            <Navbar></Navbar>

            <!-- Page Heading -->
            <header class="bg-white shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>

<!-- <div v-for="post in response.results" :key="post.id">
                                <img :src="`https://image.tmdb.org/t/p/original/${post.poster_path}`" alt="">
                                <div>{{ post.original_title }}</div>
                            </div> -->

<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import MainLayout from '../Layouts/MainLayout.vue';
import AspektHero from "@/Components/AspektHero.vue";
import TheFeaturedBooks from "@/Components/TheFeaturedBooks.vue";
import TheFeaturedBlogs from "@/Components/TheFeaturedBlogs.vue";

defineProps({
    blogs: Object,
    books: Object,
})

</script>

<template>
    <MainLayout>
        <Head title="Home" />

        <AspektHero />

        <TheFeaturedBooks :books="books.data" />

        <TheFeaturedBlogs :blogs="blogs.data" />
    </MainLayout>
</template>

<style scoped>

</style>

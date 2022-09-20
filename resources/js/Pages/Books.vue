<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import MainLayout from '../Layouts/MainLayout.vue'

defineProps({
    category: String,
    slug: String|null,
})


</script>

<template>
    <Head title="Knizna edicia" />
    <main-layout>
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            Knizna edicia - {{category}}
            <p v-if="slug">Article: {{slug}}</p>
        </div>
    </main-layout>
</template>

<style scoped>

</style>

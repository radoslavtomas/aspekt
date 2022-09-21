<script setup>
import {Head, Link, usePage} from '@inertiajs/inertia-vue3';
import MainLayout from '../Layouts/MainLayout.vue'
import Pagination from '../Components/Pagination.vue'
import {computed, onMounted} from "vue";

defineProps({
    books: Object,
    category: String,
    slug: String|null,
})

const books = computed(() => usePage().props.value.books);

onMounted(() => console.log(books.value))


</script>

<template>
    <Head title="Knizna edicia" />
    <main-layout>
<!--        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">-->
<!--            Knizna edicia - {{category}}-->
<!--            <p v-if="slug">Article: {{slug}}</p>-->
<!--        </div>-->

        <div v-for="book in books.data">
            {{book.title}}
            <img class="w-48 h-auto" :src="`storage/${book.cover}`" alt="book.title">
        </div>

        <pagination :links="books.meta.links"></pagination>

    </main-layout>
</template>

<style scoped>

</style>

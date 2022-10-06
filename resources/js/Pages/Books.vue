<script setup>
import {Head, Link, usePage} from '@inertiajs/inertia-vue3';
import MainLayout from '../Layouts/MainLayout.vue'
import {computed, onMounted} from "vue";
import BookList from '../Components/BookList.vue';
import BookSingle from '../Components/BookSingle.vue';
import Breadcrumbs from '../Components/Breadcrumbs.vue';

// defineProps({
//     //
// })

const book = computed(() => usePage().props.value.book);
const books = computed(() => usePage().props.value.books);
const category = computed(() => usePage().props.value.category);
const page = computed(() => usePage().props.value.page);
const slug = computed(() => usePage().props.value.slug);

// const items = computed(() => books.value.data);

onMounted(() => console.log(slug.value));


</script>

<template>
    <Head title="Knizna edicia" />

    <main-layout>
        <section class="container mx-auto">

            <div class="max-w-4xl mx-auto" v-if="slug">
                <Breadcrumbs id="books" :article="book ? book.title : ''"/>
                <BookSingle :book="book" />
            </div>

            <template v-else>
                <Breadcrumbs id="books" :article="book ? book.title : ''"/>
                <BookList :items="books.data" :links="books.meta.links" :category="category.url" />
            </template>
        </section>
    </main-layout>
</template>

<style scoped>

</style>

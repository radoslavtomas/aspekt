<script setup>
import {Head, usePage} from '@inertiajs/inertia-vue3';
import MainLayout from '../Layouts/MainLayout.vue'
import {computed, onMounted} from "vue";
import BookList from '../Components/BookList.vue';
import BookSingle from '../Components/BookSingle.vue';
import BasketWidget from "../Components/BasketWidget.vue";

const page = computed(() => usePage().props.value.page);
const slug = computed(() => usePage().props.value.slug);

// const items = computed(() => books.value.data);

onMounted(() => console.log(page.value));


</script>

<template>
    <Head title="Knizna edicia" />

    <main-layout>
        <div class="container-aspekt mx-auto">
            <div v-if="slug">
                <BookSingle />
            </div>

            <template v-else>
                <BookList />
            </template>
        </div>
    </main-layout>

    <basket-widget />
</template>

<style scoped>

</style>

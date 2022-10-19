<script setup>
import {Head, usePage} from '@inertiajs/inertia-vue3';
import MainLayout from '../Layouts/MainLayout.vue'
import {computed, onMounted} from "vue";
import BookSingle from '../Components/BookSingle.vue';
import BasketWidget from "../Components/BasketWidget.vue";

const slug = computed(() => usePage().props.value.slug);

onMounted(() => console.log(slug.value));


</script>

<template>
    <Head title="Knizna edicia" />

    <main-layout>

        <BookSingle />

    </main-layout>

    <basket-widget />
</template>

<style scoped>

</style>

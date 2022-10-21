<script setup>
import BasketWidget from "../Components/BasketWidget.vue";
import BookSingle from '../Components/BookSingle.vue';
import MainLayout from '../Layouts/MainLayout.vue'
</script>

<template>
    <main-layout>
        <BookSingle />
    </main-layout>

    <basket-widget />
</template>


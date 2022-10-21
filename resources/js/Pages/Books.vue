<script setup>
import BasketWidget from "../Components/BasketWidget.vue";
import BookList from '../Components/BookList.vue';
import MainLayout from '../Layouts/MainLayout.vue'
</script>

<template>
    <main-layout>
        <BookList />
    </main-layout>

    <basket-widget />
</template>


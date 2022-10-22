<script setup>
import BasketWidget from "../Components/BasketWidget.vue";
import BlogList from '../Components/BlogList.vue';
import MainLayout from '../Layouts/MainLayout.vue'
</script>

<template>
    <main-layout>
        <BlogList />
    </main-layout>

    <basket-widget />
</template>


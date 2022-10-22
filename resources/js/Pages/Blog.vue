<script setup>
import BasketWidget from "../Components/BasketWidget.vue";
import BlogSingle from '../Components/BlogSingle.vue';
import MainLayout from '../Layouts/MainLayout.vue'
</script>

<template>
    <main-layout>
        <BlogSingle />
    </main-layout>

    <basket-widget />
</template>

<script setup>
import BasketWidget from "../Components/BasketWidget.vue";
import PersonSingle from '../Components/PersonSingle.vue';
import MainLayout from '../Layouts/MainLayout.vue'
</script>

<template>
    <main-layout>
        <PersonSingle />
    </main-layout>

    <basket-widget />
</template>

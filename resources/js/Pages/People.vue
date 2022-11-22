<script setup>
import BasketWidget from "../Components/BasketWidget.vue";
import PeopleList from '../Components/PeopleList.vue';
import MainLayout from '../Layouts/MainLayout.vue'
</script>

<template>
    <main-layout>
        <PeopleList />
    </main-layout>

    <basket-widget />
</template>

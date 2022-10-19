<script setup>
import {Head, usePage} from '@inertiajs/inertia-vue3';
import MainLayout from '../Layouts/MainLayout.vue'
import {computed, onMounted} from "vue";
import BookList from '../Components/BookList.vue';

import BasketWidget from "../Components/BasketWidget.vue";

const navigation = computed(() => usePage().props.value.navigation);
const navigationString = computed(() => navigation.value.find(el => el.route === 'books'));
const locale = computed(() => usePage().props.value.locale);
const category = computed(() => usePage().props.value.category);
// const categoryString = category.value[`name_${locale}`]
// onMounted(() => console.log(categoryString));


</script>

<template>
<!--    <Head :title="`${navigationString['name_sk']} | ${categoryString}`" />-->

    <main-layout>

        <BookList />

    </main-layout>

    <basket-widget />
</template>

<style scoped>

</style>

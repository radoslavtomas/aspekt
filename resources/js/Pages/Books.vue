<script setup>
import {Head, usePage} from '@inertiajs/inertia-vue3';
import MainLayout from '../Layouts/MainLayout.vue'
import {computed, onMounted} from "vue";
import BookList from '../Components/BookList.vue';
import BookSingle from '../Components/BookSingle.vue';
import BasketCtaButton from "../Components/BasketCtaButton.vue";

const page = computed(() => usePage().props.value.page);
const slug = computed(() => usePage().props.value.slug);

// const items = computed(() => books.value.data);

onMounted(() => console.log(page.value));


</script>

<template>
    <Head title="Knizna edicia" />

    <main-layout>
        <section class="container mx-auto">
            <div v-if="slug">
                <BookSingle />
            </div>

            <template v-else>
                <BookList />
            </template>
        </section>
    </main-layout>

    <basket-cta-button />
</template>

<style scoped>

</style>

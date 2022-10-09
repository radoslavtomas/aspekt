<template>
    <div class="max-w-3xl mx-auto">
        <Breadcrumbs id="books" :article="book ? book.title : ''"/>

        <article class="mt-10">
            <header class="flex flex-col md:flex-row justify-between items-center md:items-start mb-6 md:mb-12">
                <div class="text-center md:text-left w-full h-full flex-1 flex flex-col justify-items-stretch">
                    <div class="">
                        <h1 class="text-2xl md:text-3xl text-red-600 font-bold">{{book.title}}</h1>
                        <h4 class="text-sm my-1">{{book.subtitle}}</h4>
                        <h3 class="md:my-4 text-xl">{{book.authors}}</h3>
                        <p v-if="book.editors" class="text-gray-500 text-xs">Editorky & editori: {{book.editors}}</p>
                        <p v-if="book.translation" class="text-gray-500 text-xs">Preklad: {{book.translation}}</p>
                    </div>

                    <img v-if="book.cover" class="md:hidden w-64 h-auto mt-4 md:mt-0 md:ml-4 shadow-2xl border border-gray-200 mx-auto md:mx-0 rounded-2xl" :src="`/storage/${book.cover}`" alt="book.title">

                    <div class="text-xs mt-6 md:mt-12 text-gray-500 flex flex-col items-center md:items-start" v-if="book.is_product">
                        <p>Pocet stran: {{book.pages}}</p>
                        <p>ISBN: {{book.isbn}}</p>
                        <br>
                        <p class="text-lg md:text-xl text-red-600 font-bold">ASPEKT cena: {{book.aspekt_price}}</p>
                        <p>(Bezna cena {{book.common_price}})</p>
                        <BookSingleCtaButton />
                    </div>

                </div>
                <img v-if="book.cover" class="hidden md:block w-64 h-auto mt-4 md:mt-0 md:ml-4 shadow-2xl border border-gray-200 mx-auto md:mx-0 rounded-2xl" :src="`/storage/${book.cover}`" alt="book.title">
            </header>

            <main class="max-w-2xl mx-auto px-1">
                <div v-html="book.body" class="mb-4"></div>
                <div v-html="book.sample" class="bg-green-200 mb-4"></div>
                <div v-html="book.links" class="bg-blue-200 mb-4"></div>
            </main>
        </article>
    </div>
</template>

<script setup>
import {computed, onMounted} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";

import Breadcrumbs from '../Components/Breadcrumbs.vue';
import BookSingleCtaButton from './BookSingleCtaButton.vue';

const book = computed(() => usePage().props.value.book.data);

onMounted(() => console.log(book.value))

</script>

<style scoped>

</style>

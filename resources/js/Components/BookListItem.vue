<template>
    <article class="bg-white border border-gray-300 shadow-md p-4">
        <header>
            <Link :href="route('books', [categoryUrl, props.item.slug])">
                <img v-if="props.item.cover" class="w-48 h-auto mx-auto border border-gray-200 shadow-md mb-2 rounded-md hover:-translate-y-1 transition-transform duration-75 ease-out" :src="`/storage/${props.item.cover}`" :alt="item.title">
            </Link>
        </header>
        <main>
            <Link :href="route('books', [categoryUrl, props.item.slug])">
                <h2 class="text-xl text-red-600">{{props.item.title}}</h2>
            </Link>
            <h3 class="text-sm italic mb-4">{{props.item.authors}}</h3>
            <p class="text-xs" v-html="props.item.teaser"></p>
        </main>
        <footer v-if="props.item.is_product" class="py-2 my-2 flex justify-between items-center">
            <p class="font-bold">{{props.item.aspekt_price}}</p>
            <BookSingleCtaButton :book="props.item" />
        </footer>
    </article>
</template>

<script setup>
import {computed} from "vue";
import {Link, usePage} from "@inertiajs/inertia-vue3";

import BookSingleCtaButton from './BookSingleCtaButton.vue';

const categoryUrl = computed(() => usePage().props.value.category.url);

const props = defineProps({
    item: Object
})
</script>


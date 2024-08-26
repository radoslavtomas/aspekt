<template>
    <article class="bg-white border border-gray-300 shadow-md p-4">
        <header>
            <Link :href="route('books', [categoryUrl, props.item.slug])">
                <img v-if="props.item.cover"
                     :alt="item.title"
                     :src="`/storage/${props.item.cover}`"
                     class="w-48 h-auto mx-auto border border-gray-200 shadow-md mb-2 rounded-md hover:-translate-y-1 transition-transform duration-75 ease-out">
            </Link>
        </header>
        <main>
            <Link :href="route('books', [categoryUrl, props.item.slug])">
                <h2 class="text-xl text-red-600">{{ props.item.title }}</h2>
            </Link>
            <h3 v-if="props.item.subtitle" class="text-sm text-gray-500 italic mb-2">{{ props.item.subtitle }}</h3>
            <h3 :class="props.item.subtitle ? '' : 'mt-2'" class="text-sm italic mb-4 text-red-600">
                <Link :href="route('search', {'parameter': 'inline', 'query': props.item.authors})">
                    {{ props.item.authors }}
                </Link>
            </h3>
            <p class="text-sm" v-html="props.item.teaser"></p>
        </main>
        <footer v-if="props.item.is_product" class="py-2 my-2 flex justify-between items-center">
            <p class="font-bold">{{ props.item.aspekt_price }}</p>
            <BookSingleCtaButton :book="props.item"/>
        </footer>
    </article>
</template>

<script setup>
import { computed } from 'vue'
import { Link, usePage } from '@inertiajs/inertia-vue3'

import BookSingleCtaButton from './BookSingleCtaButton.vue'

const categoryUrl = computed(() => {
    const url = usePage().props.value.category?.url
    return url ? url : 'vsetko'
})

const props = defineProps({
    item: Object
})
</script>


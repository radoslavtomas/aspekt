<template>
    <Link :href="route('njuvinky', [categoryUrl, props.item.slug])">
        <article
            class="bg-white border border-gray-300 shadow-md p-4 hover:-translate-y-1 hover:border-2 hover:p-3 transition ease-out duration-100">
            <header>

                <img v-if="props.item.cover"
                     :alt="item.title"
                     :src="`/storage/${props.item.cover}`"
                     class="w-48 h-auto mx-auto border border-gray-200 shadow-md mb-2 rounded-md">

            </header>
            <main>
                <Link :href="route('njuvinky', [categoryUrl, props.item.slug])">
                    <h2 class="text-xl text-red-600">{{ props.item.title }}</h2>
                </Link>
                <h3 class="text-sm italic mb-4">{{ props.item.authors }}</h3>
                <p class="text-xs" v-html="props.item.teaser"></p>
            </main>
            <footer v-if="props.item.is_product" class="py-2 my-2 flex justify-between items-center">
                <p class="font-bold">{{ props.item.aspekt_price }}</p>
                <BookSingleCtaButton :book="props.item"/>
            </footer>
        </article>
    </Link>
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



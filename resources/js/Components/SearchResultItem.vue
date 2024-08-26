<script setup>
import { Link } from '@inertiajs/inertia-vue3'

const props = defineProps({
    title: String,
    teaser: String,
    link: String
})

</script>

<template>
    <article class="border-b border-gray-200 last:border-b-0 mb-1 rounded px-2 py-6">
        <header class="text-lg text-red-600 hover:text-red-700">
            <Link :href="props.link"><strong>{{ props.title }}</strong></Link>
        </header>
        <main class="text-sm italic my-1" v-html="props.teaser">
        </main>
       
    </article>

</template>

<style scoped>

</style>

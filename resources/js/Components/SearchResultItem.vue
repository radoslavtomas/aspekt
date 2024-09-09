<script setup>
import { Link } from '@inertiajs/inertia-vue3'

const props = defineProps({
    item: Object,
})

</script>

<template>
    <article class="border-b border-gray-200 last:border-b-0 mb-1 rounded px-2 py-6">
        <header class="text-lg text-red-600 hover:text-red-700">
            <Link :href="props.item.link"><strong>{{ props.item.title }}</strong></Link>
        </header>
        <main class="text-sm my-1" v-html="props.item.teaser">
        </main>
        <footer>
            <small>{{ props.item.created_at }}</small>
        </footer>

    </article>

</template>

<style scoped>

</style>

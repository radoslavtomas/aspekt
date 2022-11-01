<template>
    <article class="border border-pink-500 bg-white shadow-md mb-4">
        <header class="py-3 px-2 text-pink-600 font-bold text-center">
            <span class="border-b-2 border-pink-600 p-1">{{props.title}}</span>
        </header>

        <main class="p-4">
            <slot></slot>
        </main>
    </article>

</template>

<script setup>
const props = defineProps({
    title: String
})

</script>

<style scoped>

</style>

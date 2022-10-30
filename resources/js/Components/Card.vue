<template>
    <article class="broder border-gray-300 bg-white shadow-md mb-4">
        <header class="py-3 px-2 bg-gradient-to-r from-pink-500 to-fuchsia-400 text-white text-center">
            <p>{{props.title}}</p>
        </header>

        <main class="p-4 border-x border-b border-fuchsia-500">
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

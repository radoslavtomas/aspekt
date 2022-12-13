<template>
    <div class="relative flex w-full justify-center items-center" :class="margin ? 'my-6' : ''">
        <h6 class="text-pink-600 px-1 bg-white z-10">&lt; {{ title }} &gt;</h6>
        <div class="absolute top-3 right-0 w-full h-0.5 bg-pink-500 flex-1 z-0"></div>
    </div>
</template>

<script setup>
defineProps({
    title: String,
    margin: {
        type: Boolean,
        default: false
    }
})
</script>

<style scoped>

</style>

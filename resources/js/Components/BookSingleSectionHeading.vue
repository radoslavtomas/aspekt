<template>
    <div class="flex w-full items-center mb-3">
        <h6 class="text-red-700 pr-3">{{props.heading}}</h6>
        <div class="h-1 bg-red-700 flex-1"></div>
    </div>
</template>

<script setup>
const props = defineProps({
    heading: String
})
</script>

<style scoped>

</style>

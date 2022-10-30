<template>
    <label class="block">
        <span class="text-gray-700 text-sm">{{props.title}}</span>
        <textarea class="
            mt-1
            text-sm
            block
            w-full
            rounded-md
            border-gray-300
            shadow-sm
            focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50
          " rows="3"></textarea>
    </label>
</template>

<script setup>
const props = defineProps({
    title: String
})
</script>

<style scoped>

</style>

<template>
    <label class="inline-flex items-center">
        <input type="checkbox" class="
              rounded
              border-gray-300
              text-fuchsia-600
              shadow-sm
              focus:border-indigo-300
              focus:ring
              focus:ring-offset-0
              focus:ring-indigo-200
              focus:ring-opacity-50
            " checked>
        <span class="ml-2 text-sm">{{props.title}}</span>
    </label>
</template>

<script setup>
const props = defineProps({
    title: String
})
</script>

<style scoped>

</style>

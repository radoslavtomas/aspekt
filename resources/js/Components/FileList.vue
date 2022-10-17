<template>
    <ul class="text-xs">
        <file-list-item v-for="(file, index) in props.files" :key="index" :file="file" />
    </ul>
</template>

<script setup>
import FileListItem from './FileListItem.vue'

const props = defineProps({
    files: Array
})
</script>

<style scoped>

</style>

<template>
<li class="mb-0.5">
    <a :href="props.file.filepath" download class="flex justify-start items-center">
        <document-pdf-icon v-if="isPdf" class="h-4 w-4 mr-1 text-red-600" />
        <photo-icon v-if="isImage" class="h-4 w-4 mr-1 text-blue-700" />
        <paper-clip-icon v-if="isOther" class="h-4 w-4 mr-1 text-gray-500" />
        <span class="text-red-800 hover:text-red-900">{{props.file.filename}}</span>
    </a>
</li>
</template>

<script setup>
import DocumentPdfIcon from '../Icons/DocumentPdfIcon.vue';
import { PhotoIcon } from '@heroicons/vue/24/outline';
import { PaperClipIcon } from '@heroicons/vue/24/outline';
import {computed} from "vue";

const props = defineProps({
    file: Object
})

const isPdf = computed(() => props.file.filemime.toLowerCase() === 'application/pdf');
const isImage = computed(() => {
    return [
        'image/jpeg',
        'image/jpg',
        'image/png',
        'image/gif',
    ].includes(props.file.filemime.toLowerCase())
});
const isOther = computed(() => !isPdf && !isImage)
</script>

<style scoped>

</style>

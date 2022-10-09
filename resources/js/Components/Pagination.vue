<template>
    <div v-if="props.links.length > 3">
        <div class="hidden md:flex flex-wrap -mb-1 text-xs">
            <template v-for="(link, p) in props.links" :key="p">
                <div v-if="link.url === null" class="mr-1 mb-1 px-2 py-1 text-gray-400 border rounded"
                     v-html="link.label" />
                <Link v-else
                      class="mr-1 mb-1 px-2 py-1 border rounded hover:bg-white focus:border-red-500 focus:text-red-500"
                      :class="{ 'bg-red-700 text-white hover:bg-red-800': link.active }" :href="link.url" v-html="link.label" />
            </template>
        </div>

        <div class="block md:hidden flex flex-wrap -mb-1 text-xs">
            <div v-if="prev.url === null" class="mr-1 mb-1 px-2 py-1 text-gray-400 border rounded"
                 v-html="prev.label" />
            <Link v-else
                  class="mr-1 mb-1 px-2 py-1 border rounded hover:bg-white focus:border-red-500 focus:text-red-500"
                  :class="{ 'bg-red-700 text-white hover:bg-red-600': prev.active }" :href="prev.url" v-html="prev.label" />
            <div v-if="next.url === null" class="mr-1 mb-1 px-2 py-1 text-gray-400 border rounded"
                 v-html="next.label" />
            <Link v-else
                  class="mr-1 mb-1 px-2 py-1 border rounded hover:bg-white focus:border-red-500 focus:text-red-500"
                  :class="{ 'bg-red-700 text-white hover:bg-red-800': next.active }" :href="next.url" v-html="next.label" />
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import {computed, onMounted} from "vue";
const props = defineProps({
    links: Array,
});
const prev = computed(() => props.links[0])
const next = computed(() => props.links.at(-1))
</script>

<style scoped>

</style>

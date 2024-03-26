<template>
    <a class="flex items-center text-sm hover:bg-red-700 mb-2"
       href="#">
        {{ link.eshop_name }}

        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
             xmlns="http://www.w3.org/2000/svg">
            <path
                d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244"
                stroke-linecap="round"
                stroke-linejoin="round"/>
        </svg>
    </a>
</template>

<script setup>
import { useStore } from 'vuex'
import { computed } from 'vue'
import { usePage } from '@inertiajs/inertia-vue3'

const store = useStore()
const lang = computed(() => store.getters.lang)
const locale = computed(() => usePage().props.value.locale)

const props = defineProps({
    link: Array
})

</script>

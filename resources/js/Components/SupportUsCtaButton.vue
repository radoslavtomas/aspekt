<script setup>
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

const locale = computed(() => usePage().props.locale)
const settings = computed(() => usePage().props.settings)

// data
const lang = {
    sk: {
        'part1': 'Chcem',
        'part2': 'podporiť',
    },
    en: {
        'part1': 'I want to',
        'part2': 'support',
    },
}
</script>

<template>
    <div class="flex mr-1 ml-2 lgg:ml-4 lgg:pr-0">
        <a
            :href="settings['linkDarujme']"
            class="text-xs sm:text-sm text-white text-center px-2 lgg:px-3 py-1.5 shadow-sm border border-red-600 bg-red-600 hover:bg-red-700 rounded"
            target="_blank"
        >
            <div class="flex items-center space-x-2">
                <span>
                    {{ lang[locale].part1 }} <br class="sm:hidden"> {{ lang[locale].part2 }}
                </span>

                <svg class="size-4" fill="none" stroke="currentColor" stroke-width="1.5"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M21 11.25v8.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5v-8.25M12 4.875A2.625 2.625 0 1 0 9.375 7.5H12m0-2.625V7.5m0-2.625A2.625 2.625 0 1 1 14.625 7.5H12m0 0V21m-8.625-9.75h18c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125h-18c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z"
                        stroke-linecap="round"
                        stroke-linejoin="round"/>
                </svg>
            </div>


        </a>
    </div>
</template>

<style scoped>

</style>

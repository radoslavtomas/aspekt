<script setup>
import { Head, Link, usePage } from '@inertiajs/vue3'
import MainLayout from '../Layouts/MainLayout.vue'
import { computed } from 'vue'

const locale = computed(() => usePage().props.locale)

// data
const lang = {
    sk: {
        'title': 'Zvoliť jazyk',
        'subtitle': 'Vyberte si jazyk, ktorý chcete používať na tomto webe',
    },
    en: {
        'title': 'Choose the language',
        'subtitle': 'Choose the language you would like to use on this website',
    },
}
</script>

<template>
    <Head title="Language"/>
    <main-layout>
        <div class="max-w-3xl mx-auto">
            <h1 class="border-b border-gray-300 pb-8 text-2xl md:text-3xl text-red-600 font-bold my-8 text-center">
                <span class=" pb-2 px-4">{{ lang[locale].title }}</span>
            </h1>
        </div>
        <div class="flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-md w-full space-y-8">
                <div class="bg-white rounded-xl shadow-2xl p-8">
                    <div class="text-center">
                        <p class="text-gray-600 text-lg mb-8">
                            {{ lang[locale].subtitle }}
                        </p>
                    </div>

                    <div class="space-y-4">
                        <Link :href="route('language', 'sk')"
                              class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-linear-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all duration-200 transform shadow-lg hover:shadow-xl">
                            <span class="flex items-center">
                                🇸🇰 Slovenský
                                <span v-if="locale === 'sk'" class="ml-2 text-green-300">✓</span>
                            </span>
                        </Link>
                        <Link :href="route('language', 'en')"
                              class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-linear-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all duration-200 transform shadow-lg hover:shadow-xl">
                            <span class="flex items-center">
                                🇺🇸 English
                                <span v-if="locale === 'en'" class="ml-2 text-green-300">✓</span>
                            </span>
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </main-layout>
</template>

<style scoped>

</style>

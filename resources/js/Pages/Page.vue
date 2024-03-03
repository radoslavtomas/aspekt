<script setup>
import { computed } from 'vue'
import { Head, usePage } from '@inertiajs/inertia-vue3'

import MainLayout from '../Layouts/MainLayout.vue'

const locale = computed(() => usePage().props.value.locale)
const page = computed(() => usePage().props.value.page)

const title = computed(() => page.value[`name_${locale.value}`])
const body = computed(() => page.value[`body_${locale.value}`])

</script>

<template>
    <Head :title="title"/>
    <main-layout>
        <div class="max-w-[48rem] mx-auto">
            <h1 class="border-b border-gray-300 pb-8 text-2xl md:text-3xl text-red-600 font-bold my-8 text-center">
                <span class=" pb-2 px-4">{{ title }}</span>
            </h1>
            
            <div class="content" v-html="body"></div>
        </div>

    </main-layout>
</template>

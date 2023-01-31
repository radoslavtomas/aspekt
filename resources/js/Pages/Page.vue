<script setup>
import {computed} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";

import MainLayout from '../Layouts/MainLayout.vue'

const locale = computed(() => usePage().props.value.locale)
const page = computed(() => usePage().props.value.page)

const title = computed(() => page.value[`name_${locale.value}`])
const body = computed(() => page.value[`body_${locale.value}`])
</script>

<template>
    <main-layout>
        <div class="max-w-[48rem] mx-auto">
            <div v-if="page.id === 3" class="mb-6 text-gray-700 aspektin text-center p-4">
                <h1 class="text-3xl font-bold tracking-widest">A S P E K T i n</h1>

                <h5 class="text-sm tracking-wider font-bold">f e m i n i s t i c k y&nbsp;&nbsp;&nbsp;w e b z i n</h5>
            </div>

            <h1 class="border-b border-gray-300 pb-8 text-2xl md:text-3xl text-red-600 font-bold my-8 text-center">
                <span class=" pb-2 px-4">{{title}}</span>
            </h1>


            <div class="content" v-html="body"></div>
        </div>

    </main-layout>
</template>

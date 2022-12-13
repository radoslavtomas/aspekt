<script setup>
import {computed, onMounted} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";

import BasketWidget from "../Components/BasketWidget.vue";
import MainLayout from '../Layouts/MainLayout.vue'
import Breadcrumbs from '../Components/Breadcrumbs.vue';

const locale = computed(() => usePage().props.value.locale)
const page = computed(() => usePage().props.value.page)
const breadcrumbsId = computed(() => usePage().props.value.breadcrumbs_id)

const title = computed(() => page.value[`name_${locale.value}`])
const body = computed(() => page.value[`body_${locale.value}`])

onMounted(() => console.log(page.value))
</script>

<template>
    <main-layout>
        <Breadcrumbs :id="breadcrumbsId" />

        <h1 class="border-b border-gray-300 pb-8 text-3xl md:text-4xl text-red-600 font-bold my-8 text-center">
            <span class=" pb-2 px-4">{{title}}</span>
        </h1>

        <div class="max-w-[48rem] mx-auto">
            <div class="content" v-html="body"></div>
        </div>

    </main-layout>

    <basket-widget />
</template>

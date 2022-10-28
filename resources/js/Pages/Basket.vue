<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import MainLayout from '../Layouts/MainLayout.vue'

defineProps({
    category: String,
    slug: String|null,
})


</script>

<template>
    <Head title="Basket" />
    <main-layout>
        <div class="max-w-xl mx-auto text-sm">
            <label class="block mb-3">
                <span class="text-gray-700 pl-1">Meno</span>
                <input type="text" class="
                    mt-1
                    text-sm
                    block
                    w-full
                    rounded-md
                    border-gray-300
                    shadow-sm
                    focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50
                  " placeholder="">
            </label>

            <label class="block mb-3">
                <span class="text-gray-700 pl-1">Priezvisko</span>
                <input type="text" class="
                    mt-1
                    text-sm
                    block
                    w-full
                    rounded-md
                    border-gray-300
                    shadow-sm
                    focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50
                  " placeholder="">
            </label>

            <label class="block mb-3">
                <span class="text-gray-700 pl-1">Spolocnost</span>
                <input type="text" class="
                    mt-1
                    text-sm
                    block
                    w-full
                    rounded-md
                    border-gray-300
                    shadow-sm
                    focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50
                  " placeholder="">
            </label>

            <label class="block mb-3">
                <span class="text-gray-700 pl-1">Ulica</span>
                <input type="text" class="
                    mt-1
                    text-sm
                    block
                    w-full
                    rounded-md
                    border-gray-300
                    shadow-sm
                    focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50
                  " placeholder="">
            </label>
        </div>
    </main-layout>
</template>

<style scoped>

</style>

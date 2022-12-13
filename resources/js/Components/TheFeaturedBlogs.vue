<template>
    <section class="my-4">
        <Separator title="Dolezite v ASPEKTin" margin />

        <div class="mt-8 bg-white overflow-hidden border border-gray-200 rounded shadow-lg">
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="ml-2 text-lg font-bold"><a href="https://laravel.com/docs" class="text-red-600 hover:text-red-700">{{ blogs[0].title }}</a></div>
                    </div>

                    <div>
                        <div v-html="blogs[0].teaser" class="mt-2 text-gray-600 dark:text-gray-400 text-sm"></div>
                    </div>
                </div>

                <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                    <div class="flex items-center">
                        <div class="ml-2 text-lg font-bold"><a href="https://laravel.com/docs" class="text-red-600 hover:text-red-700">{{ blogs[1].title }}</a></div>
                    </div>

                    <div class="">
                        <div v-html="blogs[1].teaser" class="mt-2 text-gray-600 dark:text-gray-400 text-sm"></div>
                    </div>
                </div>

                <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                    <div class="flex items-center">
                        <div class="ml-2 text-lg font-bold"><a href="https://laravel.com/docs" class="text-red-600 hover:text-red-700">{{ blogs[2].title }}</a></div>
                    </div>

                    <div class="">
                        <div v-html="blogs[2].teaser" class="mt-2 text-gray-600 dark:text-gray-400 text-sm"></div>
                    </div>
                </div>

                <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                    <div class="flex items-center">
                        <div class="ml-2 text-lg font-bold"><a href="https://laravel.com/docs" class="text-red-600 hover:text-red-700">{{ blogs[3].title }}</a></div>
                    </div>

                    <div class="">
                        <div v-html="blogs[3].teaser" class="mt-2 text-gray-600 dark:text-gray-400 text-sm"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import Separator from "@/Components/Separator.vue";
defineProps({
    blogs: Array
})
</script>

<style scoped>

</style>

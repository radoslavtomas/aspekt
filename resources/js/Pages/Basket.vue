<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import MainLayout from '../Layouts/MainLayout.vue'

import FormInput from '../Components/Form/FormInput.vue';
import { TrashIcon } from '@heroicons/vue/24/outline';

defineProps({
    category: String,
    slug: String|null,
})


</script>

<template>
    <Head title="Basket" />
    <main-layout>
        <section class="my-4 max-w-xl mx-auto">
            <div class="grid grid-cols-12 gap-4 py-4 border-b border-gray-300">
                <div class="col-span-3 sm:col-span-2">
                    <img class="w-20 h-auto shadow border border-gray-200 rounded" src="/storage/sites/default/files/Nanichodnica_1.png" alt="book.title">
                </div>

                <div class="col-span-6 sm:col-span-8 flex flex-col justify-between items-stretch">
                    <div>
                        <h4 class="text-base sm:text-lg uppercase">Nanichodnica</h4>
                        <h6 class="text-sm italic">Jana Juranova</h6>
                    </div>
                    <div class="flex justify-start items-center">
                        <div class="w-16 h-full flex justify-start items-center">
                            <FormInput type="number"/>
                        </div>

                        <span class="ml-3">
                            <TrashIcon class="h-4 w-4 text-red-500 hover:text-red-600 cursor-pointer" />
                        </span>
                    </div>
                </div>

                <div class="col-span-3 sm:col-span-2 text-sm sm:text-base text-right font-bold">
                    8,93€
                </div>
            </div>

            <div class="grid grid-cols-12 gap-4 py-4 border-b border-gray-300">
                <div class="col-span-3 sm:col-span-2">
                    <img class="w-20 h-auto shadow border border-gray-200 rounded" src="/storage/sites/default/files/JEDNOROZCE VACSIE.jpg" alt="book.title">
                </div>

                <div class="col-span-6 sm:col-span-8 flex flex-col justify-between items-stretch">
                    <div>
                        <h4 class="text-base sm:text-lg uppercase">Jednorozce</h4>
                        <h6 class="text-sm italic">Jana Juranova</h6>
                    </div>
                    <div class="flex justify-start items-center">
                        <div class="w-16 h-full flex justify-start items-center">
                            <FormInput type="number"/>
                        </div>

                        <span class="ml-3">
                            <TrashIcon class="h-4 w-4 text-red-500 hover:text-red-600 cursor-pointer" />
                        </span>
                    </div>
                </div>

                <div class="col-span-3 sm:col-span-2 text-sm sm:text-base text-right font-bold">
                    8,93€
                </div>
            </div>

            <div class="grid grid-cols-12 gap-4 py-4 border-b border-gray-300">
                <div class="col-span-3 sm:col-span-2">
                    <img class="w-20 h-auto shadow border border-gray-200 rounded" src="/storage/sites/default/files/Ako odvravat novembru 1989_0.png" alt="book.title">
                </div>

                <div class="col-span-6 sm:col-span-8 flex flex-col justify-between items-stretch">
                    <div>
                        <h4 class="text-base sm:text-lg uppercase">Ako odvravat Novembru a mozno este dlhsi nazov, nez by sme cakali</h4>
                        <h6 class="text-sm italic">Jana Juranova</h6>
                    </div>
                    <div class="flex justify-start items-center">
                        <div class="w-16 h-full flex justify-start items-center">
                            <FormInput type="number"/>
                        </div>

                        <span class="ml-3">
                            <TrashIcon class="h-4 w-4 text-red-500 hover:text-red-600 cursor-pointer" />
                        </span>
                    </div>
                </div>

                <div class="col-span-3 sm:col-span-2 text-sm sm:text-base text-right font-bold">
                    8,93€
                </div>
            </div>
        </section>

        <section class="max-w-xl mx-auto text-sm">
            <FormInput title="Meno" />
            <FormInput title="Priezvisko" />
            <FormInput title="Spolocnost" />
            <FormInput title="Ulica" />

        </section>
    </main-layout>
</template>

<style scoped>

</style>

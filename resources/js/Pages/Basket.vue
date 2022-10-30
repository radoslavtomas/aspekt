<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import MainLayout from '../Layouts/MainLayout.vue'
import BasketProductCount from '../Components/Form/BasketProductCount.vue'

import FormInput from '../Components/Form/FormInput.vue';
import { TrashIcon, PlusIcon } from '@heroicons/vue/24/outline';

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
                <div class="col-span-4 sm:col-span-2">
                    <img class="w-32 sm:w-20 h-auto shadow border border-gray-200 rounded" src="/storage/sites/default/files/Nanichodnica_1.png" alt="book.title">
                </div>

                <div class="col-span-8 flex flex-col justify-between items-stretch">
                    <div class="mb-2">
                        <h4 class="text-sm sm:text-base uppercase font-bold">Nanichodnica</h4>
                        <h6 class="text-sm italic mb-1">Jana Juranova</h6>
                        <h3 class="sm:hidden font-bold">8,93€</h3>
                    </div>
                    <BasketProductCount />
                </div>

                <div class="hidden sm:block col-span-2 text-right font-bold">
                    8,93€
                </div>
            </div>

            <div class="grid grid-cols-12 gap-4 py-4 border-b border-gray-300">
                <div class="col-span-4 sm:col-span-2">
                    <img class="w-32 sm:w-20 h-auto shadow border border-gray-200 rounded" src="/storage/sites/default/files/JEDNOROZCE VACSIE.jpg" alt="book.title">
                </div>

                <div class="col-span-8 flex flex-col justify-between items-stretch">
                    <div class="mb-2">
                        <h4 class="text-sm sm:text-base uppercase font-bold">Jednorozce</h4>
                        <h6 class="text-sm italic mb-1">Jana Juranova</h6>
                        <h3 class="sm:hidden font-bold">8,93€</h3>
                    </div>
                    <BasketProductCount />
                </div>

                <div class="hidden sm:block col-span-2 text-right font-bold">
                    8,93€
                </div>
            </div>

            <div class="grid grid-cols-12 gap-4 py-4 border-b border-gray-300">
                <div class="col-span-4 sm:col-span-2">
                    <img class="w-32 sm:w-20 h-auto shadow border border-gray-200 rounded" src="/storage/sites/default/files/Ako odvravat novembru 1989_0.png" alt="book.title">
                </div>

                <div class="col-span-8 flex flex-col justify-between items-stretch">
                    <div class="mb-2">
                        <h4 class="text-sm sm:text-base uppercase font-bold">Ako odvravat Novembru a mozno este dlhsi nazov, nez by sme cakali</h4>
                        <h6 class="text-sm italic mb-1">Jana Juranova</h6>
                        <h3 class="sm:hidden font-bold">8,93€</h3>
                    </div>
                    <BasketProductCount />
                </div>

                <div class="hidden sm:block col-span-2 text-right font-bold">
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

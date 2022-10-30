<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import MainLayout from '../Layouts/MainLayout.vue'
import BasketProductCount from '../Components/Form/BasketProductCount.vue'

import { ArrowRightCircleIcon } from '@heroicons/vue/24/outline';

defineProps({
    category: String,
    slug: String|null,
})


</script>

<template>
    <Head title="Basket" />
    <main-layout>
        <div class="my-4 max-w-xl mx-auto">
            <section>
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

            <section class="mt-4">
                <p class="font-bold text-right">
                    <span class="">Medzisúčet:</span>
                    17,11€
                </p>
            </section>

            <section class="my-6">
                <Link class="block rounded text-white text-center px-4 py-3 shadow-md bg-pink-500 hover:bg-pink-600" :href="route('shipping')"
                   target="_blank">
                    <span class="text-white">
                        Dodacie udaje <ArrowRightCircleIcon class="w-5 h-5 inline" />
                    </span>

                </Link>
            </section>

            <section class="">
                <p class="text-xs">Objednané publikácie vám zašleme na dobierku. K cene objednaných kníh je potrebné pripočítať cenu poštovného, ktorá sa pohybuje v rozmedzí 1,65 € – 3,31 € v závislosti od hmotnosti posielaného balíka. (Za samotné knihy však platíte len 75 percent ich predajnej ceny.)</p>
            </section>
        </div>
    </main-layout>
</template>

<style scoped>

</style>

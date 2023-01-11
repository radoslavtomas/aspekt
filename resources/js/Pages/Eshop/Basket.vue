<script setup>
import {Head, Link, usePage} from '@inertiajs/inertia-vue3';
import MainLayout from '../../Layouts/MainLayout.vue'
import BasketProductCount from '../../Components/Form/BasketProductCount.vue'

import { ArrowRightCircleIcon, ShoppingBagIcon } from '@heroicons/vue/24/outline';
import {computed} from "vue";
import {useStore} from "vuex";

const store = useStore()
const lang = computed(() => store.getters.lang);
const locale = computed(() => usePage().props.value.locale);

const subtotal = computed(() => store.getters.subtotal);
const basket = computed(() => store.getters.basket);

defineProps({
    category: String,
    slug: String|null,
})

</script>

<template>
    <Head title="Basket" />
    <main-layout>
        <div class="my-4 max-w-xl mx-auto">
            <h1 class="text-2xl text-center text-pink-600 font-bold mb-4">{{lang[locale].eshopBasketTitle}}</h1>

            <section v-if="!basket.length" class="">
                <p class="mb-2 font-bold">{{lang[locale].eshopBasketEmpty}}</p>

                <p class="mb-4 text-sm">{{lang[locale].booksTeaser}}</p>

                <Link :href="route('books', ['vsetko'])" class="block rounded text-gray-500 text-center text-white px-4 py-3 my-4 shadow-md bg-pink-500 hover:bg-pink-600">
                    <ShoppingBagIcon class="mb-1 w-5 h-5 inline" /> {{lang[locale].eshopBasketEmptyButton}}
                </Link>
            </section>

            <section v-if="basket.length">
                <div v-for="book in basket" :key="book.id" class="grid grid-cols-12 gap-4 py-4 border-b border-gray-300">
                    <div class="col-span-4 sm:col-span-2">
                        <img class="w-32 sm:w-20 h-auto shadow border border-gray-200 rounded" :src="`/storage/${book.cover}`" :alt="book.title">
                    </div>

                    <div class="col-span-8 flex flex-col justify-between items-stretch">
                        <div class="mb-2">
                            <h4 class="text-sm sm:text-base uppercase font-bold">{{book.title}}</h4>
                            <h6 class="text-sm italic mb-1">{{book.authors}}</h6>
                            <h3 class="sm:hidden font-bold">{{book.aspekt_price}}</h3>
                        </div>
                        <BasketProductCount :book_id="book.book_id" :qty="book.qty" />
                    </div>

                    <div class="hidden sm:block col-span-2 text-right font-bold">
                        {{book.aspekt_price}}
                    </div>
                </div>
            </section>

            <section v-if="basket.length" class="mt-4">
                <p class="font-bold text-right">
                    <span class="">{{lang[locale].eshopSubtotal}}:</span>
                    {{subtotal}}
                </p>
            </section>

            <section v-if="basket.length" class="my-6 flex flex-col sm:flex-row flex-col-reverse justify-between items-center text-sm sm:text-base">
                <Link :href="route('books', ['vsetko'])" class="rounded text-gray-500 text-center px-4 py-3 bg-gray-200 hover:bg-gray-300">
                    <ShoppingBagIcon class="mb-1 w-5 h-5 inline" /> {{lang[locale].eshopBackButtonBasket}}
                </Link>
                <Link class="rounded text-white text-center px-4 py-3 mb-3 sm:mb-0 w-full sm:w-auto shadow-md bg-pink-500 hover:bg-pink-600" :href="route('shipping')"
                   target="_blank">
                    <span class="text-white">
                        {{lang[locale].eshopForwardButtonBasket}} <ArrowRightCircleIcon class="w-5 h-5 inline" />
                    </span>

                </Link>
            </section>

            <section class="">
                <p class="text-xs">{{lang[locale].eshopPostageNote}}</p>
            </section>
        </div>
    </main-layout>
</template>

<style scoped>

</style>

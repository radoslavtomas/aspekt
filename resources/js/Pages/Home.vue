<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import BlogListItem from '../Components/BlogListItem.vue';
import BookListItem from '../Components/BookListItem.vue';
import {BookOpenIcon, BuildingLibraryIcon, NewspaperIcon} from '@heroicons/vue/24/outline';

import MainLayout from '../Layouts/MainLayout.vue';
import MasonryWall from '@yeger/vue-masonry-wall';

defineProps({
    blogs: Array,
    books: Array,
})

</script>

<template>
    <MainLayout>
        <Head title="Home" />

            <div class="">
                <div class="shippo flex justify-center items-center flex-col px-2 py-6 sm:py-8 mt-4 sm:mt-8 mb-6 border border-gray-100">
                    <img class="w-36 h-auto" src="/assets/img/logo_clean.png" alt="Aspekt Logo">
                    <div class="relative flex justify-center items-center mt-4 px-2 py-0.5 rounded-lg">
                        <div class="bg-gray-100 opacity-70 z-0 absolute top-0 right-0 w-full h-full"></div>
                        <p class="text-sm sm:text-sm text-center text-gray-700 z-10">Prvá feministická organizácia na Slovensku </p>
                    </div>
                </div>

                <div class="relative flex w-full justify-center items-center mb-3">
                    <h6 class="text-pink-600 px-1 bg-white z-10">&lt; Novinky v kniznej edicii &gt;</h6>
                    <div class="absolute top-3 right-0 w-full h-0.5 bg-pink-500 flex-1 z-0"></div>
                </div>
                <div class="bg-books sm:border sm:border-gray-200 sm:p-4 sm:shadow-md sm:rounded mb-8">
                    <MasonryWall :items="books" :column-width="250" :gap="16">
                        <template #default="{item}">
                            <BookListItem :item="item" />
                        </template>
                    </MasonryWall>
                </div>

                <div class="relative flex w-full justify-center items-center mb-3">
                    <h6 class="text-pink-600 px-1 bg-white z-10">&lt; Dolezite v ASPEKTin &gt;</h6>
                    <div class="absolute top-3 right-0 w-full h-0.5 bg-pink-500 flex-1 z-0"></div>
                </div>

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

                <section class="bg-gray-700 my-8 p-4 rounded shadow-lg">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 text-white">
                        <div class="p-6">
                            <a href="https://laracasts.com" class="flex  items-center ml-2 text-lg leading-7 hover:text-red-600">
                                <BookOpenIcon class="h-5 w-5 mr-2" />
                                Knizna edicia
                            </a>

                            <div class="">
                                <div class="mt-2 text-sm">
                                    Takmer dve desiatky aspektovských kníh si môžete objedať aj v elektronickej podobe. Vo forme e-kníh nájdete rozhovor Jany Juráňovej s Agnešou Kalinovou, preklad knihy bell hooks, analýzu účasti žien v Nežnej revolúcii, feministický pohľad na literatúru, ale aj beletristické knihy Jany Juráňovej, Ireny Brežnej, Slavenky Drakulić, Jany Bodnárovej, Barbory Hrínovej, Etely Farkašovej, Jaroslavy Blažkovej či Diany Athill.
                                </div>
                            </div>
                        </div>

                        <div class="p-6">
                            <a href="https://laracasts.com" class="flex  items-center ml-2 text-lg leading-7 hover:text-red-600">
                                <BuildingLibraryIcon class="h-5 w-5 mr-2" />
                                Knižnica ASPEKTU
                            </a>

                            <div class="">
                                <div class="mt-2 text-sm">
                                    Knižnica ASPEKTU  sa špecializuje sa na literatúru s feministickou a rodovou problematikou, ponúka široký výber odbornej literatúry a beletrie v rôznych jazykoch (okrem slovenčiny a češtiny najmä v angličtine, nemčine a poľštine). Uchováva plagáty, brožúry, periodiká, audiovizuálne dokumenty a rôzne iné materiály.
                                </div>
                            </div>
                        </div>

                        <div class="p-6">
                            <a href="https://laracasts.com" class="flex  items-center ml-2 text-lg leading-7 hover:text-red-600">
                                <NewspaperIcon class="h-5 w-5 mr-2" />
                                ASPEKTin
                            </a>

                            <div class="">
                                <div class="mt-2 text-sm">
                                    V roku 1993 vyšlo prvé číslo feministického kultúrneho časopisu Aspekt, ktorý bol ako slovensko-české médium prvým feministickým časopisom v bývalom Československu a dnes pokračuje ako webzin ASPEKTin. Naša organizácia sa ako nositeľka množstva vzdelávacích a publikačných projektov od svojich začiatkov zameriava na rodovú senzibilizáciu spoločnosti.
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
    </MainLayout>
</template>

<style scoped>
.shippo {
    text-shadow: 2px 1px white;
    background: url('/assets/img/geo.webp') center 61% no-repeat;
    background-size: cover;

}
</style>

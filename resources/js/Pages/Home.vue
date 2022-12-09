<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import BlogListItem from '../Components/BlogListItem.vue';
import BookListItem from '../Components/BookListItem.vue';
import BookSingleSectionHeading from '../Components/BookSingleSectionHeading.vue';

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

<!--                <div class="flex justify-center items-center flex-col px-2 py-6 sm:py-8 mt-4 sm:mt-8 mb-6 bg-gradient-to-r from-gray-100 to-gray-200 border border-gray-100">-->
<!--                    <img class="w-36 h-auto" src="/assets/img/logo_clean.png" alt="Aspekt Logo">-->
<!--                    <p class="mt-4 text-xs sm:text-sm text-center">Prvá feministická organizácia na Slovensku </p>-->
<!--                </div>-->

                <div class="shippo flex justify-center items-center flex-col px-2 py-6 sm:py-8 mt-4 sm:mt-8 mb-6 border border-gray-100">
                    <img class="w-36 h-auto" src="/assets/img/logo_clean.png" alt="Aspekt Logo">
                    <div class="relative flex justify-center items-center mt-4 px-2 py-0.5 rounded-lg">
                        <div class="bg-gray-100 opacity-70 z-0 absolute top-0 right-0 w-full h-full"></div>
                        <p class="text-sm sm:text-sm text-center text-gray-700 z-10">Prvá feministická organizácia na Slovensku </p>
                    </div>
                </div>

<!--                <h1 class="text-red-600 font-bold text-center sm:text-left mb-2">&lt; Novinky v kniznej edicii &gt;</h1>-->
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
<!--                <div class="flex justify-between items-start flex-wrap gap-4 mb-8">-->
<!--                    <div class="flex-1 min-w-[16rem]" v-for="book in books" :key="book.id">-->
<!--                        <BookListItem :item="book" />-->
<!--                    </div>-->
<!--                </div>-->

<!--                <h1 class="text-red-600 font-bold text-center sm:text-left mb-2">&lt; Dolezite v ASPEKTin &gt;</h1>-->

                <div class="relative flex w-full justify-center items-center mb-3">
                    <h6 class="text-pink-600 px-1 bg-white z-10">&lt; Dolezite v ASPEKTin &gt;</h6>
                    <div class="absolute top-3 right-0 w-full h-0.5 bg-pink-500 flex-1 z-0"></div>
                </div>
                <div class="bg-books sm:border sm:border-gray-200 sm:p-4 sm:shadow-md sm:rounded mb-8">
                    <MasonryWall :items="blogs" :column-width="250" :gap="16">
                        <template #default="{item}">
                            <BlogListItem :item="item" />
                        </template>
                    </MasonryWall>
                </div>
<!--                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 my-8">-->
<!--                    <div v-for="blog in blogs" :key="blog.id">-->
<!--                        <BlogListItem :item="blog" />-->
<!--                    </div>-->
<!--                </div>-->

                <div class="mt-8 bg-white overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel.com/docs" class="underline text-gray-900 dark:text-white">O Aspekte</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Prvá feministická organizácia na Slovensku ASPEKT sa oficiálne zaregistrovala v roku 1993 ako Záujmové združenie žien Aspekt. V tomto roku vyšlo aj prvé číslo feministického kultúrneho časopisu Aspekt, ktorý bol ako slovensko-české médium prvým feministickým časopisom v bývalom Československu a dnes pokračuje ako webzin ASPEKTin.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laracasts.com" class="underline text-gray-900 dark:text-white">Knizna edicia</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Takmer dve desiatky aspektovských kníh si môžete objedať aj v elektronickej podobe. Vo forme e-kníh nájdete rozhovor Jany Juráňovej s Agnešou Kalinovou, preklad knihy bell hooks, analýzu účasti žien v Nežnej revolúcii, feministický pohľad na literatúru, ale aj beletristické knihy Jany Juráňovej, Ireny Brežnej, Slavenky Drakulić, Jany Bodnárovej, Barbory Hrínovej, Etely Farkašovej, Jaroslavy Blažkovej či Diany Athill.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel-news.com/" class="underline text-gray-900 dark:text-white">Kniznica</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Knižnica ASPEKTU  sa špecializuje sa na literatúru s feministickou a rodovou problematikou, ponúka široký výber odbornej literatúry a beletrie v rôznych jazykoch (okrem slovenčiny a češtiny najmä v angličtine, nemčine a poľštine). Uchováva plagáty, brožúry, periodiká, audiovizuálne dokumenty a rôzne iné materiály.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">AspektIn</div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    V roku 1993 vyšlo prvé číslo feministického kultúrneho časopisu Aspekt, ktorý bol ako slovensko-české médium prvým feministickým časopisom v bývalom Československu a dnes pokračuje ako webzin ASPEKTin. Naša organizácia sa ako nositeľka množstva vzdelávacích a publikačných projektov od svojich začiatkov zameriava na rodovú senzibilizáciu spoločnosti.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                        <div class="flex items-center">
                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="-mt-px w-5 h-5 text-gray-400">
                                <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>

                            <a href="https://laravel.bigcartel.com" class="ml-1 underline">
                                Shop
                            </a>

                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="ml-4 -mt-px w-5 h-5 text-gray-400">
                                <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>

                            <a href="https://github.com/sponsors/taylorotwell" class="ml-1 underline">
                                Sponsor
                            </a>
                        </div>
                    </div>

                </div>
            </div>
    </MainLayout>
</template>

<style scoped>
.shippo {
    /*background:*/
    /*    linear-gradient(135deg, #efe2ff 21px, #f5faff 22px, #f5faff 24px, transparent 24px, transparent 67px, #f5faff 67px, #f5faff 69px, transparent 69px),*/
    /*    linear-gradient(225deg, #efe2ff 21px, #f5faff 22px, #f5faff 24px, transparent 24px, transparent 67px, #f5faff 67px, #f5faff 69px, transparent 69px)0 64px;*/
    /*background-color:#efe2ff;*/
    /*background-size: 64px 128px;*/
    text-shadow: 2px 1px white;
    background: url('/assets/img/geo.webp') center 61% no-repeat;
    background-size: cover;

}
</style>

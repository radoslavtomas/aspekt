<template>
    <div class="max-w-3xl mx-auto">
        <Breadcrumbs id="books" :article="book.title"/>

        <article class="mt-10">
            <header class="relative flex flex-col md:flex-row justify-between items-center md:items-start mb-6 md:mb-12">
                <div class="text-center md:text-left w-full h-full flex-1 flex flex-col justify-items-stretch">
                    <div class="">
                        <h1 class="text-2xl md:text-3xl text-red-600 font-bold">{{book.title}}</h1>
                        <h4 class="text-xl text-red-600 my-1">{{book.subtitle}}</h4>
                        <h3 class="md:my-4 text-xl">{{book.authors}}</h3>
                        <p v-if="book.editors" class="text-sm">{{lang[locale].editors}}: {{book.editors}}</p>
                        <p v-if="book.translation" class="text-gray-500 text-xs">{{lang[locale].translation}}: {{book.translation}}</p>
                    </div>

                    <img v-if="book.cover" class="md:hidden w-64 h-auto mt-4 md:mt-0 md:ml-4 shadow-2xl border border-gray-200 mx-auto md:mx-0 rounded-2xl" :src="`/storage/${book.cover}`" alt="book.title">

                    <div class="text-xs mt-6 md:mt-12 text-gray-500 flex flex-col items-center md:items-start" v-if="book.is_product">
                        <p>{{lang[locale].pages}}: {{book.pages}}</p>
                        <p class="mb-3">ISBN: {{book.isbn}}</p>

                        <p class="text-lg text-red-600 font-bold">{{lang[locale].aspekt_price}}: {{book.aspekt_price}}</p>
                        <p>({{lang[locale].common_price}} {{book.common_price}})</p>
                        <BookSingleCtaButton />
                    </div>

                </div>
                <img v-if="book.cover" class="hidden md:block w-64 h-auto mt-4 md:mt-0 md:ml-4 shadow-2xl border border-gray-200 mx-auto md:mx-0 rounded-2xl" :src="`/storage/${book.cover}`" alt="book.title">
            </header>

            <main class="max-w-2xl mx-auto px-1">
                <section class="mb-6">
                    <div class="content" v-html="book.body"></div>
                </section>

                <section v-if="book.sample" class="mb-6">
                    <book-single-section-heading :heading="lang[locale].sample" />
                    <div v-html="book.sample"></div>
                </section>

                <section v-if="book.links" class="mb-6">
                    <book-single-section-heading :heading="lang[locale].links" />
                    <div v-html="book.links"></div>
                </section>


                <section v-if="book.files.length" class="mb-6">
                    <book-single-section-heading :heading="lang[locale].files" />
                    <file-list :files="book.files" />
                </section>

                <section v-if="book.downloads.length" class="mb-6">
                    <book-single-section-heading :heading="lang[locale].downloads" />
                    <file-list :files="book.downloads" />
                </section>

                <section v-if="book.is_product" class="mb-6 flex flex-col items-center justify-center">
                    <p class="text-lg md:text-xl text-red-600 font-bold">{{lang[locale].aspekt_price}}: {{book.aspekt_price}}</p>
                    <p class="text-gray-500 text-xs">({{lang[locale].common_price}} {{book.common_price}})</p>
                    <BookSingleCtaButton />
                </section>
            </main>
        </article>
    </div>
</template>

<script setup>
import {computed, onMounted} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";

import BookSingleCtaButton from './BookSingleCtaButton.vue';
import Breadcrumbs from '../Components/Breadcrumbs.vue';
import BookSingleSectionHeading from './BookSingleSectionHeading.vue'
import FileList from './FileList.vue'



const locale = computed(() => usePage().props.value.locale);

const book = computed(() => usePage().props.value.book.data);
const lang = {
    sk: {
        'pages': 'Počet strán',
        'aspekt_price': 'ASPEKT cena',
        'common_price': 'Bežná cena',
        'editors': 'Editorstvo',
        'translation': 'Preklad',
        'sample': 'Ukážka z knihy',
        'links': 'Súvisiace odkazy',
        'files': 'Súbory na stiahnutie',
        'downloads': 'Knihy na stiahnutie',
    },
    en: {
        'pages': 'Number of pages',
        'aspekt_price': 'ASPEKT price',
        'common_price': 'Common cena',
        'editors': 'Editors',
        'translation': 'Translation',
        'sample': 'Sample',
        'links': 'Related links',
        'files': 'Files to download',
        'downloads': 'Books to download',
    }
}

onMounted(() => console.log(book.value))

</script>

<style scoped>

</style>

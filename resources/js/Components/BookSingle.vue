<template>
    <div class="max-w-3xl mx-auto">
        <Head :title="title"/>

        <Breadcrumbs id="books" :article="book.title"/>

        <article>
            <header
                class="relative flex flex-col md:flex-row justify-between items-center md:items-start mb-6 md:mb-12">
                <div class="text-center md:text-left w-full h-full flex-1 flex flex-col justify-items-stretch">
                    <div class="mb-2">
                        <h1 class="text-2xl md:text-3xl text-red-600 font-bold">{{ book.title }}</h1>
                        <h4 class="text-xl text-red-600 my-1">{{ book.subtitle }}</h4>
                        <h3 class="md:mb-4 text-xl">{{ book.authors }}</h3>
                        <p v-if="book.editors" class="text-sm">{{ lang[locale].booksEditors }}: {{ book.editors }}</p>
                        <p v-if="book.translation" class="text-sm">{{ lang[locale].booksTranslation }}:
                            {{ book.translation }}</p>
                        <p v-if="book.pages" class="text-sm">{{ lang[locale].booksPages }}: {{ book.pages }}</p>
                        <p v-if="book.isbn" class="text-sm">ISBN: {{ book.isbn }}</p>
                    </div>

                    <img v-if="book.cover"
                         :alt="book.title"
                         :src="`/storage/${book.cover}`"
                         class="md:hidden w-64 h-auto mt-4 md:mt-0 md:ml-4 shadow-2xl border border-gray-200 mx-auto md:mx-0 rounded-2xl">

                    <div v-if="book.is_product"
                         class="text-sm flex flex-col items-center md:items-start mt-4 md:mt-0">
                        <p class="text-lg text-red-600 font-bold mt-3">{{ lang[locale].booksAspektPrice }}:
                            {{ book.aspekt_price }}</p>
                        <p>({{ lang[locale].booksCommonPrice }} {{ book.common_price }})</p>
                        <div class="mt-4 md:mt-4">
                            <BookSingleCtaButton :book="book"/>
                        </div>
                    </div>

                    <div v-if="book.is_ebook"
                         class="text-sm flex flex-col items-center md:items-start mt-4 md:mt-0">
                        <BookSingleEshopLink v-for="link in book.eshop_links" :link="link"/>
                    </div>
                </div>

                <img v-if="book.cover"
                     :src="`/storage/${book.cover}`"
                     alt="book.title"
                     class="hidden md:block w-64 h-auto mt-4 md:mt-0 md:ml-4 shadow-2xl border border-gray-200 mx-auto md:mx-0 rounded-2xl">
            </header>

            <main class="max-w-2xl mx-auto px-1">
                <section class="mb-6">
                    <div class="content" v-html="book.body"></div>
                </section>

                <section v-if="book.sample" class="mb-6">
                    <Separator :title="lang[locale].booksSample" margin/>
                    <div v-html="book.sample"></div>
                </section>

                <section v-if="book.links" class="mb-6">
                    <Separator :title="lang[locale].articleLinks" margin/>
                    <div v-html="book.links"></div>
                </section>


                <section v-if="book.files.length" class="mb-6">
                    <Separator :title="lang[locale].articleFiles" margin/>
                    <file-list :files="book.files"/>
                </section>

                <section v-if="book.downloads.length" class="mb-6">
                    <Separator :title="lang[locale].articleDownloads" margin/>
                    <file-list :files="book.downloads"/>
                </section>

                <section
                    v-if="book.is_product"
                    class="mt-12 mb-6 flex flex-col items-center justify-center py-4 border border-gray-400 rounded"
                >
                    <p class="text-lg md:text-xl text-red-600 font-bold">{{ lang[locale].booksAspektPrice }}:
                        {{ book.aspekt_price }}</p>
                    <p class="text-sm">({{ lang[locale].booksCommonPrice }} {{ book.common_price }})</p>
                    <div class="mt-4">
                        <BookSingleCtaButton :book="book"/>
                    </div>
                </section>
            </main>
        </article>
    </div>
</template>

<script setup>
import { computed, onMounted } from 'vue'
import { useStore } from 'vuex'
import { Head, usePage } from '@inertiajs/inertia-vue3'

// components
import FileList from './FileList.vue'
import BookSingleCtaButton from './BookSingleCtaButton.vue'
import BookSingleEshopLink from '@/Components/BookSingleEshopLink.vue'
import Breadcrumbs from '../Components/Breadcrumbs.vue'
import Separator from '@/Components/Separator.vue'

// computed
const book = computed(() => usePage().props.value.book.data)
const locale = computed(() => usePage().props.value.locale)
const navigation = computed(() => usePage().props.value.navigation)
const store = useStore()
const lang = computed(() => store.getters.lang)

const navigationString = computed(() => navigation.value.find(el => el.route === 'books')[`name_${locale.value}`])
const title = computed(() => `${navigationString.value} | ${book.value.title}`)

onMounted(() => {
    console.log(book)
})
</script>

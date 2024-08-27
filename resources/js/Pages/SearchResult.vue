<script setup>
import MainLayout from '../Layouts/MainLayout.vue'
import Head from '@inertiajs/inertia-vue3/src/head'
import { computed, onMounted } from 'vue'
import { usePage } from '@inertiajs/inertia-vue3'
import Breadcrumbs from '@/Components/Breadcrumbs.vue'
import { useStore } from 'vuex'
import Pagination from '@/Components/Pagination.vue'
import SearchResultItem from '@/Components/SearchResultItem.vue'

window.scrollTo({ top: 0, behavior: 'smooth' })

const store = useStore()

const lang = computed(() => store.getters.lang)
const locale = computed(() => usePage().props.value.locale)

const parameter = computed(() => usePage().props.value.parameter)
const items = computed(() => usePage().props.value.items)
const books = computed(() => usePage().props.value.books)
const people = computed(() => usePage().props.value.people)

const language = {
    en: {
        search: 'Search results for',
        noresults: 'Unfortunately, we didn\'t find anything...',
        options: {
            authors: 'Authors',
            blogs: 'AspektIn',
            books: 'Books',
            events: 'Events',
            pages: 'Pages',
            njuvinky: 'Njuvinky',
        },
    },
    sk: {
        query: 'Výsledky vyhľadávania pre',
        noresults: 'Ľutujeme, ale nič sme nenašli...',
        options: {
            authors: 'Autorky / Autori',
            blogs: 'AspektIn',
            books: 'Knihy',
            events: 'Podujatia',
            pages: 'Stránky',
            njuvinky: 'Ňjúvinky',
        },
    }
}

onMounted(() => {
    // console.log(language[lang.value])
})
</script>

<template>
    <main-layout>
        <Head title="search"/>

        <Breadcrumbs id="aspektin"/>

        <section v-if="items" class="max-w-[48rem] mx-auto mt-10">
            <div class="">
                <search-result-item
                    v-for="item in items.data"
                    :key="item.id"
                    :item="item"/>
            </div>

            <pagination :links="items.meta.links" class="mt-4"/>
        </section>

        <section v-else class="max-w-[48rem] mx-auto mt-10">
            <p>{{ language[locale]['noresults'] }}</p>
        </section>

    </main-layout>
</template>

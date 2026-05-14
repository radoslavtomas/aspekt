<script setup>
import MainLayout from '../Layouts/MainLayout.vue'
import { Head } from '@inertiajs/vue3'
import { computed, onMounted } from 'vue'
import { usePage } from '@inertiajs/vue3'
import Breadcrumbs from '@/Components/Breadcrumbs.vue'
import { useStore } from 'vuex'
import Pagination from '@/Components/Pagination.vue'
import SearchResultItem from '@/Components/SearchResultItem.vue'

window.scrollTo({ top: 0, behavior: 'smooth' })

const store = useStore()

const lang = computed(() => store.getters.lang)
const locale = computed(() => usePage().props.locale)

const parameter = computed(() => usePage().props.parameter)
const items = computed(() => usePage().props.items)
const books = computed(() => usePage().props.books)
const people = computed(() => usePage().props.people)

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

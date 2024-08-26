<script setup>
import MainLayout from '../Layouts/MainLayout.vue'
import Head from '@inertiajs/inertia-vue3/src/head'
import MasonryWall from '@yeger/vue-masonry-wall'
import { computed, onMounted } from 'vue'
import { usePage } from '@inertiajs/inertia-vue3'
import BlogListItem from '@/Components/BlogListItem.vue'
import BookListItem from '@/Components/BookListItem.vue'
import Separator from '@/Components/Separator.vue'
import Breadcrumbs from '@/Components/Breadcrumbs.vue'
import PeopleListItem from '@/Components/PeopleListItem.vue'
import { useStore } from 'vuex'
// import Pagination from '@/Components/Pagination.vue'

window.scrollTo({ top: 0, behavior: 'smooth' })

const store = useStore()

const lang = computed(() => store.getters.lang)
const locale = computed(() => usePage().props.value.locale)

const books = computed(() => usePage().props.value.books)
const blogs = computed(() => usePage().props.value.blogs)
const people = computed(() => usePage().props.value.people)

onMounted(() => {
    console.log(people.value)
})
</script>

<template>
    <main-layout>
        <Head title="search"/>

        <Breadcrumbs id="aspektin"/>

        <section v-if="books">

            <Separator :title="lang[locale].searchPageBooksTitle" margin/>

            <div class="bg-books sm:border sm:border-gray-200 sm:p-4 sm:shadow-md sm:rounded">


                <MasonryWall :column-width="230" :gap="16" :items="books.data">
                    <template #default="{item}">
                        <BookListItem :item="item"/>
                    </template>
                </MasonryWall>

                <!--            <pagination :links="books.meta.links" class="mt-4"></pagination>-->
            </div>
        </section>

        <section v-if="blogs" class="mt-10">

            <Separator :title="lang[locale].searchPageBlogsTitle" margin/>

            <div class="bg-books sm:border sm:border-gray-200 sm:p-4 sm:shadow-md sm:rounded">

                <MasonryWall :column-width="230" :gap="16" :items="blogs.data">
                    <template #default="{item}">
                        <BlogListItem :item="item"/>
                    </template>
                </MasonryWall>

                <!--            <pagination :links="blogs.meta.links" class="mt-4"></pagination>-->
            </div>
        </section>

        <section v-if="people" class="mt-10">

            <Separator :title="lang[locale].searchPageAuthorsTitle" margin/>

            <div class="bg-books sm:border sm:border-gray-200 sm:p-4 sm:shadow-md sm:rounded">

                <MasonryWall :column-width="330" :gap="16" :items="people.data">
                    <template #default="{item}">
                        <PeopleListItem :item="item"/>
                    </template>
                </MasonryWall>
            </div>
        </section>
    </main-layout>
</template>

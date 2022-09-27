<script setup>
import {Head, Link, usePage} from '@inertiajs/inertia-vue3';
import MainLayout from '../Layouts/MainLayout.vue'
import Pagination from '../Components/Pagination.vue'
import {computed, onMounted} from "vue";
import MasonryWall from '@yeger/vue-masonry-wall'
import Breadcrumbs from '../Components/Breadcrumbs.vue'

// defineProps({
//     //
// })

const books = computed(() => usePage().props.value.books);
const items = computed(() => books.value.data);
const category = computed(() => usePage().props.value.category);
const slug = computed(() => usePage().props.value.slug);

onMounted(() => console.log(books.value))


</script>

<template>
    <Head title="Knizna edicia" />
    <main-layout>
        <section class="container mx-auto">

            <Breadcrumbs id="books" article="Jednorozceee"/>

            <MasonryWall :items="items" :column-width="220" :gap="16">
                <template #default="{item}">
                    <article class="border border-gray-300 shadow-md p-4">
                        <header>
                            <Link :href="route('books', [category, item.slug])">
                                <img class="w-52 h-auto mx-auto border border-gray-200 shadow-md mb-2" :src="`/storage/${item.cover}`" alt="book.title">
                            </Link>
                        </header>
                        <main>
                            <Link :href="route('books', [category, item.slug])">
                                <h2 class="text-xl text-red-600">{{item.title}}</h2>
                            </Link>
                            <h3 class="text-sm italic mb-4">{{item.authors}}</h3>
                            <p class="text-xs" v-html="item.teaser"></p>
                        </main>
                        <footer v-if="item.is_product" class="py-2">
                            <p>{{item.aspekt_price}} EUR</p>
                        </footer>
                    </article>
                </template>
            </MasonryWall>

            <pagination class="mt-4" :links="books.meta.links"></pagination>
        </section>
    </main-layout>
</template>

<style scoped>

</style>

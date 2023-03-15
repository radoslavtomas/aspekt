<template>
    <section>
        <Head :title="title" />

        <h1 v-if="category.url !== 'vsetko'" class="text-3xl md:text-2xl text-red-600 font-bold my-4 text-center">
            <span class="px-4">{{categoryString}}</span>
        </h1>

        <Breadcrumbs id="books"/>

        <div class="bg-books sm:border sm:border-gray-200 sm:p-4 sm:shadow-md sm:rounded">
            <MasonryWall :items="items.data" :column-width="230" :gap="16">
                <template #default="{item}">
                    <BookListItem :item="item" />
                </template>
            </MasonryWall>
        </div>


        <pagination class="mt-4" :links="items.meta.links"></pagination>
    </section>
</template>

<script setup>
import {Head, usePage} from '@inertiajs/inertia-vue3';
import {computed, onMounted} from "vue";

// 3rd party
import MasonryWall from '@yeger/vue-masonry-wall';

// components
import BookListItem from './BookListItem.vue';
import Breadcrumbs from '../Components/Breadcrumbs.vue';
import Pagination from '../Components/Pagination.vue'


// computed
const category = computed(() => usePage().props.value.category);
const categoryString = computed(() => category.value[`name_${locale.value}`]);
const items = computed(() => usePage().props.value.books);
const locale = computed(() => usePage().props.value.locale);
const navigation = computed(() => usePage().props.value.navigation);

const title = computed(() => {
    const navigationString = computed(() => navigation.value.find(el => el.route === 'books')[`name_${locale.value}`]);

    return `${navigationString.value} | ${categoryString.value}`
})
</script>


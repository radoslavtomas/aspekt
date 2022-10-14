<template>
    <section class="container-aspekt">
        <Breadcrumbs id="books"/>

        <div class="bg-books border border-gray-200 p-4 shadow-md bg-gradient-to-b from-white to-gray-100 rounded">
            <MasonryWall :items="items.data" :column-width="230" :gap="12">
                <template #default="{item}">
                    <BookListItem :item="item" />
                </template>
            </MasonryWall>
        </div>


        <pagination class="mt-4" :links="items.meta.links"></pagination>
    </section>
</template>

<script setup>
import {usePage} from '@inertiajs/inertia-vue3';
import MasonryWall from '@yeger/vue-masonry-wall'

import BookListItem from './BookListItem.vue';
import Breadcrumbs from '../Components/Breadcrumbs.vue';
import Pagination from '../Components/Pagination.vue'

import {computed, onMounted} from "vue";

const items = computed(() => usePage().props.value.books);
onMounted(() => console.log(items.value))
</script>

<style scoped>

</style>

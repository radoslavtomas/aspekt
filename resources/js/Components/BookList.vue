<template>
    <section>
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

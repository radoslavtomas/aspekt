<template>
    <Breadcrumbs id="books"/>

    <MasonryWall :items="items.data" :column-width="220" :gap="16">
        <template #default="{item}">
            <BookListItem :item="item" />
        </template>
    </MasonryWall>

    <pagination class="mt-4" :links="items.meta.links"></pagination>
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

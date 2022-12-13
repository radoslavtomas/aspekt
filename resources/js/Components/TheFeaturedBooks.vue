<template>
    <section class="my-4">
        <Separator title="Novinky v kniznej edicii" margin />
        <div class="bg-books sm:border sm:border-gray-200 sm:p-4 sm:shadow-md sm:rounded mb-8">
            <MasonryWall :items="books" :column-width="250" :gap="16">
                <template #default="{item}">
                    <BookListItem :item="item" />
                </template>
            </MasonryWall>
        </div>
    </section>
</template>

<script setup>
import MasonryWall from '@yeger/vue-masonry-wall';
import BookListItem from '../Components/BookListItem.vue';
import Separator from "@/Components/Separator.vue";

defineProps({
    books: Array,
})
</script>

<style scoped>

</style>

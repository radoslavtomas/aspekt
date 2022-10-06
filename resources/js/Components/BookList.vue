<template>
    <MasonryWall :items="props.items" :column-width="220" :gap="16">
        <template #default="{item}">
            <article class="border border-gray-300 shadow-md p-4">
                <header>
                    <Link :href="route('books', [props.category, item.slug])">
                        <img v-if="item.cover" class="w-52 h-auto mx-auto border border-gray-200 shadow-md mb-2 rounded-md" :src="`/storage/${item.cover}`" alt="book.title">
                    </Link>
                </header>
                <main>
                    <Link :href="route('books', [props.category, item.slug])">
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

    <pagination class="mt-4" :links="props.links"></pagination>
</template>

<script setup>
import {Link} from '@inertiajs/inertia-vue3';
import MasonryWall from '@yeger/vue-masonry-wall'
import Pagination from '../Components/Pagination.vue'
import {computed, onMounted} from "vue";

const props = defineProps({
    items: Object,
    links: Object,
    category: String
})


onMounted(() => {
    console.log(props.items)
})
</script>

<style scoped>

</style>

<template>
    <section>
        <Head :title="title" />

        <Breadcrumbs id="aspektin"/>

        <div class="bg-books">

            <div class="mb-4 text-white bg-gradient-to-r from-pink-500 to-fuchsia-400 text-center p-4">
                <h1 class="text-xl font-bold tracking-widest">ASPEKTin</h1>

                <h5 class="text-sm">feministicky webzin</h5>
            </div>

            <div class="mb-4 border border-fuchsia-400 p-4">
                <BlogListItem :item="featured.data" :featured="true"/>

                <MasonryWall :items="items.data" :column-width="230" :gap="16">
                    <template #default="{item}">
                        <BlogListItem :item="item" />
                    </template>
                </MasonryWall>
            </div>
        </div>

        <pagination class="mt-4" :links="items.meta.links"></pagination>
    </section>
</template>

<script setup>
import {Head, usePage} from '@inertiajs/inertia-vue3';
import {computed, onMounted} from "vue";

// 3rd party
import MasonryWall from '@yeger/vue-masonry-wall'

// components
import BlogListItem from './BlogListItem.vue';
import Breadcrumbs from '../Components/Breadcrumbs.vue';
import Pagination from '../Components/Pagination.vue'

// computed
const category = computed(() => usePage().props.value.category);
const items = computed(() => usePage().props.value.blogs);
const featured = computed(() => usePage().props.value.featured);
const locale = computed(() => usePage().props.value.locale);
const navigation = computed(() => usePage().props.value.navigation);

const title = computed(() => {
    const navigationString = computed(() => navigation.value.find(el => el.route === 'aspektin')[`name_${locale.value}`]);
    const categoryString = category.value[`name_${locale.value}`]
    return `${navigationString.value} | ${categoryString}`
})

onMounted(() => {
    console.log(items.value, featured.value)
})
</script>



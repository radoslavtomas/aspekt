<template>
    <section>
        <Head :title="title" />

        <Breadcrumbs id="aspektin"/>

        <div class="bg-books">

            <div class="mb-4 text-gray-700 aspektin text-center p-4">
                <h1 class="text-3xl font-bold tracking-widest">A S P E K T i n</h1>

                <h5 class="text-sm tracking-wider font-bold">f e m i n i s t i c k y&nbsp;&nbsp;&nbsp;w e b z i n</h5>
            </div>

            <h1 class="text-3xl md:text-2xl text-red-600 font-bold my-8 text-center">
                <span class="px-4">{{categoryString}}</span>
            </h1>

            <BlogListItem :item="featured.data" :featured="true"/>

            <div class="mb-4 border-2 border-purple-100 p-4 bg-transparent">
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
const categoryString = computed(() => category.value[`name_${locale.value}`]);
const items = computed(() => usePage().props.value.blogs);
const featured = computed(() => usePage().props.value.featured);
const locale = computed(() => usePage().props.value.locale);
const navigation = computed(() => usePage().props.value.navigation);

const title = computed(() => {
    const navigationString = computed(() => navigation.value.find(el => el.route === 'aspektin')[`name_${locale.value}`]);

    return `${navigationString.value} | ${categoryString.value}`
})
</script>

<style>

</style>



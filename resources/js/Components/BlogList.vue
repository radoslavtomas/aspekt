<template>
    <section>
        <Head :title="title" />

        <div class="bg-books">
            <AspektinHero />

            <h1 v-if="category.url !== 'vsetko'" class="text-3xl md:text-2xl text-red-600 font-bold my-4 text-center">
                <span class="px-4">{{categoryString}}</span>
            </h1>

            <Breadcrumbs id="aspektin"/>

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
import AspektinHero from "@/Components/AspektinHero.vue";

// computed
const category = computed(() => usePage().props.value.category);
const categoryString = computed(() => category.value[`name_${locale.value}`]);
const items = computed(() => usePage().props.value.blogs);
const featured = computed(() => usePage().props.value.featured);
const locale = computed(() => usePage().props.value.locale);
const navigation = computed(() => usePage().props.value.navigation);
const navigationString = computed(() => navigation.value.find(el => el.route === 'aspektin')[`name_${locale.value}`]);
const title = computed(() => `${navigationString.value} | ${categoryString.value}`);
</script>

<style>

</style>



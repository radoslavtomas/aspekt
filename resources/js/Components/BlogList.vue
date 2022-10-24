<template>
    <section>
        <Head :title="title" />

        <Breadcrumbs id="aspektin"/>

        <div class="bg-books sm:border sm:border-gray-200 sm:p-4 sm:shadow-md sm:rounded">

            <div class="mb-4">
                <BlogListItem :item="featured.data" :featured="true"/>
            </div>

            <MasonryWall :items="items.data" :column-width="230" :gap="16">
                <template #default="{item}">
                    <BlogListItem :item="item" />
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



<template>
    <section>
        <Head :title="title" />

        <Breadcrumbs id="aspektin"/>

        <div class="bg-books">

            <div class="mb-4 text-gray-700 aspektin text-center p-4">
                <h1 class="text-3xl font-bold tracking-widest">A S P E K T i n</h1>

                <h5 class="text-sm tracking-wider font-bold">f e m i n i s t i c k y&nbsp;&nbsp;&nbsp;&nbsp;w e b z i n</h5>
            </div>

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

<style>
.aspektin {
    @apply bg-gradient-to-br from-gray-100 to-white;
    text-shadow: 3px 2px white;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='80' height='80' viewBox='0 0 80 80'%3E%3Cg fill='%23e6cde3' fill-opacity='0.4'%3E%3Cpath fill-rule='evenodd' d='M11 0l5 20H6l5-20zm42 31a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM0 72h40v4H0v-4zm0-8h31v4H0v-4zm20-16h20v4H20v-4zM0 56h40v4H0v-4zm63-25a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm10 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM53 41a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm10 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm10 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-30 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-28-8a5 5 0 0 0-10 0h10zm10 0a5 5 0 0 1-10 0h10zM56 5a5 5 0 0 0-10 0h10zm10 0a5 5 0 0 1-10 0h10zm-3 46a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm10 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM21 0l5 20H16l5-20zm43 64v-4h-4v4h-4v4h4v4h4v-4h4v-4h-4zM36 13h4v4h-4v-4zm4 4h4v4h-4v-4zm-4 4h4v4h-4v-4zm8-8h4v4h-4v-4z'/%3E%3C/g%3E%3C/svg%3E");
}
</style>



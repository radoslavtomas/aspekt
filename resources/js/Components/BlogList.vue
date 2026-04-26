<template>
    <section>
        <Head :title="title"/>

        <div class="bg-wave rounded">
            <AspektinHero/>

            <h1 v-if="category.url !== 'vsetko'" class="text-3xl md:text-2xl text-red-600 font-bold my-4 text-center">
                <span class="px-4">{{ categoryString }}</span>
            </h1>

            <Breadcrumbs id="aspektin"/>

            <BlogListItem :featured="true" :item="featured.data"/>

            <div class="rounded mb-4 border-2 border-purple-500 p-4 bg-transparent">
                <MasonryWall :column-width="230" :gap="16" :items="items.data">
                    <template #default="{item}">
                        <BlogListItem :item="item"/>
                    </template>
                </MasonryWall>
            </div>
        </div>

        <pagination :links="items.meta.links" class="mt-4"></pagination>
    </section>
</template>

<script setup>
import { Head, usePage } from '@inertiajs/vue3'
import { computed } from 'vue'

// 3rd party
import MasonryWall from '@yeger/vue-masonry-wall'

// components
import BlogListItem from './BlogListItem.vue'
import Breadcrumbs from '../Components/Breadcrumbs.vue'
import Pagination from '../Components/Pagination.vue'
import AspektinHero from '@/Components/AspektinHero.vue'

// computed
const category = computed(() => usePage().props.category)
const categoryString = computed(() => category.value[`name_${locale.value}`])
const items = computed(() => usePage().props.blogs)
const featured = computed(() => usePage().props.featured)
const locale = computed(() => usePage().props.locale)
const navigation = computed(() => usePage().props.navigation)
const navigationString = computed(() => navigation.value.find(el => el.route === 'aspektin')[`name_${locale.value}`])
const title = computed(() => `${navigationString.value} | ${categoryString.value}`)
</script>

<style>

</style>



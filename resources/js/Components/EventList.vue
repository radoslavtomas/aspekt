<template>
    <section>
        <Head :title="title"/>

        <div class="bg-books">
            <AspektinHero/>

            <!--            <Breadcrumbs id="aspektin"/>-->

            <BlogListItem :featured="true" :item="featured.data"/>

            <div class="mb-4 border-2 border-purple-100 p-4 bg-transparent">
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
import { Head, usePage } from '@inertiajs/inertia-vue3'
import { computed } from 'vue'

// 3rd party
import MasonryWall from '@yeger/vue-masonry-wall'

// components
import BlogListItem from './BlogListItem.vue'
import Pagination from '../Components/Pagination.vue'
import AspektinHero from '@/Components/AspektinHero.vue'

// computed
const items = computed(() => usePage().props.value.blogs)
const featured = computed(() => usePage().props.value.featured)
const locale = computed(() => usePage().props.value.locale)
const navigation = computed(() => usePage().props.value.navigation)
const navigationString = computed(() => navigation.value.find(el => el.route === 'events')[`name_${locale.value}`])
const title = computed(() => `${navigationString.value} | ${categoryString.value}`)
</script>

<style>

</style>

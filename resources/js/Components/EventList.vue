<template>
    <section>
        <Head :title="title"/>

        <div class="bg-books">
            <Breadcrumbs id="events"/>

            <EventListItem :item="featured.data" featured/>

            <div class="mb-4 border-2 border-teal-100 p-4 bg-transparent">
                <MasonryWall :column-width="230" :gap="16" :items="items.data">
                    <template #default="{item}">
                        <EventListItem :item="item"/>
                    </template>
                </MasonryWall>
            </div>
        </div>

        <pagination :links="items.meta.links" class="mt-4"></pagination>
    </section>
</template>

<script setup>
import { Head, usePage } from '@inertiajs/inertia-vue3'
import { computed, onMounted } from 'vue'

// 3rd party
import MasonryWall from '@yeger/vue-masonry-wall'

// components
import EventListItem from '@/Components/EventListItem.vue'
import Pagination from '../Components/Pagination.vue'
import Breadcrumbs from '../Components/Breadcrumbs.vue'

// computed
const items = computed(() => usePage().props.value.events)
const featured = computed(() => usePage().props.value.featured)
const locale = computed(() => usePage().props.value.locale)
const navigation = computed(() => usePage().props.value.navigation)
const navigationString = computed(() => navigation.value.find(el => el.route === 'events')[`name_${locale.value}`])
const title = computed(() => navigationString.value)

onMounted(() => {
    console.log(featured.value)
})
</script>

<style>

</style>

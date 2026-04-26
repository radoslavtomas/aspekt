<template>
    <section>
        <Head :title="title"/>

        <h1 class="text-3xl md:text-2xl text-red-600 font-bold my-8 text-center">
            <span class="px-4">{{ categoryString }}</span>
        </h1>

        <Breadcrumbs :id="routeName"/>

        <div class="bg-wave sm:border sm:border-gray-200 sm:p-4 sm:shadow-md sm:rounded">
            <MasonryWall :column-width="330" :gap="16" :items="people.data">
                <template #default="{item}">
                    <PeopleListItem :item="item"/>
                </template>
            </MasonryWall>
        </div>


        <pagination :links="people.meta.links" class="mt-4"></pagination>
    </section>
</template>

<script setup>
import { Head, usePage } from '@inertiajs/vue3'
import { computed } from 'vue'

// 3rd party
import MasonryWall from '@yeger/vue-masonry-wall'

// components
import PeopleListItem from './PeopleListItem.vue'
import Breadcrumbs from '../Components/Breadcrumbs.vue'
import Pagination from '../Components/Pagination.vue'

// computed
const category = computed(() => usePage().props.category)
const categoryString = computed(() => category.value[`name_${locale.value}`])
const people = computed(() => usePage().props.people)
const locale = computed(() => usePage().props.locale)
const navigation = computed(() => usePage().props.navigation)
const routeName = computed(() => usePage().props.route_name)

const title = computed(() => {
    const navigationString = computed(() => navigation.value.find(el => el.route === 'books')[`name_${locale.value}`])

    return `${navigationString.value} | ${categoryString.value}`
})
</script>



<script setup>
import { Head, usePage } from '@inertiajs/inertia-vue3'
import MainLayout from '../Layouts/MainLayout.vue'
import AspektHero from '@/Components/AspektHero.vue'
import TheFeaturedBooks from '@/Components/TheFeaturedBooks.vue'
import TheFeaturedBlogs from '@/Components/TheFeaturedBlogs.vue'
import TheFeaturedEvents from '@/Components/TheFeaturedEvents.vue'
import { computed } from 'vue'

const locale = computed(() => usePage().props.value.locale)
const homeTitle = {
    'en': 'Home',
    'sk': 'Domov'
}

defineProps({
    blogs: Object,
    books: Object,
    events: Object | null
})

</script>

<template>
    <MainLayout>
        <Head :title="homeTitle[locale]"/>

        <AspektHero/>

        <TheFeaturedBooks :books="books.data"/>

        <TheFeaturedEvents v-if="events" :events="events.data"/>

        <TheFeaturedBlogs :blogs="blogs.data"/>
    </MainLayout>
</template>

<style scoped>

</style>

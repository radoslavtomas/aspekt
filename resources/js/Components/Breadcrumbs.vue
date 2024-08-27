<template>
    <ul class="flex my-2 py-1 space-x-2 text-xs md:text-sm flex-wrap">
        <li>
            <Link :href="route('home')" class="text-red-600 hover:text-red-700">{{ homeString }}</Link>
        </li>
        <li>
            >
        </li>
        <li v-if="!query">
            <Link v-if="slug && category" :href="route(props.id, [category.url])"
                  class="text-red-600 hover:text-red-700">
                {{ navigationString[`name_${locale}`] }} <span v-if="categoryString">- {{ categoryString }}</span>
            </Link>

            <Link v-if="slug && !category" :href="route(props.id)" class="text-red-600 hover:text-red-700">
                {{ navigationString[`name_${locale}`] }}
            </Link>

            <span v-if="!slug && category">
                {{ navigationString[`name_${locale}`] }} <span v-if="categoryString">- {{ categoryString }}</span>
            </span>
        </li>
        <li v-else>
            {{ searchString[locale] }}
            <span v-if="parameter">| {{ language[locale].options[parameter] }}</span>
        </li>
        <li v-if="slug || query">
            >
        </li>
        <li v-if="slug || query">{{ props.article ? props.article : query }}</li>
    </ul>
</template>

<script setup>
import { computed } from 'vue'
import { Link, usePage } from '@inertiajs/inertia-vue3'

const category = computed(() => usePage().props.value.category)
const locale = computed(() => usePage().props.value.locale)
const navigation = computed(() => usePage().props.value.navigation)
const slug = computed(() => usePage().props.value.slug)
const query = computed(() => usePage().props.value.query) // used in searches
const parameter = computed(() => usePage().props.value.parameter)

const categoryString = computed(() => {
    return category.value ? category.value[`name_${locale.value}`] : ''
})

const searchString = {
    'en': 'Search',
    'sk': 'Vyhľadávanie'
}

const language = {
    en: {
        options: {
            authors: 'Authors',
            blogs: 'AspektIn',
            books: 'Books',
            events: 'Events',
            pages: 'Pages',
            njuvinky: 'Njuvinky',
        },
    },
    sk: {
        options: {
            authors: 'Autorky / Autori',
            blogs: 'AspektIn',
            books: 'Knihy',
            events: 'Podujatia',
            pages: 'Stránky',
            njuvinky: 'Ňjúvinky',
        },
    }
}

const homeString = computed(() => navigation.value.find(el => el.route === 'home')[`name_${locale.value}`])
const navigationString = computed(() => navigation.value.find(el => el.route === props.id))

const props = defineProps({
    id: String,
    article: String
})
</script>

<style scoped>

</style>

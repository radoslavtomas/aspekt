<template>
    <div class="">
        <Separator :title="localLang[locale].title" margin/>
        <p class="text-sm">
            <span>{{ authors }}</span>
            <span>&nbsp;({{ props.blog.year }}). </span>
            <span class="font-bold">{{ props.blog.title }}</span>.
            <span v-if="props.blog.subtitle" class="">{{ props.blog.subtitle }}. </span>
            <span class="">ASPEKTin - {{ localLang[locale].webzine }}. </span>
            <Link :href="url" class="text-red-700 hover:text-red-900">{{ url }}.</Link>
        </p>
    </div>
</template>

<script setup>
import { computed } from 'vue'
import moment from 'moment'
import { Link, usePage } from '@inertiajs/inertia-vue3'
import Separator from '@/Components/Separator.vue'

const props = defineProps({
    blog: Object
})

const url = window.location.href
const now = moment().format('DD/MM/YYYY - HH:mm')
const locale = computed(() => usePage().props.value.locale)
const authors = computed(() => props.blog.authors_cite)

const localLang = {
    sk: {
        title: 'Ako citovať tento článok',
        webzine: 'feministický webzin',
        published: 'Uverejnené',
        accessed: 'Získané',
        available: 'Dostupné'
    },
    en: {
        title: 'How to cite this article',
        webzine: 'feminist webzine',
        published: 'Published at',
        accessed: 'Accessed at',
        available: 'Available at'
    },
}
</script>

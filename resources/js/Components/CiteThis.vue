<template>
<div class="">
    <Separator :title="localLang[locale].title" margin />
    <p class="text-sm">
        <span v-if="props.blog.authors">{{authors}}. </span>
        <span class="font-bold">{{props.blog.title}}</span>.
        <span v-if="props.blog.subtitle" class="italic">{{props.blog.subtitle}}.</span>
        In ASPEKTin - {{localLang[locale].webzine}}. ISSN 1225-8982. {{localLang[locale].published}} {{props.blog.created_at}}.
        {{localLang[locale].accessed}} {{now}}. {{localLang[locale].available}} {{url}}.
    </p>
</div>
</template>

<script setup>
import {computed} from "vue";
import moment from 'moment';
import {usePage} from "@inertiajs/inertia-vue3";
import Separator from '@/Components/Separator.vue'

const props = defineProps({
    blog: Object
})

const url = window.location.href;
const now = moment().format('DD/MM/YYYY - HH:mm');
const locale = computed(() => usePage().props.value.locale);
const authors = computed(() => props.blog.authors === 'red.' ? 'red' : props.blog.authors);

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

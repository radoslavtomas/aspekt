<template>
    <ul class="flex my-2 py-1 space-x-2 text-xs md:text-sm flex-wrap">
        <li>
            <Link :href="route('home')" class="text-red-600 hover:text-red-700">{{homeString}}</Link>
        </li>
        <li>
            >
        </li>
        <li>
            <Link v-if="slug" :href="route(props.id, [category.url])" class="text-red-600 hover:text-red-700">
                {{ navigationString[`name_${locale}`] }} - {{categoryString}}</Link>
            <span v-else>{{ navigationString[`name_${locale}`] }} - {{categoryString}}</span>
        </li>
        <li v-if="slug">
            >
        </li>
        <li v-if="slug">{{props.article}}</li>
    </ul>
</template>

<script setup>
import {computed} from "vue";
import {Link} from "@inertiajs/inertia-vue3";
import {usePage} from "@inertiajs/inertia-vue3";

const category = computed(() => usePage().props.value.category);
const locale = computed(() => usePage().props.value.locale);
const navigation = computed(() => usePage().props.value.navigation);
const slug = computed(() => usePage().props.value.slug);

const categoryString = computed(() => category.value[`name_${locale.value}`]);
const homeString = computed(() => navigation.value.find(el => el.route === 'home')[`name_${locale.value}`]);
const navigationString = computed(() => navigation.value.find(el => el.route === props.id));

const props = defineProps({
    id: String,
    article: String
})
</script>

<style scoped>

</style>

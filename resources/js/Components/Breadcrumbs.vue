<template>
    <ul class="flex my-2 py-1 space-x-2 text-xs">
        <li>
            <Link :href="route('home')" class="text-pink-500 hover:text-pink-600">{{homeString}}</Link>
        </li>
        <li>
            <Link v-if="slug" :href="route(props.id, [category, slug])" class="text-pink-500 hover:text-pink-600 before:content-['>'] before:mr-2 before:text-gray-800">
                {{ base[`name_${locale}`] }} - {{categoryString}}</Link>
            <span v-else class="before:content-['>'] before:mr-2 before:text-gray-800">{{ base[`name_${locale}`] }} - {{categoryString}}</span>
        </li>
        <li v-if="slug" class="before:content-['>'] before:mr-2 before:text-gray-800">{{props.article}}</li>
    </ul>
</template>

<script setup>
import {computed, onMounted} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";
import {Link} from "@inertiajs/inertia-vue3";

const navigation = computed(() => usePage().props.value.navigation);
const locale = computed(() => usePage().props.value.locale);
const category = computed(() => usePage().props.value.category);
const slug = computed(() => usePage().props.value.slug);

const base = computed(() => navigation.value.find(el => el.route === props.id))
const homeString = computed(() => navigation.value.find(el => el.route === 'home')[`name_${locale.value}`])
const categoryString = computed(() => base.value.categories.find(el => el.url === category.value)).value[`name_${locale.value}`]

const props = defineProps({
    id: String,
    article: String
})

onMounted(() => {
    console.log(navigation.value)
    console.log(base.value)
})

</script>

<style scoped>

</style>

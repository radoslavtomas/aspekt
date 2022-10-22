<template>
    <article class="bg-white border border-gray-300 shadow-md p-4">
        <main>
            <Link :href="route('aspektin', [categoryUrl, props.item.slug])">
                <h2 class="text-xl text-red-600">{{props.item.title}}</h2>
            </Link>
            <h3 class="text-sm italic mb-4">{{props.item.authors ?? 'No authors'}}</h3>
            <p class="text-xs" v-html="props.item.teaser"></p>
        </main>
    </article>
</template>

<script setup>
import {computed} from "vue";
import {Link, usePage} from "@inertiajs/inertia-vue3";

const categoryUrl = computed(() => usePage().props.value.category.url);

const props = defineProps({
    item: Object
})
</script>



<template>
    <article class="border p-4 bg-white shadow-md border-gray-300">
        <div class="col-span-5 sm:col-span-3 lg:col-span-4 order-2 sm:order-1">
            <Link :href="route('library', [categoryUrl, props.item.slug])">
                <h2 class="text-red-600 text-lg">{{props.item.title}}</h2>
            </Link>
            <h3 class="text-sm italic mb-4">{{props.item.authors ?? 'red.'}}</h3>
            <p class="text-xs" v-html="props.item.teaser"></p>
        </div>
    </article>
</template>

<script setup>
import {computed} from "vue";
import {Link, usePage} from "@inertiajs/inertia-vue3";

const categoryUrl = computed(() => usePage().props.value.category?.url);

const props = defineProps({
    item: Object,
})
</script>





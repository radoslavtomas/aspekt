<template>
    <article
        :class="featured ? 'border-4 mb-4 border-purple-300 bg-slate-50 shadow-sm' : 'bg-white shadow-md border-gray-300'"
        class="border p-4">
        <main :class="props.item.feature_img  && props.featured ? 'grid grid-cols-5 gap-4' : ''">
            <div class="col-span-5 sm:col-span-3 lg:col-span-4">
                <Link :href="route('aspektin', [categoryUrl, props.item.slug])">
                    <h2 :class="featured ? 'text-2xl' : 'text-lg'" class="text-red-600">{{ props.item.title }}</h2>
                </Link>
                <h3 class="text-sm italic mb-0 sm:mb-4">{{ props.item.subtitle ?? 'red.' }}</h3>
                <p class="text-sm hidden sm:block" v-html="props.item.teaser"></p>
            </div>
            <div
                v-if="props.item.feature_img && props.featured"
                class="col-span-5 sm:col-span-2 lg:col-span-1">
                <img :src="props.item.feature_img" alt="featured_image" class="w-full rounded">
                <p class="text-sm mt-4 sm:hidden" v-html="props.item.teaser"></p>
            </div>
        </main>
    </article>
</template>

<script setup>
import { computed, onMounted } from 'vue'
import { Link, usePage } from '@inertiajs/inertia-vue3'

const categoryUrl = computed(() => {
    const url = usePage().props.value.category?.url
    return url ? url : 'vsetko'
})

const props = defineProps({
    item: Object,
    featured: Boolean
})

onMounted(() => console.log(props.item))
</script>




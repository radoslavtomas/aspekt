<template>
    <article class="border border-gray-300 p-4 bg-white" :class="featured ? 'mb-4 shadow' : 'shadow-md'">
        <main :class="featured ? 'grid grid-cols-5 gap-4' : ''">
            <div class="col-span-5 sm:col-span-3 lg:col-span-4 order-2 sm:order-1">
                <Link :href="route('aspektin', [categoryUrl, props.item.slug])">
                    <h2 :class="featured ? 'text-2xl' : 'text-lg'" class="text-red-600">{{props.item.title}}</h2>
                </Link>
                <h3 class="text-sm italic mb-4">{{props.item.authors ?? 'red.'}}</h3>
                <p class="text-xs" v-html="props.item.teaser"></p>
            </div>
            <div
                v-if="featured"
                class="col-span-5 sm:col-span-2 lg:col-span-1 order-1 sm:order-2 min-h-[13rem]"
                :style="`background: url(${featureImage}) center center no-repeat;background-size: cover;`">
            </div>
        </main>
    </article>
</template>

<script setup>
import {computed} from "vue";
import {Link, usePage} from "@inertiajs/inertia-vue3";

const categoryUrl = computed(() => usePage().props.value.category.url);

const props = defineProps({
    item: Object,
    featured: Boolean
})

// get default feature image if there's none
const featureImage = computed(() => props.item.feature_img ? props.item.feature_img : '/assets/img/default_feature_image.jpg')
</script>




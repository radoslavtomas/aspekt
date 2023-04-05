<template>
    <article class="border p-4" :class="featured ? 'border-4 mb-4 border-purple-100 bg-slate-50 shadow-sm' : 'bg-white shadow-md border-gray-300'">
        <main :class="props.item.feature_img  && props.featured ? 'grid grid-cols-5 gap-4' : ''">
            <div class="col-span-5 sm:col-span-3 lg:col-span-4 order-2 sm:order-1">
                <Link :href="route('aspektin', [categoryUrl, props.item.slug])">
                    <h2 :class="featured ? 'text-2xl' : 'text-lg'" class="text-red-600">{{props.item.title}}</h2>
                </Link>
                <h3 class="text-sm italic mb-4">{{props.item.authors ?? 'red.'}}</h3>
                <p class="text-sm" v-html="props.item.teaser"></p>
            </div>
            <div
                v-if="props.item.feature_img && props.featured"
                class="col-span-5 sm:col-span-2 lg:col-span-1 order-1 sm:order-2 min-h-[13rem]"
                :style="`background: url(${props.item.feature_img }) center center no-repeat;background-size: cover;`">
            </div>
        </main>
    </article>
</template>

<script setup>
import {computed} from "vue";
import {Link, usePage} from "@inertiajs/inertia-vue3";

const categoryUrl = computed(() => {
    const url = usePage().props.value.category?.url;
    return url ? url : 'vsetko';
});

const props = defineProps({
    item: Object,
    featured: Boolean
})

// get default feature image if there's none
const featureImage = computed(() => props.item.feature_img ? props.item.feature_img : false)
</script>




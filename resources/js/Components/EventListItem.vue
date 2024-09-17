<template>
    <Link :href="route('events', [props.item.slug])">
        <article
            :class="{
            'border-4 mb-4 border-teal-200 bg-slate-50 shadow-sm': featured,
            'bg-white shadow-md border-gray-300 hover:border-2': !featured,
            'h-full border-1 border-teal-300 hover:border-2': fullHeight
        }"
            class="rounded border p-4 hover:-translate-y-1 transition ease-out duration-100">
            <main :class="props.item.feature_img  && props.featured ? 'grid grid-cols-5 gap-4' : ''">
                <div class="col-span-5 sm:col-span-3 lg:col-span-4">

                    <h2 :class="featured ? 'text-2xl' : 'text-lg'" class="text-red-600">{{ props.item.title }}</h2>

                    <h3 v-if="props.item.subtitle" class="text-sm mb-2">{{ props.item.subtitle }}</h3>
                    <h3 v-if="props.item.place" class="text-sm my-1 text-gray-600">
                        <map-pin-icon class="mr-1 w-4 h-4 inline-block"/>
                        {{ props.item.place }}
                    </h3>
                    <h3 v-if="props.item.date_start" class="text-sm mb-0 text-gray-600">
                        <clock-icon class="mr-1 w-4 h-4 inline-block"/>
                        {{ props.item.date_start }}, {{ props.item.time_start }}
                        <span v-if="props.item.date_end || props.item.time_end">
                        -
                        <span v-if="props.item.date_end">{{ props.item.date_end }},</span>
                        <span v-if="props.item.time_end">{{ props.item.time_end }}</span>
                    </span>
                    </h3>
                    <p class="text-sm mt-2" v-html="props.item.teaser"></p>
                </div>
                <div
                    v-if="props.item.feature_img && props.featured"
                    class="col-span-5 sm:col-span-2 lg:col-span-1">
                    <img :src="props.item.feature_img" alt="featured_image" class="w-full rounded">
                    <p class="text-sm mt-4 sm:hidden" v-html="props.item.teaser"></p>
                </div>
            </main>
        </article>
    </Link>
</template>

<script setup>
import { ClockIcon, MapPinIcon } from '@heroicons/vue/24/outline'
import { Link } from '@inertiajs/inertia-vue3'

const props = defineProps({
    item: Object,
    featured: Boolean,
    fullHeight: {
        type: Boolean,
        default: false
    }
})
</script>




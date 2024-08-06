<template>
    <article class="bg-white border border-gray-300 shadow-md p-4">
        <Link :href="route(routeName, [realCategoryUrl , props.item.slug])">
            <div class="relative">
                <div class="absolute top-4 left-3 z-20 text-shadow">
                    <h2 class="text-xl text-red-600 font-bold mb-1 tracking-widest">{{ firstName }}</h2>
                    <h4 class="text-2xl text-red-600 uppercase font-bold">
                        <span v-for="name in surnames">{{ name + ' ' }} </span>
                    </h4>
                </div>
                <img v-if="props.item.avatar"
                     :alt="item.title"
                     :src="`/storage/${props.item.avatar}`"
                     class="w-60 h-auto mx-auto border border-gray-200 shadow-md mb-2 rounded-md hover:-translate-y-1 transition-transform duration-75 ease-out">
                <div v-else class="w-56 h-80 border border-gray-300 empty-avatar mx-auto shadow-md rounded-md"></div>
            </div>
        </Link>

        <Link :href="route(routeName, [realCategoryUrl, props.item.slug])">
            <p class="text-sm px-6 mt-6 mb-2 text-red-600 hover:text-red-700 font-bold">{{ props.item.title }}</p>
        </Link>
        <p class="text-sm px-6 mb-4" v-html="props.item.teaser"></p>
    </article>
</template>

<script setup>
import { computed, onMounted } from 'vue'
import { Link, usePage } from '@inertiajs/inertia-vue3'

const categoryUrl = computed(() => usePage().props.value.category.url)
const routeName = computed(() => usePage().props.value.route_name)
const query = computed(() => usePage().props.value.query)

const props = defineProps({
    item: Object
})

let realCategoryUrl = ''

if (query.value) {
    realCategoryUrl = props.item.type_id ? 'kto-je-kto' : 'vsetko'
    realCategoryUrl = realCategoryUrl === categoryUrl.value ? categoryUrl : realCategoryUrl
} else {
    realCategoryUrl = categoryUrl.value
}

const firstName = computed(() => props.item.title.split(' ')[0])
const surnames = computed(() => props.item.title.split(' ').slice(1))

onMounted(() => {
    console.log(categoryUrl.value)
    console.log(query.value)
})

</script>

<style>
.text-shadow {
    text-shadow: 1px 1px #f3f4f6;
}

.empty-avatar {
    background-color: #f3f0f0;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='88' height='24' viewBox='0 0 88 24'%3E%3Cg fill-rule='evenodd'%3E%3Cg id='autumn' fill='%23c0c0c0' fill-opacity='0.4'%3E%3Cpath d='M10 0l30 15 2 1V2.18A10 10 0 0 0 41.76 0H39.7a8 8 0 0 1 .3 2.18v10.58L14.47 0H10zm31.76 24a10 10 0 0 0-5.29-6.76L4 1 2 0v13.82a10 10 0 0 0 5.53 8.94L10 24h4.47l-6.05-3.02A8 8 0 0 1 4 13.82V3.24l31.58 15.78A8 8 0 0 1 39.7 24h2.06zM78 24l2.47-1.24A10 10 0 0 0 86 13.82V0l-2 1-32.47 16.24A10 10 0 0 0 46.24 24h2.06a8 8 0 0 1 4.12-4.98L84 3.24v10.58a8 8 0 0 1-4.42 7.16L73.53 24H78zm0-24L48 15l-2 1V2.18A10 10 0 0 1 46.24 0h2.06a8 8 0 0 0-.3 2.18v10.58L73.53 0H78z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
</style>

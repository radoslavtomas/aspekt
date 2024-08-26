<template>
    <div v-if="props.openNav" id="mobile-menu" class="lg:hidden abosule w-full z-20 h-full">
        <div
            class="relative bg-white shadow-xl border-y border-purple-400 opacity-95 space-y-1 px-2 pt-2 pb-12 z-50 flex flex-col items-center">

            <Link
                href="/search"
            >
                <svg class="size-5 text-red-600 hover:text-red-700 mt-4 mb-2" fill="none" stroke="currentColor"
                     stroke-width="1.5"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
                          stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>
            </Link>

            <template v-for="menuItem in navigation">
                <Link
                    v-if="!menuItem.categories.length"
                    :class="{ 'border-b-4 border-red-600': props.path === menuItem.route }"
                    :href="route(menuItem.route)"
                    aria-current="page"
                    class="flex flex-col items-center font-bold uppercase text-red-600 hover:bg-red-100 hover:text-red-700 px-3 py-2 font-medium"
                    @click="props.updatePath"
                >
                    {{ menuItem[`name_${locale}`] }}
                </Link>

                <div
                    v-else
                    :class="{ 'border-b-4 border-red-600': props.path === menuItem.route }"
                    class="flex flex-col items-center font-bold uppercase text-red-600 hover:bg-red-100 hover:text-red-700 px-3 py-2 font-medium"
                >
                    {{ menuItem[`name_${locale}`] }}
                </div>


                <template v-if="menuItem.categories.length">
                    <div v-for="item in menuItem.categories">
                        <a
                            v-if="item.url.startsWith('http')"
                            :href="item.url"
                            class="text-sm text-center inline-block w-full px-4 py-1.5 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                            target="_blank"
                        >
                                <span
                                    class="text-gray-700 pb-0.5 border-b-2 border-transparent hover:border-gray-500 hover:text-gray-800 transition duration-50 ease-in-out">
                                    {{ item[`name_${locale}`] }}
                                </span>
                        </a>
                        <Link
                            v-else
                            :href="route(menuItem.route) + '/' + item.url"
                            class="text-sm text-center inline-block w-full px-4 py-1.5 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                            @click="props.updatePath">
                                <span
                                    class="text-gray-700 pb-0.5 border-b-2 border-transparent hover:border-gray-500 hover:text-gray-800 transition duration-50 ease-in-out">
                                    {{ item[`name_${locale}`] }}
                                </span>
                        </Link>
                    </div>

                </template>
            </template>
        </div>

        <div v-show="props.openNav" class="backdrop-blur-sm z-20 fixed inset-0 top-20"
             @click="props.openNav = false"></div>
    </div>
</template>

<script setup>
import { computed, onMounted } from 'vue'
import { Link, usePage } from '@inertiajs/inertia-vue3'

const props = defineProps({
    openNav: Boolean,
    path: String,
    updatePath: Function
})

const locale = computed(() => usePage().props.value.locale)
const navigation = computed(() => usePage().props.value.navigation.filter(item => item.id !== 43))

onMounted(() => {
    props.updatePath()
})
</script>

<style scoped>

</style>

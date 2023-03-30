<template>
    <div v-if="openNav" class="lg:hidden abosule w-full z-20 h-full" id="mobile-menu">
        <div class="relative bg-white shadow-xl border-y border-purple-400 opacity-95 space-y-1 px-2 pt-2 pb-12 z-50 flex flex-col items-center">
            <template v-for="menuItem in navigation">
                <Link
                    v-if="!menuItem.categories.length"
                    :href="route(menuItem.route)"
                    :class="{ 'border-b-4 border-red-600': $page.component === menuItem.component }"
                    class="flex flex-col items-center font-bold uppercase text-red-600 hover:bg-red-100 hover:text-red-700 px-3 py-2 font-medium" aria-current="page"
                >
                    {{menuItem[`name_${locale}`]}}
                </Link>

                <div
                    v-else
                    class="flex flex-col items-center font-bold uppercase text-red-600 hover:bg-red-100 hover:text-red-700 px-3 py-2 font-medium"
                >
                    {{menuItem[`name_${locale}`]}}
                </div>


                <template v-if="menuItem.categories.length">
                    <Link
                        v-for="item in menuItem.categories" :href="route(menuItem.route) + '/' + item.url"
                        class="text-sm text-center inline-block w-full px-4 py-1.5 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                        <span class="text-gray-700 pb-0.5 border-b-2 border-transparent hover:border-gray-500 hover:text-gray-800 transition duration-50 ease-in-out">
                            {{item[`name_${locale}`]}}
                        </span>
                    </Link>
                </template>
            </template>
        </div>

        <div v-show="openNav" class="backdrop-blur-sm z-20 fixed inset-0 top-20" @click="openNav = false"></div>
    </div>
</template>

<script setup>
import {computed, onMounted} from "vue";
import {Link, usePage} from "@inertiajs/inertia-vue3";

defineProps({
    openNav: Boolean,
})

const locale = computed(() => usePage().props.value.locale);
const navigation = computed(() => usePage().props.value.navigation.filter(item => item.id !== 43));

onMounted(() => {
    // console.log(this.$page)
    console.log(navigation.value)
})
</script>

<style scoped>

</style>

<template>
    <div class="hidden lg:ml-6 lg:block">
        <div class="flex items-center justify-between space-x-3.5 h-full">
            <template v-for="menuItem in navigation">
                <Link
                    v-if="!menuItem.categories.length"
                    :class="{ 'border-b-4 border-red-600': props.path === menuItem.route }"
                    :href="route(menuItem.route)"
                    class="inline-block font-bold text-red-600 uppercase hover:bg-red-100 hover:text-red-700 px-3 py-2 text-sm font-medium tracking-normal"
                    @click="props.updatePath"
                >
                    {{ menuItem[`name_${locale}`] }}
                </Link>

                <MenuDropdown v-else align="center" width="52">
                    <template #trigger>
                        <button
                            :class="{ 'border-b-4 border-red-600': path === menuItem.route }"
                            class="font-bold text-red-600 hover:bg-red-100 hover:text-red-700 px-3 py-2 text-sm font-medium uppercase">
                            {{ menuItem[`name_${locale}`] }}
                        </button>
                    </template>
                    <template #content>
                        <MenuDropdownLink v-for="item in menuItem.categories"
                                          :blank="item.url.startsWith('http')"
                                          :href="item.url.startsWith('http') ? item.url : route(menuItem.route) + '/' + item.url"
                                          as="button" @click="updatePath">
                            {{ item[`name_${locale}`] }}
                        </MenuDropdownLink>
                    </template>
                </MenuDropdown>
            </template>

            <Link
                href="/search"
            >
                <svg class="size-5 text-red-600 hover:text-red-700" fill="none" stroke="currentColor" stroke-width="1.5"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
                          stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>
            </Link>

        </div>
    </div>
</template>

<script setup>
import { computed, onMounted } from 'vue'
import { Link, usePage } from '@inertiajs/inertia-vue3'

import MenuDropdown from '../Components/MenuDropdown.vue'
import MenuDropdownLink from '../Components/MenuDropdownLink.vue'

const locale = computed(() => usePage().props.value.locale)
const navigation = computed(() => usePage().props.value.navigation.filter(item => item.id !== 43))

const props = defineProps({
    path: String,
    updatePath: Function
})

onMounted(() => {
    props.updatePath()
    // console.log(props.path)
    // console.log(navigation.value)
})
</script>

<style scoped>

</style>

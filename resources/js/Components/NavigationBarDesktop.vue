<template>
    <div class="hidden lg:ml-6 lg:block">
        <div class="flex items-center justify-between space-x-3.5 h-full">
            <template v-for="menuItem in navigation">
                <Link
                    v-if="!menuItem.categories.length"
                    @click="props.updatePath"
                    :href="route(menuItem.route)"
                    class="inline-block font-bold text-red-600 uppercase hover:bg-red-100 hover:text-red-700 px-3 py-2 text-sm font-medium"
                    :class="{ 'border-b-4 border-red-600': props.path === menuItem.route }"
                >
                    {{menuItem[`name_${locale}`]}}
                </Link>

                <MenuDropdown v-else align="center" width="52">
                    <template #trigger>
                        <button class="font-bold text-red-600 hover:bg-red-100 hover:text-red-700 px-3 py-2 text-sm font-medium uppercase" :class="{ 'border-b-4 border-red-600': path === menuItem.route }">{{menuItem[`name_${locale}`]}}</button>
                    </template>
                    <template #content>
                        <MenuDropdownLink @click="updatePath" v-for="item in menuItem.categories" :href="route(menuItem.route) + '/' + item.url" as="button">
                            {{item[`name_${locale}`]}}
                        </MenuDropdownLink>
                    </template>
                </MenuDropdown>
            </template>

        </div>
    </div>
</template>

<script setup>
import {computed, onMounted, onUpdated, ref} from "vue";
import {Link, usePage} from "@inertiajs/inertia-vue3";

import MenuDropdown from '../Components/MenuDropdown.vue'
import MenuDropdownLink from '../Components/MenuDropdownLink.vue'

const locale = computed(() => usePage().props.value.locale);
const navigation = computed(() => usePage().props.value.navigation.filter(item => item.id !== 43));

const props = defineProps({
    path: String,
    updatePath: Function
})

onMounted(() => {
    props.updatePath()
})
</script>

<style scoped>

</style>

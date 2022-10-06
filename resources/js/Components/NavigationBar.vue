<template>
    <nav class="tracking-widest">
        <div class="mx-auto max-w-7xl px-2 md:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="absolute inset-y-0 left-0 flex items-center lg:hidden">
                    <!-- Mobile menu button-->
                    <button type="button" class="inline-flex items-center justify-center rounded-md p-2 text-gray-800 hover:bg-gray-200 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-red-500" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <!--
                          Icon when menu is closed.

                          Heroicon name: outline/bars-3

                          Menu open: "hidden", Menu closed: "block"
                        -->
                        <svg v-if="!openNav" @click="openNav = true" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <!--
                          Icon when menu is open.

                          Heroicon name: outline/x-mark

                          Menu open: "block", Menu closed: "hidden"
                        -->
                        <svg v-if="openNav" @click="openNav = false" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="flex flex-1 items-center justify-center lg:items-stretch lg:justify-start">
                    <div class="flex flex-shrink-0 items-center">
                        <Link :href="route('home')">
                            <img class="h-12 w-auto" src="/assets/img/aspekt_logo.jpg" alt="Aspekt">
                        </Link>
                    </div>

                </div>
                <div class="hidden lg:ml-6 lg:block">
                    <div class="flex items-center justify-between space-x-3.5 h-full">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->

                        <template v-for="menuItem in navigation">
                            <Link v-if="!menuItem.categories.length" :href="route(menuItem.route)" :class="{ 'border-b-4 border-red-600': $page.component === menuItem.component }" class="inline-block font-bold text-red-600 uppercase hover:bg-red-100 hover:text-red-700 px-3 py-2 text-sm font-medium" aria-current="page">{{menuItem[`name_${locale}`]}}</Link>

                            <MenuDropdown v-else align="center" width="52">
                                <template #trigger>
                                    <button :class="{ 'border-b-4 border-red-600': $page.component === menuItem.component }" class="font-bold text-red-600 hover:bg-red-100 hover:text-red-700 px-3 py-2 text-sm font-medium uppercase">{{menuItem[`name_${locale}`]}}</button>
                                </template>
                                <template #content>
                                    <MenuDropdownLink v-for="item in menuItem.categories" :href="route(menuItem.route) + '/' + item.url" as="button">
                                        {{item[`name_${locale}`]}}
                                    </MenuDropdownLink>
                                </template>
                            </MenuDropdown>
                        </template>

                    </div>
                </div>
                <LanguageSelector></LanguageSelector>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div v-if="openNav" class="lg:hidden bg-gray-100 absolute w-full z-10" id="mobile-menu">
            <div class="space-y-1 px-2 pt-2 pb-3">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <template v-for="menuItem in navigation">
                    <Link :href="route(menuItem.route)" :class="{ 'border-b-4 border-red-600': $page.component === menuItem.component }" class="block font-bold uppercase text-red-600 hover:bg-red-100 hover:text-red-700 px-3 py-2 text-sm font-medium" aria-current="page">{{menuItem[`name_${locale}`]}}</Link>

                    <template v-if="menuItem.categories.length">
                        <MenuDropdownLink v-for="item in menuItem.categories" :href="route(menuItem.route) + '/' + item.url" as="button" :mobile="true">
                            {{item[`name_${locale}`]}}
                        </MenuDropdownLink>
                    </template>
                </template>
            </div>
        </div>
    </nav>
</template>

<script setup>
import {computed, onMounted, ref} from 'vue';
import {Link, usePage} from "@inertiajs/inertia-vue3";
import LanguageSelector from '../Components/LanguageSelector.vue'
import MenuDropdown from '../Components/MenuDropdown.vue'
import MenuDropdownLink from '../Components/MenuDropdownLink.vue'

const openNav = ref(false);
const locale = computed(() => usePage().props.value.locale);
const navigation = computed(() => usePage().props.value.navigation);

// onMounted(() => console.log(navigation.value))

</script>

<style scoped>

</style>

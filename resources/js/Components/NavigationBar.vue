<template>
    <nav class="relative tracking-widest">
        <div class="container-aspekt flex h-16 items-center justify-between">
            <!-- Mobile menu button -->
            <div class="flex items-center lg:hidden">
                <button type="button" class="inline-flex items-center justify-center rounded-md p-2 text-gray-800 hover:bg-gray-200 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-red-500" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <Bars3Icon v-if="!openNav" @click="openNav = true" class="h-6 w-6" />
                    <XMarkIcon v-else @click="openNav = false" class="h-6 w-6" />
                </button>
            </div>

            <!-- Logo-->
            <div class="flex flex-1 items-center justify-center lg:items-stretch lg:justify-start">
                <div class="flex flex-shrink-0 items-center">
                    <Link :href="route('home')">
                        <img class="h-12 w-auto" src="/assets/img/aspekt_logo.jpg" alt="Aspekt">
                    </Link>
                </div>

            </div>

            <!-- Desktop navigation menu -->
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


        <!-- Mobile menu -->
        <div v-if="openNav" class="lg:hidden absolute w-full z-10 h-full" id="mobile-menu">
            <div class="relative bg-gradient-to-b from-purple-50 to-fuchsia-50 shadow-xl border-y border-purple-300 opacity-95 space-y-1 px-2 pt-2 pb-3 z-50">
                <template v-for="menuItem in navigation">
                    <Link :href="route(menuItem.route)" :class="{ 'border-b-4 border-red-600': $page.component === menuItem.component }" class="block font-bold uppercase text-red-600 hover:bg-red-100 hover:text-red-700 px-3 py-2 text-sm font-medium" aria-current="page">{{menuItem[`name_${locale}`]}}</Link>

                    <template v-if="menuItem.categories.length">
                        <MenuDropdownLink v-for="item in menuItem.categories" :href="route(menuItem.route) + '/' + item.url" as="button" :mobile="true">
                            {{item[`name_${locale}`]}}
                        </MenuDropdownLink>
                    </template>
                </template>
            </div>

            <div v-show="openNav" class="backdrop-blur-sm z-20 fixed inset-0 top-20" @click="openNav = false"></div>
        </div>
    </nav>
</template>

<script setup>
import {computed, onMounted, ref} from 'vue';
import {Link, usePage} from "@inertiajs/inertia-vue3";
import LanguageSelector from '../Components/LanguageSelector.vue'
import MenuDropdown from '../Components/MenuDropdown.vue'
import MenuDropdownLink from '../Components/MenuDropdownLink.vue'
import { Bars3Icon, XMarkIcon } from '@heroicons/vue/24/outline';

const openNav = ref(false);
const locale = computed(() => usePage().props.value.locale);
const navigation = computed(() => usePage().props.value.navigation);

// onMounted(() => console.log(navigation.value))

</script>

<style scoped>

</style>

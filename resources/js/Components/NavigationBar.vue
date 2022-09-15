<template>
    <nav class="">
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
                        <img class="block h-12 w-auto lg:hidden" src="/assets/img/aspekt_logo.jpg" alt="Aspekt">
                        <img class="hidden h-12 w-auto lg:block" src="/assets/img/aspekt_logo.jpg" alt="Aspekt">
                    </div>

                </div>
                <div class="hidden lg:ml-6 lg:block">
                    <div class="flex items-center justify-between space-x-4 h-full">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <Link href="/" class="inline-block bg-red-600 font-semibold text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">DOMOV</Link>

                        <Link href="#" class="inline-block bg-red-600 font-semibold text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">O ASPEKTE</Link>

                        <Link href="/edicia" class="inline-block text-red-600 font-semibold hover:bg-red-100 hover:text-red-700 px-3 py-2 rounded-md text-sm font-medium">KNIZNA EDICIA</Link>

                        <Link href="#" class="inline-block text-red-600 font-semibold hover:bg-red-100 hover:text-red-700 px-3 py-2 rounded-md text-sm font-medium">ASPEKTin</Link>

                        <Link href="#" class="inline-block text-red-600 font-semibold hover:bg-red-100 hover:text-red-700 px-3 py-2 rounded-md text-sm font-medium">KNIZNICA</Link>

                        <Link href="#" class="inline-block text-red-600 font-semibold hover:bg-red-100 hover:text-red-700 px-3 py-2 rounded-md text-sm font-medium">KONTAKT</Link>
                    </div>
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto lg:ml-6 lg:pr-0">
                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                        <div>
                            <button @click="toggleLangOptions" ref="langButton" type="button" class="flex p-1.5 rounded-full bg-red-600 text-white hover:bg-red-700 text-xs focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-red-700" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                SK
                            </button>
                        </div>

                        <!--
                          Dropdown menu, show/hide based on menu state.

                          Entering: "transition ease-out duration-100"
                            From: "transform opacity-0 scale-95"
                            To: "transform opacity-100 scale-100"
                          Leaving: "transition ease-in duration-75"
                            From: "transform opacity-100 scale-100"
                            To: "transform opacity-0 scale-95"
                        -->
                        <div ref="langDiv" v-if="openLang" class="absolute right-0 z-10 mt-2 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <!-- Active: "bg-gray-100", Not Active: "" -->
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200" role="menuitem" tabindex="-1" id="user-menu-item-0">SK</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200" role="menuitem" tabindex="-1" id="user-menu-item-1">EN</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div v-if="openNav" class="md:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pt-2 pb-3">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="#" class="bg-red-600 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">O ASPEKTE</a>

                <a href="#" class="block text-gray-700 hover:bg-gray-200 hover:text-gray-800 px-3 py-2 rounded-md text-sm font-medium">KNIZNA EDICIA</a>

                <a href="#" class="block text-gray-700 hover:bg-gray-200 hover:text-gray-800 px-3 py-2 rounded-md text-sm font-medium">ASPEKTin</a>

                <a href="#" class="block text-gray-700 hover:bg-gray-200 hover:text-gray-800 px-3 py-2 rounded-md text-sm font-medium">KNIZNICA</a>

                <a href="#" class="block text-gray-700 hover:bg-gray-200 hover:text-gray-800 px-3 py-2 rounded-md text-sm font-medium">KONTAKT</a>
            </div>
        </div>
    </nav>
</template>

<script setup>
import {onMounted, onUnmounted, ref} from 'vue';
import {Link} from "@inertiajs/inertia-vue3";

const openNav = ref(false);
const openLang = ref(false);
const langDiv = ref(null);
const langButton = ref(null);

const toggleLangOptions = () => {
    openLang.value = !openLang.value;
}

const closeOnClickAway = (e) => {
    if (openLang.value
        && !langButton.value.contains(e.target)
        && !langDiv.value.contains(e.target)
    ) {
        openLang.value = false;
    }
};

onMounted(() => document.addEventListener('click', closeOnClickAway));
onUnmounted(() => document.removeEventListener('click', closeOnClickAway));
</script>

<style scoped>

</style>

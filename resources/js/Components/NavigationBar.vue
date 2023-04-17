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
                        <img class="h-12 w-auto" src="/assets/img/aspekt_logo.png" alt="Aspekt">
                    </Link>
                </div>

            </div>

            <NavigationBarDesktop
                :path="path"
                :updatePath="updatePath"
            />

            <LanguageSelector />
        </div>

        <NavigationBarMobile
            :openNav="openNav"
            :path="path"
            :updatePath="updatePath"
        />
    </nav>
</template>

<script setup>
import {Link} from "@inertiajs/inertia-vue3";
import LanguageSelector from '../Components/LanguageSelector.vue'
import NavigationBarDesktop from "@/Components/NavigationBarDesktop.vue";
import NavigationBarMobile from "@/Components/NavigationBarMobile.vue";

import { Bars3Icon, XMarkIcon } from '@heroicons/vue/24/outline';
import {ref} from "vue";

const openNav = ref(false);

const path = ref('');
const updatePath = () => {
    const pathname = window.location.pathname.split('/')[1]

    switch (pathname) {
        case '':
            path.value = 'home';
            break;
        case 'about':
        case 'njuvinky':
            path.value = 'about';
            break;
        case 'books':
            path.value = 'books';
            break;
        case 'aspektin':
            path.value = 'aspektin';
            break;
        case 'library':
            path.value = 'library';
            break;
        case 'contact':
            path.value = 'contact';
            break;
        default:
            path.value = '';
    }
}

</script>

<style scoped>

</style>

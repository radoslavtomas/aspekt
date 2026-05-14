<template>
    <nav class="relative tracking-widest">
        <div class="container-aspekt flex h-16 items-center justify-between">
            <!-- Logo-->
            <div class="flex items-center justify-center lgg:items-stretch lgg:justify-start">
                <div class="flex flex-shrink-0 items-center">
                    <Link :href="route('home')">
                        <img alt="Aspekt" class="h-12 w-auto" src="/assets/img/aspekt_logo.png">
                    </Link>
                </div>

            </div>

            <div class="flex items-center justify-end">
                <NavigationBarDesktop
                    :path="path"
                    :updatePath="updatePath"
                />

                <!--            <LanguageSelector/>-->
                <SupportUsCtaButton/>

                <!-- Mobile menu button -->
                <div class="flex items-center lgg:hidden">
                    <button aria-controls="mobile-menu"
                            aria-expanded="false"
                            class="inline-flex items-center justify-center rounded-md p-2 text-gray-800 hover:bg-gray-200 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-red-500"
                            type="button">
                        <span class="sr-only">Open main menu</span>
                        <Bars3Icon v-if="!openNav" class="h-6 w-6" @click="openNav = true"/>
                        <XMarkIcon v-else class="h-6 w-6" @click="openNav = false"/>
                    </button>
                </div>
            </div>
        </div>

        <NavigationBarMobile
            :openNav="openNav"
            :path="path"
            :updatePath="updatePath"
        />
    </nav>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import NavigationBarDesktop from '@/Components/NavigationBarDesktop.vue'
import NavigationBarMobile from '@/Components/NavigationBarMobile.vue'
import SupportUsCtaButton from '@/Components/SupportUsCtaButton.vue'

import { Bars3Icon, XMarkIcon } from '@heroicons/vue/24/outline'
import { ref } from 'vue'

const openNav = ref(false)

const path = ref('')
const updatePath = () => {
    const pathname = window.location.pathname.split('/')[1]

    switch (pathname) {
        case '':
            path.value = 'home'
            break
        case 'about':
        case 'njuvinky':
            path.value = 'about'
            break
        case 'books':
            path.value = 'books'
            break
        case 'aspektin':
            path.value = 'aspektin'
            break
        case 'library':
            path.value = 'library'
            break
        case 'contact':
            path.value = 'contact'
            break
        case 'events':
            path.value = 'events'
            break
        default:
            path.value = ''
    }
}

</script>

<style scoped>

</style>

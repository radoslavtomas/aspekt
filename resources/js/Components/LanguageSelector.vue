<template>
    <div class="flex items-center pr-2 sm:static sm:inset-auto lg:ml-6 lg:pr-0">
        <div class="relative ml-3">
            <div>
                <button @click="toggleLangOptions" ref="langButton" type="button" class="flex justify-center items-center w-8 h-8 rounded-full bg-red-600 text-white hover:bg-red-700 text-xs focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-red-700" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                    <span class="sr-only">Open language menu</span>
                    {{locale.toUpperCase()}}
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
                <Link :href="route('language', 'sk')" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200" role="menuitem" tabindex="-1" id="user-menu-item-0">SK</Link>
                <Link :href="route('language', 'en')" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200" role="menuitem" tabindex="-1" id="user-menu-item-1">EN</Link>
            </div>
        </div>
    </div>
</template>

<script setup>

import {computed, onMounted, onUnmounted, ref} from 'vue';
import {Link, usePage} from "@inertiajs/inertia-vue3";

const openLang = ref(false);
const langDiv = ref(null);
const langButton = ref(null);
const locale = computed(() => usePage().props.value.locale);

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

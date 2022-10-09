<template>
    <button class="flex items-center text-sm bg-red-600 hover:bg-red-700 text-white px-3 py-2 mt-4 md:mt-8 shadow-xl rounded">
        {{buttonText}}

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 ml-2">
        <path fill-rule="evenodd" d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 004.25 22.5h15.5a1.875 1.875 0 001.865-2.071l-1.263-12a1.875 1.875 0 00-1.865-1.679H16.5V6a4.5 4.5 0 10-9 0zM12 3a3 3 0 00-3 3v.75h6V6a3 3 0 00-3-3zm-3 8.25a3 3 0 106 0v-.75a.75.75 0 011.5 0v.75a4.5 4.5 0 11-9 0v-.75a.75.75 0 011.5 0v.75z" clip-rule="evenodd" />
    </svg>
    </button>
</template>

<script setup>
import {computed, onMounted} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";

const locale = computed(() => usePage().props.value.locale);

const buttonText = computed(() => locale.value === 'sk' ? 'Pridaj do tašky' : 'Add to basket')
</script>

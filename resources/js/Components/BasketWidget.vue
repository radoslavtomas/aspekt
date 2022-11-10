<template>
<div :class="animated ? 'animate__bounce' : ''" class="animate__animated fixed bottom-0 right-0 mr-8 mb-8">
    <Link :href="route('basket')" class="block p-3 bg-red-600 text-white shadow-lg shadow-stone-500 rounded-full hover:scale-105">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
            <path fill-rule="evenodd" d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 004.25 22.5h15.5a1.875 1.875 0 001.865-2.071l-1.263-12a1.875 1.875 0 00-1.865-1.679H16.5V6a4.5 4.5 0 10-9 0zM12 3a3 3 0 00-3 3v.75h6V6a3 3 0 00-3-3zm-3 8.25a3 3 0 106 0v-.75a.75.75 0 011.5 0v.75a4.5 4.5 0 11-9 0v-.75a.75.75 0 011.5 0v.75z" clip-rule="evenodd" />
        </svg>
    </Link>
    <div class="text-xs bg-pink-500 text-white w-5 h-5 rounded-full absolute -top-1 -right-1 flex justify-center items-center border border-white">
        {{counter}}
    </div>
</div>
</template>

<script setup>
import { useStore } from 'vuex'
import {computed, ref} from "vue";

import {Link} from "@inertiajs/inertia-vue3";

const store = useStore()
const animated = ref(false);
const counter = computed(() => {
    animate();
    return store.getters.counter
});

const animate = () => {
    animated.value = true;
    setTimeout(() => {
        animated.value = false;
    }, 2000)
}
</script>

<style scoped>

</style>

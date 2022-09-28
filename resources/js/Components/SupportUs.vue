<template>
<section class="flex justify-center my-4 px-4">
        <a class="text-white text-xs text-center px-4 py-2 shadow-md block absolute inset-1 -skew-y-3 bg-pink-500 relative" href="https://aspekt.darujme.sk/prispevok-k-feministickej-buducnosti-3470e/"
            target="_blank">
                <span class="relative text-white">
                    {{msg[locale]}}.
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline ml-1 mb-0.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                </svg>
                </span>
        </a>
</section>
</template>

<script setup>
import {computed} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";

const locale = computed(() => usePage().props.value.locale);
const msg = {
    sk: "Páči sa vám naša práca? Aj vy ju môžete podporiť",
    en: "Do you like what we do? Support us then"
}
</script>

<style scoped>

</style>

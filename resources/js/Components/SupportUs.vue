<template>
<section class="container-aspekt flex justify-center md:justify-end my-8">
        <a class="rounded text-white text-xs text-center px-4 py-2 shadow-md block absolute inset-1 bg-pink-500 hover:bg-pink-600 relative" href="https://aspekt.darujme.sk/prispevok-k-feministickej-buducnosti-3470e/"
            target="_blank">
                <span class="relative text-white">
                    {{msg[locale]}}
                </span>
        </a>
</section>
</template>

<script setup>
import {computed} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";

const locale = computed(() => usePage().props.value.locale);
const msg = {
    sk: "Páči sa vám naša práca? Tu ju môžete podporiť.",
    en: "Do you like what we do? Support us here."
}
</script>

<style scoped>

</style>

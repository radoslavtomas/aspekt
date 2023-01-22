<template>
<section class="container-aspekt flex justify-center items-center md:justify-end my-4 sm:my-2">

    <a class="rounded text-white text-xs text-center px-4 py-2 shadow-md block bg-pink-500 hover:bg-pink-600 relative" href="https://aspekt.darujme.sk/prispevok-k-feministickej-buducnosti-3470e/"
        target="_blank">
            <span class="relative text-white">
                {{lang[locale].supportUs}}
            </span>
    </a>
</section>
</template>

<script setup>
import {computed} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";
import CatsWidget from "@/Components/CatsWidget.vue";
import {useStore} from "vuex";

const store = useStore();
const lang = computed(() => store.getters.lang);
const locale = computed(() => usePage().props.value.locale);
</script>

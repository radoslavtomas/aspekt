<template>
    <section class="aspekt-hero flex justify-center items-center flex-col px-2 py-6 sm:py-8 mt-4 border border-gray-100">
        <img class="w-36 h-auto" src="/assets/img/logo_clean.png" alt="Aspekt Logo">
        <div class="relative flex justify-center items-center mt-4 px-2 py-0.5 rounded-lg">
            <div class="bg-gray-100 opacity-70 z-0 absolute top-0 right-0 w-full h-full"></div>
            <p class="text-sm sm:text-sm text-center text-gray-700 z-10">{{lang[locale].homePageHeroSubtitle}}</p>
        </div>
    </section>
</template>

<script setup>
import {usePage} from "@inertiajs/inertia-vue3";
import {useStore} from "vuex";
import {computed} from "vue";

const store = useStore();

const lang = computed(() => store.getters.lang);
const locale = computed(() => usePage().props.value.locale);

</script>

<style scoped>
.aspekt-hero {
    text-shadow: 2px 1px white;
    background: url('/assets/img/geo.webp') center 61% no-repeat;
    background-size: cover;
}
</style>

<template>
    <header>
        <navigation-bar />
    </header>

    <support-us />

    <main class="relative container-aspekt mx-auto">
        <slot />



        <NewsletterForm />
        <AspektInfo />
    </main>

    <TheFooter />
    <BasketWidget />

</template>

<script setup>
import NavigationBar from '../Components/NavigationBar.vue';
import SupportUs from '../Components/SupportUs.vue'
import AspektInfo from "@/Components/AspektInfo.vue";
import NewsletterForm from "@/Components/Form/NewsletterForm.vue";
import TheFooter from "@/Components/TheFooter.vue";
import BasketWidget from "../Components/BasketWidget.vue";
import {computed, onMounted} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";
import {useStore} from "vuex";

const store = useStore();
const translations = computed(() => usePage().props.value.translations);

onMounted(() => {
    store.dispatch('setTranslations', translations.value.data)
})

</script>

<style scoped>

</style>

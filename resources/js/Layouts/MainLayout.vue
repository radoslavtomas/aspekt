<template>
    <header>
        <navigation-bar />
    </header>

    <main class="relative container-aspekt mx-auto">

        <cats-widget></cats-widget>

        <slot />

<!--        <div class="mt-8 grid grid-cols-1 md:grid-cols-2 bg-gray-200 rounded shadow-md p-2">-->
<!--            <div class="p-4 flex flex-col justify-start">-->
<!--                <support-us />-->
<!--            </div>-->

<!--            <div class="p-4 flex flex-col justify-start border-t border-gray-300 dark:border-gray-700 md:border-t-0 md:border-l">-->
<!--                <NewsletterForm />-->
<!--            </div>-->
<!--        </div>-->

        <support-us />

        <div class="mt-8 bg-gray-200 rounded shadow-md p-4">
            <div class="flex flex-col justify-start">
                <NewsletterForm />
            </div>
        </div>

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
import CatsWidget from "@/Components/CatsWidget.vue";
import {computed, onMounted} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";
import {useStore} from "vuex";

const store = useStore();
const translations = computed(() => usePage().props.value.translations);

onMounted(() => {
    store.dispatch('setTranslations', translations.value)
})

</script>

<style scoped>

</style>

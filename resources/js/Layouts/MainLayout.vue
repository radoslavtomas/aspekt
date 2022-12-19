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

</script>

<style scoped>

</style>

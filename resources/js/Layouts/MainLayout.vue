<template>
    <navigation-bar />
    <support-us />

    <div class="relative">
        <slot />
    </div>
</template>

<script setup>
import NavigationBar from '../Components/NavigationBar.vue';
import SupportUs from '../Components/SupportUs.vue'

</script>

<style scoped>

</style>

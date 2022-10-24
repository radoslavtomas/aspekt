<template>
    <div class="bg-gradient-to-br from-gray-100 to-white">
        <navigation-bar />
        <support-us />

        <div class="relative container-aspekt mx-auto">
            <slot />
        </div>
    </div>
</template>

<script setup>
import NavigationBar from '../Components/NavigationBar.vue';
import SupportUs from '../Components/SupportUs.vue'

</script>

<style scoped>

</style>

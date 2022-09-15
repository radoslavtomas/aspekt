<template>
    <navigation-bar />

    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <slot />
    </div>
</template>

<script setup>
import NavigationBar from '../Components/NavigationBar.vue';

</script>

<style scoped>

</style>

<template>
    <navigation-bar />

    <div class="relative flex items-top justify-center min-h-screen sm:items-center sm:pt-0">
        <slot />
    </div>
</template>

<script setup>
import NavigationBar from '../Components/NavigationBar.vue';

</script>

<style scoped>

</style>

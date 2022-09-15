<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import MainLayout from '../Layouts/MainLayout.vue'

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
})


</script>

<template>
    <Head title="Kniznica" />
    <main-layout>
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            Kniznica
        </div>
    </main-layout>
</template>

<style scoped>

</style>

<script setup>
import BlogList from '../Components/BlogList.vue'
import MainLayout from '@/Layouts/MainLayout.vue'

window.scrollTo({ top: 0, behavior: 'smooth' })
</script>

<template>
    <MainLayout>
        <BlogList/>
    </MainLayout>
</template>


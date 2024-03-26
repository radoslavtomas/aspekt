<script setup>
import EventList from '@/Components/EventList.vue'
import MainLayout from '@/Layouts/MainLayout.vue'

window.scrollTo({ top: 0, behavior: 'smooth' })
</script>

<template>
    <MainLayout>
        <EventList/>
    </MainLayout>
</template>

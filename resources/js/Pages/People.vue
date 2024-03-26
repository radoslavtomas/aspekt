<script setup>
import PeopleList from '../Components/PeopleList.vue'
import MainLayout from '../Layouts/MainLayout.vue'

window.scrollTo({ top: 0, behavior: 'smooth' })
</script>

<template>
    <main-layout>
        <PeopleList/>
    </main-layout>
</template>

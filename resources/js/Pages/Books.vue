<script setup>
import BookList from '../Components/BookList.vue'
import MainLayout from '../Layouts/MainLayout.vue'

window.scrollTo({ top: 0, behavior: 'smooth' })
</script>

<template>
    <main-layout>
        <BookList/>
    </main-layout>
</template>


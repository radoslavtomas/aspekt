<template>
    <div class="max-w-3xl mx-auto">
        <Head :title="title"/>

        <Breadcrumbs id="events" :article="event.title"/>

        <article class="">
            <header class="relative flex flex-col md:flex-row justify-between items-center md:items-start mb-4">
                <div class="text-center md:text-left w-full h-full flex-1 flex flex-col justify-items-stretch">
                    <div class="">
                        <h1 class="text-2xl md:text-3xl text-red-600 font-bold">{{ event.title }}</h1>
                        <h4 class="text-xl text-red-600 my-1">{{ event.subtitle }}</h4>
                    </div>
                </div>
            </header>

            <main class="max-w-2xl mx-auto px-1">
                <section class="mb-6">
                    <div class="content" v-html="event.body"></div>
                </section>
            </main>
        </article>
    </div>
</template>

<script setup>
import { computed } from 'vue'
import { Head, usePage } from '@inertiajs/inertia-vue3'

// components
import Breadcrumbs from '../Components/Breadcrumbs.vue'
import { useStore } from 'vuex'

// computed
const event = computed(() => usePage().props.value.event.data)
const locale = computed(() => usePage().props.value.locale)
const navigation = computed(() => usePage().props.value.navigation)
const store = useStore()
const lang = computed(() => store.getters.lang)
const navigationString = computed(() => navigation.value.find(el => el.route === 'events')[`name_${locale.value}`])
const title = computed(() => `${navigationString.value} | ${event.value.title}`)

</script>


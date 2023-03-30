<template>
    <div class="max-w-3xl mx-auto">
        <Head :title="title" />

        <Breadcrumbs :id="routeName" :article="person.title"/>

        <article class="mt-10">
            <header class="relative max-w-sm mx-auto mb-6">
                <div class="absolute top-4 left-3 z-20 text-shadow">
                    <h2 class="text-xl text-red-600 font-bold mb-1 tracking-widest">{{ firstName }}</h2>
                    <h4 class="text-2xl text-red-600 uppercase font-bold">
                        <span v-for="name in surnames">{{ name + ' ' }} </span>
                    </h4>
                </div>
                <img v-if="person.avatar" class="w-60 h-auto mx-auto border border-gray-200 shadow-md mb-2 rounded-md hover:-translate-y-1 transition-transform duration-75 ease-out" :src="`/storage/${person.avatar}`" :alt="person.title">
                <div v-else class="w-56 h-80 border border-gray-300 empty-avatar mx-auto shadow-md rounded-md"></div>
            </header>

            <main class="max-w-2xl mx-auto px-1">
                <section class="mb-6">
                    <div class="content" v-html="person.body"></div>
                </section>

                <section v-if="person.links" class="mb-6">
                    <Separator :title="lang[locale].articleLinks" margin />
                    <div v-html="person.links"></div>
                </section>
            </main>
        </article>
    </div>
</template>

<script setup>
import {computed} from "vue";
import { useStore } from 'vuex';
import {Head, usePage} from "@inertiajs/inertia-vue3";

// components
import Breadcrumbs from '../Components/Breadcrumbs.vue';
import Separator from "@/Components/Separator.vue";

// computed
const person = computed(() => usePage().props.value.person.data);
const locale = computed(() => usePage().props.value.locale);
const navigation = computed(() => usePage().props.value.navigation);
const store = useStore();
const lang = computed(() => store.getters.lang);
const routeName = computed(() => usePage().props.value.route_name);

const title = computed(() => {
    const navigationString = computed(() => navigation.value.find(el => el.route === 'books')[`name_${locale.value}`]);
    const articleString = person.value.title
    return `${navigationString.value} | ${articleString}`
})
const firstName = computed(() => person.value.title.split(' ')[0])
const surnames = computed(() => person.value.title.split(' ').slice(1))
</script>

<template>
    <Head title="Thank you" />
    <main-layout>
        <div class="max-w-xl mx-auto pt-8">
            <h1 class="text-2xl text-center text-pink-600 font-semibold mb-4">{{lang[locale].thankYouTitle}}</h1>

            <div class="mb-4 text-center">
                <p class="mb-2">{{lang[locale].thankYouNote}}</p>
                <p class="mb-2 text-sm">{{lang[locale].thankYouStatusNote}}</p>
                <p class="mb-10 text-sm font-bold">{{customerEmail}}</p>
                <Link :href="route('home')" class="rounded text-white text-center px-4 py-3 mb-3 sm:mb-0 w-full sm:w-auto shadow-md bg-pink-500 hover:bg-pink-600">
                    {{lang[locale].goHomeButton}} <HomeIcon class=" mb-0.5 w-5 h-5 ml-1 inline" />
                </Link>
            </div>

            <section class="my-6 flex flex-col sm:flex-row flex-col-reverse justify-between items-center text-sm sm:text-base">

            </section>
        </div>
    </main-layout>
</template>

<script setup>
import {Head, usePage} from '@inertiajs/inertia-vue3';
import MainLayout from '../../Layouts/MainLayout.vue'
import {useStore} from "vuex";
import {computed, onMounted, ref} from "vue";

import {Link} from "@inertiajs/inertia-vue3";
import {HomeIcon} from '@heroicons/vue/24/outline';

const store = useStore();
const customerEmail = ref('');

const customer = computed(() => store.getters.customer);
const lang = computed(() => store.getters.lang);
const locale = computed(() => usePage().props.value.locale);

onMounted(() => {
    customerEmail.value = customer.value.primary_email;

    store.dispatch('resetBasket');
    store.dispatch('resetCustomer');
})
</script>

<style scoped>

</style>

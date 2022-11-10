<template>
    <Head title="Summary" />
    <main-layout>
        <div class="max-w-xl mx-auto pt-8">
            <div class="mb-4">
                <table class="border-collapse border border-slate-400 w-full text-sm">
                    <thead class="bg-gray-200">
                    <tr>
                        <th colspan="2" class="border border-slate-400 p-2">{{lang[locale].basketPanel}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="p-2">1 x Nanichodnica</td>
                        <td class="p-2">8,11€</td>
                    </tr>
                    <tr>
                        <td class="p-2">2 x Ako odvravat Novembru</td>
                        <td class="p-2">8,11€</td>
                    </tr>
                    <tr class="border border-slate-400">
                        <td class="p-2">{{lang[locale].subtotal}}</td>
                        <td class="p-2 font-bold">17,11€</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="mb-4">
                <table class="border-collapse border border-slate-400 w-full text-sm">
                    <thead class="bg-gray-200">
                    <tr>
                        <th colspan="2" class="border border-slate-400 p-2">{{ lang[locale].infoPanel }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="border border-slate-400 w-1/3 p-2">Email</td>
                        <td class="border border-slate-400 w-2/3 p-2">radoslav.tomas@gmail.com</td>
                    </tr>
                    <tr>
                        <td class="border border-slate-400 w-1/3 p-2">{{lang[locale].phoneAlt}}</td>
                        <td class="border border-slate-400 w-2/3 p-2">07514443025</td>
                    </tr>
                    <tr>
                        <td class="border border-slate-400 w-1/3 p-2">{{lang[locale].deliveryPanel}}</td>
                        <td class="border border-slate-400 w-2/3 p-2">
                            <p>Radoslav Tomas</p>
                            <p>7 Callander road</p>
                            <p>Liverpool</p>
                            <p>L6 8NT</p>
                            <p>United Kingdom</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="border border-slate-400 w-1/3 p-2">{{lang[locale].billingPanel}}</td>
                        <td class="border border-slate-400 w-2/3 p-2">rovnaka ako adresa dorucenia</td>
<!--                        <td class="border border-slate-400 w-2/3 p-2">-->
<!--                            <p>Radoslav Tomas</p>-->
<!--                            <p>My Fancy company</p>-->
<!--                            <p>7 Callander road</p>-->
<!--                            <p>Liverpool</p>-->
<!--                            <p>L6 8NT</p>-->
<!--                            <p>United Kingdom</p>-->
<!--                        </td>-->
                    </tr>
                    <tr>
                        <td class="border border-slate-400 w-1/3 p-2">{{lang[locale].notePanel}}</td>
                        <td class="border border-slate-400 w-2/3 p-2"></td>
                    </tr>
                    <tr>
                        <td class="border border-slate-400 w-1/3 p-2">{{lang[locale].paymentMethod}}</td>
                        <td class="border border-slate-400 w-2/3 p-2">{{lang[locale].paymentMethodDelivery}}</td>
                    </tr>
                    <tr>
                        <td class="border border-slate-400 w-1/3 p-2">{{lang[locale].subtotal}}</td>
                        <td class="border border-slate-400 w-2/3 p-2">17,11€</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <section class="my-6 flex flex-col sm:flex-row flex-col-reverse justify-between items-center text-sm sm:text-base">
                <Link :href="route('basket')" class="rounded text-gray-500 text-center px-4 py-3 bg-gray-200 hover:bg-gray-300">
                    <ArrowLeftCircleIcon class="w-5 h-5 inline" /> {{lang[locale].backButtonShipping}}
                </Link>
                <button type="submit" class="rounded text-white text-center px-4 py-3 mb-3 sm:mb-0 w-full sm:w-auto shadow-md bg-pink-500 hover:bg-pink-600">
                    {{lang[locale].forwardButtonShipping}} <ArrowRightCircleIcon class="w-5 h-5 inline" />
                </button>
            </section>

            <section class="mb-4">
                <p class="text-sm">Objednané publikácie vám zašleme na dobierku. K cene objednaných kníh je potrebné pripočítať cenu poštovného, ktorá sa pohybuje v rozmedzí 1,65 € – 3,31 € v závislosti od hmotnosti posielaného balíka. (Za samotné knihy však platíte len 75 percent ich predajnej ceny.)</p>
            </section>
        </div>
    </main-layout>
</template>

<script setup>
import {Head, usePage} from '@inertiajs/inertia-vue3';
import MainLayout from '../Layouts/MainLayout.vue'
import {useStore} from "vuex";
import {computed} from "vue";

import {Link} from "@inertiajs/inertia-vue3";
import {ArrowRightCircleIcon, ArrowLeftCircleIcon} from '@heroicons/vue/24/outline';

const store = useStore();
const lang = computed(() => store.getters.lang);
const locale = computed(() => usePage().props.value.locale);
</script>

<style scoped>

</style>

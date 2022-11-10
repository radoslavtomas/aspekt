<template>
    <Head title="Summary" />
    <main-layout>
        <div class="max-w-xl mx-auto pt-8">
            <h1 class="text-2xl text-center text-pink-600 font-semibold mb-4">{{lang[locale].summaryTitle}}</h1>

            <div class="mb-4">
                <table class="border-collapse border border-slate-400 shadow-md w-full text-sm">
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
                <table class="border-collapse border border-slate-400 shadow-md w-full text-sm">
                    <thead class="bg-gray-200">
                    <tr>
                        <th colspan="2" class="border border-slate-400 p-2">{{ lang[locale].infoPanel }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="border border-slate-400 w-1/3 p-2">Email</td>
                        <td class="border border-slate-400 w-2/3 p-2">{{ customer.primary_email}}</td>
                    </tr>
                    <tr>
                        <td class="border border-slate-400 w-1/3 p-2">{{lang[locale].phoneAlt}}</td>
                        <td class="border border-slate-400 w-2/3 p-2">{{ customer.delivery_phone }}</td>
                    </tr>
                    <tr>
                        <td class="border border-slate-400 w-1/3 p-2">{{lang[locale].deliveryPanel}}</td>
                        <td class="border border-slate-400 w-2/3 p-2">
                            <p>{{ customer.delivery_first_name}} {{ customer.delivery_last_name }}</p>
                            <p>{{ customer.delivery_street1 }}</p>
                            <p>{{ customer.delivery_city }}</p>
                            <p>{{ customer.delivery_postal_code }}</p>
                            <p>{{deliveryCountry}}</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="border border-slate-400 w-1/3 p-2">{{lang[locale].billingPanel}}</td>
                        <td class="border border-slate-400 w-2/3 p-2">{{lang[locale].billingPanelNote}}</td>
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
                    {{lang[locale].orderConfirmationButton}} <ArrowRightCircleIcon class="w-5 h-5 inline" />
                </button>
            </section>

            <section class="mb-4">
                <p class="text-sm">{{lang[locale].postageNote}}</p>
            </section>
        </div>
    </main-layout>
</template>

<script setup>
import {Head, usePage} from '@inertiajs/inertia-vue3';
import MainLayout from '../../Layouts/MainLayout.vue'
import {useStore} from "vuex";
import {computed} from "vue";

import {Link} from "@inertiajs/inertia-vue3";
import {ArrowRightCircleIcon, ArrowLeftCircleIcon} from '@heroicons/vue/24/outline';

const store = useStore();
const lang = computed(() => store.getters.lang);
const customer = computed(() => store.getters.customer);
const locale = computed(() => usePage().props.value.locale);

const options = [
    {value: '703', description: 'Slovensko'},
    {value: '203', description: 'Česká republika'},
    {value: '276', description: 'Nemecko'},
    {value: '616', description: 'Poľsko'},
    {value: '826', description: 'Veľká Británia'},
    {value: '40', description: 'Rakúsko'},
    {value: '840', description: 'Spojené štáty'},
    {value: '124', description: 'Kanada'},
]

const deliveryCountry = computed(() => {
    if(!customer.value.delivery_country) {
        return 'JAajajajaja'
    }
    const country = options.filter(item => item.value === customer.value.delivery_country)[0];
    console.log(country)
    return country.description;
})
</script>

<template>
    <Head title="Summary" />
    <main-layout>
        <div class="max-w-xl mx-auto pt-8">
            <h1 class="text-2xl text-center text-pink-600 font-semibold mb-4">{{lang[locale].eshopSummaryTitle}}</h1>

            <div class="mb-4" v-if="basket.length">
                <table class="border-collapse border border-slate-400 shadow-md w-full text-sm">
                    <thead class="bg-gray-200">
                    <tr>
                        <th colspan="2" class="border border-slate-400 p-2">{{lang[locale].eshopBasketPanel}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="book in basket" :key="book.id">
                        <td class="p-2">{{book.qty}} x {{book.title}}</td>
                        <td class="p-2">{{book.aspekt_price}}</td>
                    </tr>
                    <tr class="border border-slate-400">
                        <td class="p-2">{{lang[locale].subtotal}}</td>
                        <td class="p-2 font-bold">{{subtotal}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="mb-4">
                <table class="border-collapse border border-slate-400 shadow-md w-full text-sm">
                    <thead class="bg-gray-200">
                    <tr>
                        <th colspan="2" class="border border-slate-400 p-2">{{ lang[locale].eshopInfoPanel }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="border border-slate-400 w-1/3 p-2">Email</td>
                        <td class="border border-slate-400 w-2/3 p-2">{{ customer.primary_email}}</td>
                    </tr>
                    <tr>
                        <td class="border border-slate-400 w-1/3 p-2">{{lang[locale].eshopPhoneAlt}}</td>
                        <td class="border border-slate-400 w-2/3 p-2">{{ customer.delivery_phone }}</td>
                    </tr>
                    <tr>
                        <td class="border border-slate-400 w-1/3 p-2">{{lang[locale].eshopDeliveryPanel}}</td>
                        <td class="border border-slate-400 w-2/3 p-2">
                            <p>{{ customer.delivery_first_name}} {{ customer.delivery_last_name }}</p>
                            <p>{{ customer.delivery_street1 }}</p>
                            <p>{{ customer.delivery_city }}</p>
                            <p>{{ customer.delivery_postal_code }}</p>
                            <p>{{deliveryCountry}}</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="border border-slate-400 w-1/3 p-2">{{lang[locale].eshopBillingPanel}}</td>
                        <td v-if="!customer.show_billing_panel" class="border border-slate-400 w-2/3 p-2">{{lang[locale].eshopBillingPanelNote}}</td>
                        <td v-else class="border border-slate-400 w-2/3 p-2">
                            <p>{{ customer.billing_first_name}} {{ customer.billing_last_name }}</p>
                            <p>{{ customer.billing_street1 }}</p>
                            <p>{{ customer.billing_city }}</p>
                            <p>{{ customer.billing_postal_code }}</p>
                            <p>{{billingCountry}}</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="border border-slate-400 w-1/3 p-2">{{lang[locale].eshopNotePanel}}</td>
                        <td class="border border-slate-400 w-2/3 p-2">{{customer.comment}}</td>
                    </tr>
                    <tr>
                        <td class="border border-slate-400 w-1/3 p-2">{{lang[locale].eshopPaymentMethod}}</td>
                        <td class="border border-slate-400 w-2/3 p-2">{{lang[locale].eshopPaymentMethodDelivery}}</td>
                    </tr>
                    <tr>
                        <td class="border border-slate-400 w-1/3 p-2">{{lang[locale].eshopSubtotal}}</td>
                        <td class="border border-slate-400 w-2/3 p-2">{{subtotal}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <section class="my-6 flex flex-col sm:flex-row flex-col-reverse justify-between items-center text-sm sm:text-base">
                <Link :href="route('shipping')" class="rounded text-gray-500 text-center px-4 py-3 bg-gray-200 hover:bg-gray-300">
                    <ArrowLeftCircleIcon class="w-5 h-5 inline" /> {{lang[locale].eshopBackButtonShipping}}
                </Link>
                <button @click="handleOrder" class="rounded text-white text-center px-4 py-3 mb-3 sm:mb-0 w-full sm:w-auto shadow-md bg-pink-500 hover:bg-pink-600">
                    {{lang[locale].eshopOrderConfirmationButton}} <ArrowRightCircleIcon class="w-5 h-5 inline" />
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
import { useForm } from '@inertiajs/inertia-vue3'

import {Link} from "@inertiajs/inertia-vue3";
import {ArrowRightCircleIcon, ArrowLeftCircleIcon} from '@heroicons/vue/24/outline';

const store = useStore();

const basket = computed(() => store.getters.basket);
const customer = computed(() => store.getters.customer);
const lang = computed(() => store.getters.lang);
const locale = computed(() => usePage().props.value.locale);
const subtotal = computed(() => store.getters.subtotal);

const options = [
    {value: '703', description: 'Slovensko'},
    {value: '203', description: '??esk?? republika'},
    {value: '276', description: 'Nemecko'},
    {value: '616', description: 'Po??sko'},
    {value: '826', description: 'Ve??k?? Brit??nia'},
    {value: '40', description: 'Rak??sko'},
    {value: '840', description: 'Spojen?? ??t??ty'},
    {value: '124', description: 'Kanada'},
]

const deliveryCountry = computed(() => {
    if(!customer.value.delivery_country) {
        return '';
    }

    const country = options.filter(item => item.value === customer.value.delivery_country)[0];
    return country.description;
});

const billingCountry = computed(() => {
    if(!customer.value.billing_country) {
        return '';
    }

    const country = options.filter(item => item.value === customer.value.billing_country)[0];
    return country.description;
});

const formData = computed(() => {
    return {
        'basket': basket.value,
        'customer': customer.value,
    }
});

const form = useForm(formData.value);

const handleOrder = () => {
    console.log('just before POST')
    console.log(formData.value)
    form.post('/eshop/create-order', {
        onSuccess: () => console.log('hey'),
    })
}
</script>

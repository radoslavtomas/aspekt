<script setup>
import {Head} from '@inertiajs/inertia-vue3';
import MainLayout from '../Layouts/MainLayout.vue'
import {Link} from "@inertiajs/inertia-vue3";
import {ArrowRightCircleIcon} from '@heroicons/vue/24/outline';
import { useForm } from '@inertiajs/inertia-vue3'
import useVuelidate from '@vuelidate/core'
import { required, email, requiredIf } from '@vuelidate/validators'
import {reactive, ref, computed} from "vue";

import FormInput from '../Components/Form/FormInput.vue';
import FormSelect from '../Components/Form/FormSelect.vue';
import FormCheckbox from '../Components/Form/FormCheckbox.vue';
import FormTextarea from '../Components/Form/FormTextarea.vue';
import Card from '../Components/Card.vue';

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

const form = reactive({
    primary_email: '',
    delivery_phone: '',
    delivery_first_name: '',
    delivery_last_name: '',
    delivery_company: '',
    delivery_street1: '',
    delivery_street2: '',
    delivery_city: '',
    delivery_postal_code: '',
    delivery_country: '703',
    billing_first_name: '',
    billing_last_name: '',
    billing_company: '',
    billing_street1: '',
    billing_street2: '',
    billing_city: '',
    billing_postal_code: '',
    billing_country: '703',
})

const showBillingPanel = ref(false);

const rules = computed(() => {
    return {
        primary_email: { required, email },
        delivery_phone: { required },
        delivery_first_name: { required },
        delivery_last_name: { required },
        delivery_company: { required },
        delivery_street1: { required },
        delivery_city: { required },
        delivery_postal_code: { required },
        delivery_country: { required },
        billing_first_name: { requiredIf: requiredIf(showBillingPanel) },
        billing_last_name: { requiredIf: requiredIf(showBillingPanel) },
        billing_company: { requiredIf: requiredIf(showBillingPanel) },
        billing_street1: { requiredIf: requiredIf(showBillingPanel) },
        billing_city: { requiredIf: requiredIf(showBillingPanel) },
        billing_postal_code: { requiredIf: requiredIf(showBillingPanel) },
        billing_country: { requiredIf: requiredIf(showBillingPanel) },
    }
})

const v$ = useVuelidate(rules, form);

const handleForm = async () => {
    const result = await v$.value.$validate();

    if(!result) {
        const el = document.getElementsByClassName('focus:border-red-300')[0]
        setTimeout(() => {
            el.scrollIntoView({behavior: "smooth"})
        }, 100)
    }

    console.log(result)
    console.log(form)
}

defineProps({
    category: String,
    slug: String|null,
})


</script>

<template>
    <Head title="Shipping" />
    <main-layout>
        <div class="max-w-xl mx-auto pt-8">
            <div class="mb-4">
                <table class="border-collapse border border-slate-400 w-full text-sm">
                    <tbody>
                    <tr>
                        <td class="border border-slate-400 p-3">1 x Nanichodnica</td>
                        <td class="border border-slate-400 p-3">8,11€</td>
                    </tr>
                    <tr>
                        <td class="border border-slate-400 p-3">2 x Ako odvravat Novembru alebo starsne dlhy nazov, ktory sa isto nezmesti, lebo je naozaj dlhy</td>
                        <td class="border border-slate-400 p-3">8,11€</td>
                    </tr>
                    <tr>
                        <td class="border border-slate-400 p-3 text-right font-bold">Medzisúčet</td>
                        <td class="border border-slate-400 p-3 font-bold">17,11€</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <form @submit.prevent="handleForm">
                <Card title="Informácie o zákazníkovi/zákazníčke">
                    <FormInput
                        v-model.trim="form.primary_email"
                        title="Email *" type="text"
                        placeholder="Tu Vám zašleme potvrdenie o objednávke"
                        :errors="v$.primary_email.$errors.length ? v$.primary_email.$errors[0] : null" />

                    <FormInput
                        v-model.trim="form.delivery_phone"
                        title="Telefónne číslo"
                        :errors="v$.delivery_phone.$errors.length ? v$.delivery_phone.$errors[0] : null"
                    />
                </Card>

                <Card title="Adresa doručenia">
                    <FormInput
                        v-model.trim="form.delivery_first_name"
                        title="Meno *" type="text"
                        :errors="v$.delivery_first_name.$errors.length ? v$.delivery_first_name.$errors[0] : null" />

                    <FormInput
                        v-model.trim="form.delivery_last_name"
                        title="Priezvisko *" type="text"
                        :errors="v$.delivery_last_name.$errors.length ? v$.delivery_last_name.$errors[0] : null" />

                    <FormInput
                        v-model.trim="form.delivery_company"
                        title="Spoločnosť *" type="text"
                        :errors="v$.delivery_company.$errors.length ? v$.delivery_company.$errors[0] : null" />

                    <FormInput
                        v-model.trim="form.delivery_street1"
                        title="Ulica *" type="text"
                        :errors="v$.delivery_street1.$errors.length ? v$.delivery_street1.$errors[0] : null" />

                    <FormInput
                        v-model.trim="form.delivery_city"
                        title="Mesto *" type="text"
                        :errors="v$.delivery_city.$errors.length ? v$.delivery_city.$errors[0] : null" />

                    <FormInput
                        v-model.trim="form.delivery_postal_code"
                        title="PSČ *" type="text"
                        :errors="v$.delivery_postal_code.$errors.length ? v$.delivery_postal_code.$errors[0] : null" />

                    <FormSelect
                        v-model="form.delivery_country"
                        title="Štát"
                        :errors="v$.delivery_country.$errors.length ? v$.delivery_country.$errors[0] : null"
                        :options="options" />

                    <br>

                    <FormCheckbox v-model="showBillingPanel" title="Moja fakturačná adresa je iná ako dodacia adresa." />
                </Card>

                <Card v-if="showBillingPanel" title="Fakturačné údaje">
                    <FormInput
                        v-model.trim="form.billing_first_name"
                        title="Meno *" type="text"
                        :errors="v$.billing_first_name.$errors.length ? v$.billing_first_name.$errors[0] : null" />

                    <FormInput
                        v-model.trim="form.billing_last_name"
                        title="Priezvisko *" type="text"
                        :errors="v$.billing_last_name.$errors.length ? v$.billing_last_name.$errors[0] : null" />

                    <FormInput
                        v-model.trim="form.billing_company"
                        title="Spoločnosť *" type="text"
                        :errors="v$.billing_company.$errors.length ? v$.billing_company.$errors[0] : null" />

                    <FormInput
                        v-model.trim="form.billing_street1"
                        title="Ulica *" type="text"
                        :errors="v$.billing_street1.$errors.length ? v$.billing_street1.$errors[0] : null" />

                    <FormInput
                        v-model.trim="form.billing_city"
                        title="Mesto *" type="text"
                        :errors="v$.billing_city.$errors.length ? v$.billing_city.$errors[0] : null" />

                    <FormInput
                        v-model.trim="form.billing_postal_code"
                        title="PSČ *" type="text"
                        :errors="v$.billing_postal_code.$errors.length ? v$.billing_postal_code.$errors[0] : null" />

                    <FormSelect
                        v-model="form.billing_country"
                        title="Štát"
                        :errors="v$.billing_country.$errors.length ? v$.billing_country.$errors[0] : null"
                        :options="options" />
                    <br>
                </Card>

                <Card title="Komentár k objednávke">
                    <FormTextarea />
                </Card>

                <section class="my-8">
                    <button type="submit" class="block rounded text-white text-center px-4 py-3 w-full shadow-md bg-pink-500 hover:bg-pink-600">
                        Skontrolovať objednávku <ArrowRightCircleIcon class="w-5 h-5 inline" />
                    </button>
                </section>
            </form>


            <section class="">
                <p class="text-xs">Objednané publikácie vám zašleme na dobierku. K cene objednaných kníh je potrebné pripočítať cenu poštovného, ktorá sa pohybuje v rozmedzí 1,65 € – 3,31 € v závislosti od hmotnosti posielaného balíka. (Za samotné knihy však platíte len 75 percent ich predajnej ceny.)</p>
            </section>
        </div>
    </main-layout>
</template>

<style scoped>

</style>

<script setup>
import { Head, Link, usePage } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'
import MainLayout from '../../Layouts/MainLayout.vue'
import { ArrowLeftCircleIcon, ArrowRightCircleIcon } from '@heroicons/vue/24/outline'
import useVuelidate from '@vuelidate/core'
import { email, maxLength, required, requiredIf } from '@vuelidate/validators'
import { computed, onMounted, reactive } from 'vue'
import { useStore } from 'vuex'

import FormInput from '../../Components/Form/FormInput.vue'
import FormSelect from '../../Components/Form/FormSelect.vue'
import FormCheckbox from '../../Components/Form/FormCheckbox.vue'
import FormTextarea from '../../Components/Form/FormTextarea.vue'
import Card from '../../Components/Card.vue'

const store = useStore()
const lang = computed(() => store.getters.lang)
const locale = computed(() => usePage().props.value.locale)
const customer = computed(() => store.getters.customer)

const options = [
    { value: '703', description: 'Slovensko' },
    { value: '203', description: 'Česká republika' },
    { value: '276', description: 'Nemecko' },
    { value: '616', description: 'Poľsko' },
    { value: '826', description: 'Veľká Británia' },
    { value: '40', description: 'Rakúsko' },
    { value: '840', description: 'Spojené štáty' },
    { value: '124', description: 'Kanada' },
]

let form = reactive({
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
    comment: '',
    show_billing_panel: false,
})

const rules = computed(() => {
    return {
        primary_email: { required, email, maxLength: maxLength(100) },
        delivery_phone: { required, maxLength: maxLength(100) },
        delivery_first_name: { required, maxLength: maxLength(100) },
        delivery_last_name: { required, maxLength: maxLength(100) },
        delivery_company: { maxLength: maxLength(100) },
        delivery_street1: { required, maxLength: maxLength(100) },
        delivery_city: { required, maxLength: maxLength(100) },
        delivery_postal_code: { required, maxLength: maxLength(100) },
        delivery_country: { required, maxLength: maxLength(100) },
        billing_first_name: { requiredIf: requiredIf(form.show_billing_panel), maxLength: maxLength(100) },
        billing_last_name: { requiredIf: requiredIf(form.show_billing_panel) },
        billing_company: { requiredIf: requiredIf(form.show_billing_panel) },
        billing_street1: { requiredIf: requiredIf(form.show_billing_panel) },
        billing_city: { requiredIf: requiredIf(form.show_billing_panel) },
        billing_postal_code: { requiredIf: requiredIf(form.show_billing_panel) },
        billing_country: { requiredIf: requiredIf(form.show_billing_panel) },
        comment: { maxLength: maxLength(1800) },
        show_billing_panel: {}
    }
})

const v$ = useVuelidate(rules, form, { $scope: false })

const handleForm = async () => {
    const result = await v$.value.$validate()

    if (!result) {
        const el = document.getElementsByClassName('focus:border-red-300')[0]
        setTimeout(() => {
            el.scrollIntoView({ behavior: 'smooth' })
        }, 100)
        return
    }

    await store.dispatch('setCustomer', form)

    Inertia.visit('/eshop/summary', {
        method: 'get'
    })
}

onMounted(() => {
    if (customer.value.hasOwnProperty('primary_email')) {
        for (const prop in customer.value) {
            form[prop] = customer.value[prop]
        }
    }
})

defineProps({
    category: String,
    slug: String | null,
})

</script>

<template>
    <!--    @TODO: titles to lang-->
    <Head :title="lang[locale].eshopShippingTitle"/>
    <main-layout>
        <div class="max-w-xl mx-auto pt-8">
            <h1 class="text-2xl text-center text-pink-600 font-semibold mb-4">{{ lang[locale].eshopShippingTitle }}</h1>

            <form @submit.prevent="handleForm">
                <Card :title="lang[locale].eshopInfoPanel">
                    <FormInput
                        v-model.trim="form.primary_email"
                        :errors="v$.primary_email.$errors.length ? v$.primary_email.$errors[0] : null"
                        :placeholder="lang[locale].eshopOrderConfirmation" name="primary_email"
                        title="Email *"
                        type="email"/>

                    <FormInput
                        v-model.trim="form.delivery_phone"
                        :errors="v$.delivery_phone.$errors.length ? v$.delivery_phone.$errors[0] : null"
                        :title="lang[locale].eshopPhone"
                        name="delivery_phone"
                    />
                </Card>

                <Card :title="lang[locale].eshopDeliveryPanel">
                    <FormInput
                        v-model.trim="form.delivery_first_name"
                        :errors="v$.delivery_first_name.$errors.length ? v$.delivery_first_name.$errors[0] : null"
                        :title="lang[locale].eshopName" name="delivery_first_name"
                        type="text"/>

                    <FormInput
                        v-model.trim="form.delivery_last_name"
                        :errors="v$.delivery_last_name.$errors.length ? v$.delivery_last_name.$errors[0] : null"
                        :title="lang[locale].eshopSurname" name="delivery_last_name"
                        type="text"/>

                    <FormInput
                        v-model.trim="form.delivery_company"
                        :errors="v$.delivery_company.$errors.length ? v$.delivery_company.$errors[0] : null"
                        :title="lang[locale].eshopCompany" name="delivery_company"
                        type="text"/>

                    <FormInput
                        v-model.trim="form.delivery_street1"
                        :errors="v$.delivery_street1.$errors.length ? v$.delivery_street1.$errors[0] : null"
                        :title="lang[locale].eshopStreet" name="delivery_street1"
                        type="text"/>

                    <FormInput
                        v-model.trim="form.delivery_city"
                        :errors="v$.delivery_city.$errors.length ? v$.delivery_city.$errors[0] : null"
                        :title="lang[locale].eshopCity" name="delivery_city"
                        type="text"/>

                    <FormInput
                        v-model.trim="form.delivery_postal_code"
                        :errors="v$.delivery_postal_code.$errors.length ? v$.delivery_postal_code.$errors[0] : null"
                        :title="lang[locale].eshopPostcode" name="delivery_postal_code"
                        type="text"/>

                    <FormSelect
                        v-model="form.delivery_country"
                        :errors="v$.delivery_country.$errors.length ? v$.delivery_country.$errors[0] : null"
                        :options="options"
                        :title="lang[locale].eshopCountry"
                        name="delivery_country"/>

                    <br>

                    <FormCheckbox v-model="form.show_billing_panel" :title="lang[locale].eshopBillingCheckbox"
                                  name="delivery_company"/>
                </Card>

                <Card v-if="form.show_billing_panel" :title="lang[locale].eshopBillingPanel">
                    <FormInput
                        v-model.trim="form.billing_first_name"
                        :errors="v$.billing_first_name.$errors.length ? v$.billing_first_name.$errors[0] : null"
                        :title="lang[locale].eshopName" name="billing_first_name"
                        type="text"/>

                    <FormInput
                        v-model.trim="form.billing_last_name"
                        :errors="v$.billing_last_name.$errors.length ? v$.billing_last_name.$errors[0] : null"
                        :title="lang[locale].eshopSurname" name="billing_last_name"
                        type="text"/>

                    <FormInput
                        v-model.trim="form.billing_company"
                        :errors="v$.billing_company.$errors.length ? v$.billing_company.$errors[0] : null"
                        :title="lang[locale].eshopCompany" name="billing_company"
                        type="text"/>

                    <FormInput
                        v-model.trim="form.billing_street1"
                        :errors="v$.billing_street1.$errors.length ? v$.billing_street1.$errors[0] : null"
                        :title="lang[locale].eshopStreet" name="billing_street1"
                        type="text"/>

                    <FormInput
                        v-model.trim="form.billing_city"
                        :errors="v$.billing_city.$errors.length ? v$.billing_city.$errors[0] : null"
                        :title="lang[locale].eshopCity" name="billing_city"
                        type="text"/>

                    <FormInput
                        v-model.trim="form.billing_postal_code"
                        :errors="v$.billing_postal_code.$errors.length ? v$.billing_postal_code.$errors[0] : null"
                        :title="lang[locale].eshopPostcode" name="billing_postal_code"
                        type="text"/>

                    <FormSelect
                        v-model="form.billing_country"
                        :errors="v$.billing_country.$errors.length ? v$.billing_country.$errors[0] : null"
                        :options="options"
                        :title="lang[locale].eshopCountry"
                        name="billing_country"/>
                    <br>
                </Card>

                <Card :title="lang[locale].eshopNotePanel">
                    <FormTextarea
                        v-model="form.comment"
                        :errors="v$.comment.$errors.length ? v$.comment.$errors[0] : null"
                        name="comment"/>
                </Card>

                <section
                    class="my-8 flex flex-col sm:flex-row flex-col-reverse justify-between items-center text-sm sm:text-base">
                    <Link :href="route('basket')"
                          class="rounded text-gray-500 text-center px-4 py-3 bg-gray-200 hover:bg-gray-300">
                        <ArrowLeftCircleIcon class="w-5 h-5 inline"/>
                        {{ lang[locale].eshopBackButtonShipping }}
                    </Link>
                    <button
                        class="rounded text-white text-center px-4 py-3 mb-3 sm:mb-0 w-full sm:w-auto shadow-md bg-pink-500 hover:bg-pink-600"
                        type="submit">
                        {{ lang[locale].eshopForwardButtonShipping }}
                        <ArrowRightCircleIcon class="w-5 h-5 inline"/>
                    </button>
                </section>
            </form>


            <section class="">
                <p class="text-xs">{{ lang[locale].postageNote }}</p>
            </section>
        </div>
    </main-layout>
</template>

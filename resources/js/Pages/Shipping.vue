<script setup>
import {Head} from '@inertiajs/inertia-vue3';
import MainLayout from '../Layouts/MainLayout.vue'
import {Link} from "@inertiajs/inertia-vue3";
import {ArrowRightCircleIcon} from '@heroicons/vue/24/outline';
import { useForm } from '@inertiajs/inertia-vue3'
import useVuelidate from '@vuelidate/core'
import { required, email, minLength } from '@vuelidate/validators'
import {reactive, ref, computed} from "vue";

import FormInput from '../Components/Form/FormInput.vue';
import FormSelect from '../Components/Form/FormSelect.vue';
import FormCheckbox from '../Components/Form/FormCheckbox.vue';
import FormTextarea from '../Components/Form/FormTextarea.vue';
import Card from '../Components/Card.vue';

const options = [
    {value: '', description: '- Prosím vyberte si -'},
    {value: 'SK', description: 'Slovensko'},
    {value: 'CZ', description: 'Česká republika'},
    {value: 'DE', description: 'Nemecko'},
    {value: 'PL', description: 'Poľsko'},
    {value: 'GB', description: 'Veľká Británia'},
    {value: 'AT', description: 'Rakúsko'},
    {value: 'US', description: 'Spojené štáty'},
    {value: 'CA', description: 'Kanada'},
]

const form = reactive({
    email: '',
    phone: '',
    state: 'SK'
})

const showBillingPanel = ref(false);

const rules = computed(() => {
    return {
        email: {
            required, email
        },
        phone: {
            required
        },
        state: {
            required
        }
    }
})

const v$ = useVuelidate(rules, form);

const handleForm = async () => {
    console.log('new')
    console.log(v$.value.$email)
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
                        v-model.trim="form.email"
                        title="Email *" type="text"
                        placeholder="Tu Vám zašleme potvrdenie o objednávke"
                        :errors="v$.email.$errors.length ? v$.email.$errors[0] : null" />

                    <FormInput
                        v-model.trim="form.phone"
                        title="Telefónne číslo"
                        :errors="v$.phone.$errors.length ? v$.phone.$errors[0] : null"
                    />
                </Card>

                <Card title="Adresa doručenia">
                    <FormInput title="Meno *" />
                    <FormInput title="Priezvisko *" />
                    <FormInput title="Spoločnosť" />
                    <FormInput title="Ulica *" />
                    <FormInput title="Mesto *" />
                    <FormInput title="PSČ *" />
                    <FormSelect v-model="form.state" title="Štát" :options="options" />
                    <br>
                    <FormCheckbox v-model="showBillingPanel" title="Moja fakturačná adresa je iná ako dodacia adresa." />
                </Card>

                <Card v-if="showBillingPanel" title="Fakturačné údaje">
                    <FormInput title="Meno *" />
                    <FormInput title="Priezvisko *" />
                    <FormInput title="Spoločnosť" />
                    <FormInput title="Ulica *" />
                    <FormInput title="Mesto *" />
                    <FormInput title="PSČ *" />
                    <FormSelect title="Štát" :options="options" />
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

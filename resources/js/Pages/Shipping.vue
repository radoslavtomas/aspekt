<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import MainLayout from '../Layouts/MainLayout.vue'
import {Link} from "@inertiajs/inertia-vue3";
import { ArrowRightCircleIcon } from '@heroicons/vue/24/outline';

import FormInput from '../Components/Form/FormInput.vue';
import FormSelect from '../Components/Form/FormSelect.vue';
import FormCheckbox from '../Components/Form/FormCheckbox.vue';
import FormTextarea from '../Components/Form/FormTextarea.vue';
import Card from '../Components/Card.vue';

const options = [
    {value: 'SK', description: 'Slovensko'},
    {value: 'CZ', description: 'Česká republika'},
    {value: 'DE', description: 'Nemecko'},
    {value: 'PL', description: 'Poľsko'},
    {value: 'GB', description: 'Veľká Británia'},
    {value: 'AT', description: 'Rakúsko'},
    {value: 'US', description: 'Spojené štáty'},
    {value: 'CA', description: 'Kanada'},
]

defineProps({
    category: String,
    slug: String|null,
})


</script>

<template>
    <Head title="Shipping" />
    <main-layout>
        <div class="max-w-xl mx-auto pt-8">
            <Card title="Pokladňa">
                <div class="text-sm">
                    <table class="border-collapse border border-slate-400 w-full text-xs">
                        <tbody>
                        <tr>
                            <td class="border border-slate-300 p-3">1 x Nanichodnica</td>
                            <td class="border border-slate-300 p-3">8,11€</td>
                        </tr>
                        <tr>
                            <td class="border border-slate-300 p-3">2 x Ako odvravat Novembru alebo starsne dlhy nazov, ktory sa isto nezmesti, lebo je naozaj dlhy</td>
                            <td class="border border-slate-300 p-3">8,11€</td>
                        </tr>
                        <tr>
                            <td class="border border-slate-300 p-3 text-right font-bold">Medzisúčet</td>
                            <td class="border border-slate-300 p-3 font-bold">17,11€</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </Card>

            <Card title="Informácie o zákazníkovi/zákazníčke">
                <p class="text-xs text-gray-500">Zadajte platnú e-mailovú adresu.</p>
                <FormInput title="Email *" type="email" />
                <FormInput title="Telefónne číslo" />
            </Card>


            <Card title="Adresa doručenia">
                <p class="text-xs text-gray-500">Tu prosím vyplňte vašu doručovaciu adresu a vaše kontaktné údaje</p>
                <FormInput title="Meno *" />
                <FormInput title="Priezvisko *" />
                <FormInput title="Spoločnosť" />
                <FormInput title="Ulica *" />
                <FormInput title="Mesto *" />
                <FormInput title="PSČ *" />
                <FormSelect title="Štát" :options="options" />
                <br>
                <FormCheckbox title="Moja fakturačná adresa je iná ako dodacia adresa." />
            </Card>

            <Card title="Komentár k objednávke">
                <FormTextarea title="Komentár" />
            </Card>

            <section class="my-8">
                <Link class="block rounded text-white text-center px-4 py-3 shadow-md bg-pink-500 hover:bg-pink-600" :href="route('shipping')"
                      target="_blank">
                    <span class="text-white">
                        Skontrolovať objednávku <ArrowRightCircleIcon class="w-5 h-5 inline" />
                    </span>

                </Link>
            </section>

            <section class="">
                <p class="text-xs">Objednané publikácie vám zašleme na dobierku. K cene objednaných kníh je potrebné pripočítať cenu poštovného, ktorá sa pohybuje v rozmedzí 1,65 € – 3,31 € v závislosti od hmotnosti posielaného balíka. (Za samotné knihy však platíte len 75 percent ich predajnej ceny.)</p>
            </section>
        </div>
    </main-layout>
</template>

<style scoped>

</style>

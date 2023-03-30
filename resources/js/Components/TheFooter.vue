<template>
    <footer class="bg-gray-800 w-full">
        <div class="container-aspekt mx-auto text-white text-sm">
            <div class="py-8 px-4 grid grid-cols-1 md:grid-cols-3 gap-4 text-center">
                <div class="p-6 flex flex-col items-center">
                    <h3 class="text-lg mb-4 uppercase">{{lang[locale].footerColumn1Title}}</h3>

                    <p>{{lang[locale].footerDescriptionLine1}}</p>
                    <p class="">{{lang[locale].footerDescriptionLine2}}</p>

                    <p class="my-4">*</p>

                    <section class="mb-4 flex flex-col">
                        <Link :href="route('home')">{{localLang[locale].aboutLink}}</Link>
                        <Link :href="route('home')">{{localLang[locale].whoIsWhoLink}}</Link>
                        <Link :href="route('home')">{{localLang[locale].supportLink}}</Link>
                        <Link :href="route('home')">{{localLang[locale].legalLink}}</Link>
                    </section>
                </div>

                <div class="p-6 flex flex-col w-full">
                    <h3 class="text-lg mb-4 uppercase">{{lang[locale].footerColumn2Title}}</h3>

                    <section class="mb-4 flex flex-col">
                        <Link :href="route('home')">{{localLang[locale].bookLink}}</Link>
                        <Link :href="route('home')">{{localLang[locale].webzinLink}}</Link>
                        <Link :href="route('home')">{{localLang[locale].libraryLink}}</Link>
                    </section>

                    <section class="my-4 flex flex-col items-center w-full">
                        <article class="w-40 mb-4 p-3 shadow-md border border-gray-300 bg-white">
                            <a :href="settings.linkGlosar" target="_blank">
                                <img class="w-48 mx-auto" src="/assets/img/glosar.png" alt="glosar rodovej terminologie">
                            </a>
                        </article>

                        <article class="w-40 p-3 shadow-md border border-gray-300 bg-white">
                            <a :href="settings.linkRuzovyAModrySvet" target="_blank">
                                <img class="w-48 mx-auto" src="/assets/img/ruzovysvet.png" alt="ruzovy a modry svet">
                            </a>
                        </article>
                    </section>
                </div>

                <div class="p-6 flex flex-col gap-1">
                    <h3 class="text-lg mb-4 uppercase">{{lang[locale].footerColumn3Title}}</h3>

                    <p>{{ settings.addressStreet }}</p>
                    <p class="mb-4">{{ `${settings.addressPostalCode} ${settings.addressTown}` }}</p>
                    <a :href="`tel:${settings.phoneMobile.replace(/\s/g,'')}`" class="mb-4">{{ settings.phoneMobile }}</a>
                    <a :href="`mailto:${settings.emailAspekt}`">{{ settings.emailAspekt }}</a>
                    <a class="mb-6" href="/">www.aspekt.sk</a>
                    <social-links />
                </div>
            </div>

        </div>
    </footer>
</template>

<script setup>
import {computed, onMounted} from "vue";
import {Link, usePage} from "@inertiajs/inertia-vue3";
import {useStore} from "vuex";

import SocialLinks from "@/Components/SocialLinks.vue";

const store = useStore();

const lang = computed(() => store.getters.lang);
const locale = computed(() => usePage().props.value.locale);
const settings = computed(() => usePage().props.value.settings);

const navigation = computed(() => usePage().props.value.navigation);
const localLang = {
    'sk': {
        'aboutLink': 'O organizácii',
        'whoIsWhoLink': 'Kto je kto',
        'supportLink': 'Kto nás podporuje',
        'bookLink': 'Knižná edícia',
        'webzinLink': 'Feministický webzin',
        'libraryLink': 'Knižnica',
        'legalLink': 'Ochrana osobných údajov',

    },
    'en': {
        'aboutLink': 'About organization',
        'whoIsWhoLink': 'Who is who',
        'supportLink': 'Who support us',
        'bookLink': 'Our books',
        'webzinLink': 'Feminist webzine',
        'libraryLink': 'Library',
        'legalLink': 'Personal detail protection',
    },
};
</script>

<style scoped>

</style>

<script setup>
import {Head, Link, usePage} from '@inertiajs/inertia-vue3';
import MainLayout from '../Layouts/MainLayout.vue'
import {computed} from "vue";

import {PhoneIcon, EnvelopeIcon} from '@heroicons/vue/24/outline';
import SocialLinks from "@/Components/SocialLinks.vue";
import {useStore} from "vuex";

const store = useStore()
const lang = computed(() => store.getters.lang);
const locale = computed(() => usePage().props.value.locale);

</script>

<template>
    <Head title="Kontakt" />
    <main-layout>
        <div class="">
            <div class="my-6 sm:my-4 flex flex-col lg:flex-row">
                <div class="mr-12 w-full lg:w-3/12 text-center lg:text-left mb-8 lg:mb-0">
                    <section class="mb-4 text-xl font-bold">
                        <h1 class="font-bold mb-1 text-sm text-red-500 uppercase">{{lang[locale].contactPageVisitUs}}</h1>
                        <p>ASPEKT</p>
                        <p>Mýtna 38</p>
                        <p>811 07 Bratislava</p>
                    </section>

                    <section class="mb-4 text-sm">
                        <h1 class="font-bold mb-1 text-red-500 uppercase">{{lang[locale].contactPageCallUs}}</h1>
                        <a href="tel:+421252491639" class="hover:underline block">
                            <phone-icon class="mr-1 w-4 h-4 inline-block" />
                            + 421 2 5249 1639
                        </a>
                        <a href="tel:+421918479677" class="hover:underline block">
                            <phone-icon class="mr-1 w-4 h-4 inline-block" />
                            + 421 918 479 677
                        </a>
                    </section>
                    <section class="mb-4 text-sm">
                        <h1 class="font-bold mb-1 text-red-500 uppercase">{{lang[locale].contactPageWriteUs}}</h1>
                        <p class="font-bold">{{lang[locale].contactPageCoordination}}</p>
                        <a href="mailto:administrativa@aspekt.sk" class="text-gray-700 hover:text-gray-800 block">
                            <envelope-icon class="mr-1 w-4 h-4 inline-block" />
                            administrativa@aspekt.sk
                        </a>
                        <a href="mailto:aspekt@aspekt.sk" class="text-gray-700 hover:text-gray-800 block">
                            <envelope-icon class="mr-1 w-4 h-4 inline-block" />
                            aspekt@aspekt.sk
                        </a>
                        <p class="mt-2 font-bold">{{lang[locale].contactPageLibrary}}</p>
                        <a href="mailto:kniznica@aspekt.sk" class="text-gray-700 hover:text-gray-800 block">
                            <envelope-icon class="mr-1 w-4 h-4 inline-block" />
                            kniznica@aspekt.sk
                        </a>
                    </section>
                    <section class="text-sm">
                        <h1 class="font-bold mb-2 text-red-500 uppercase">{{lang[locale].contactPageStayInTouch}}</h1>
                        <div class="text-gray-800 hidden lg:block">
                            <social-links align="left" mode="light"/>
                        </div>
                        <div class="text-gray-800 lg:hidden">
                            <social-links align="center" mode="light"/>
                        </div>
                    </section>
                </div>
                <div class="w-full lg:w-9/12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2661.650064372208!2d17.115207815828487!3d48.15555125788759!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476c894ddaf80adb%3A0x49cb2dcfc9e8f145!2sAspekt!5e0!3m2!1sen!2suk!4v1670441863757!5m2!1sen!2suk" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </main-layout>
</template>

<style scoped>

</style>

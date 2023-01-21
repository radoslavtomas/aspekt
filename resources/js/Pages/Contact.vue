<script setup>
import {Head, Link, usePage} from '@inertiajs/inertia-vue3';
import MainLayout from '../Layouts/MainLayout.vue'
import {computed} from "vue";

import {PhoneIcon, EnvelopeIcon} from '@heroicons/vue/24/outline';
import SocialLinks from "@/Components/SocialLinks.vue";

const lang = computed(() => store.getters.lang);
const locale = computed(() => usePage().props.value.locale);

</script>

<template>
    <Head title="Kontakt" />
    <main-layout>
        <div class="max-w-5xl mx-auto">
<!--            <h1 class="border-b border-gray-300 pb-8 text-3xl text-red-600 font-bold my-8 text-center">-->
<!--                <span class=" pb-2 px-4">Kontakt</span>-->
<!--            </h1>-->
            <div class="my-6 sm:my-4 flex flex-col lg:flex-row">
                <div class="mr-12 w-full lg:w-3/12 text-center lg:text-left mb-8 lg:mb-0">
                    <section class="mb-4 text-xl">
                        <h1 class="font-bold mb-1 text-sm text-red-500 uppercase">Príďte</h1>
                        <p>ASPEKT</p>
                        <p>Mýtna 38</p>
                        <p>Bratislava</p>
                        <p>811 07</p>
                    </section>

                    <section class="mb-4 text-sm">
                        <h1 class="font-bold mb-1 text-red-500 uppercase">Volajte</h1>
                        <a href="tel:+421252491639" class="hover:underline flex items-center">
                            <phone-icon class="mr-1 w-4 h-4" />
                            + 421 2 5249 1639
                        </a>
                        <a href="tel:+421918479677" class="hover:underline flex items-center">
                            <phone-icon class="mr-1 w-4 h-4" />
                            + 421 918 479 677
                        </a>
                    </section>
                    <section class="mb-4 text-sm">
                        <h1 class="font-bold mb-1 text-red-500 uppercase">Píšte</h1>
                        <p class="font-bold">Koordinácia</p>
                        <a href="mailto:administrativa@aspekt.sk" class="flex items-center text-gray-700 hover:text-gray-800">
                            <envelope-icon class="mr-1 w-4 h-4" />
                            administrativa@aspekt.sk
                        </a>
                        <a href="mailto:aspekt@aspekt.sk" class="flex items-center text-gray-700 hover:text-gray-800">
                            <envelope-icon class="mr-1 w-4 h-4" />
                            aspekt@aspekt.sk
                        </a>
                        <p class="mt-2 font-bold">Knižnica</p>
                        <a href="mailto:kniznica@aspekt.sk" class="flex items-center text-gray-700 hover:text-gray-800">
                            <envelope-icon class="mr-1 w-4 h-4" />
                            kniznica@aspekt.sk
                        </a>
                    </section>
                    <section class="text-sm">
                        <h1 class="font-bold mb-1 text-red-500 uppercase">Zostaňte v kontakte</h1>
                        <div class="text-gray-800">
                            <social-links />
                        </div>
                    </section>
                </div>
                <div class="w-full lg:w-9/12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2661.650064372208!2d17.115207815828487!3d48.15555125788759!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476c894ddaf80adb%3A0x49cb2dcfc9e8f145!2sAspekt!5e0!3m2!1sen!2suk!4v1670441863757!5m2!1sen!2suk" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

<!--            <div class="grid grid-cols-1 md:grid-cols-3 gap-0 text-center">-->
<!--                <section class="mb-5">-->
<!--                    <h1 class="text-xl font-bold mb-3">Koordinácia</h1>-->
<!--                    <p class="text-lg mb-1">aspekt@aspekt.sk</p>-->
<!--                    <p class="text-lg mb-1">+ 421 2 5249 1639</p>-->
<!--                    <p class="text-lg mb-1">+ 421 918 479 677</p>-->
<!--                </section>-->
<!--                <section class="mb-5">-->
<!--                    <h1 class="text-xl font-bold mb-3">Administratíva</h1>-->
<!--                    <p class="text-lg mb-1">administrativa@aspekt.sk</p>-->
<!--                </section>-->
<!--                <section>-->
<!--                    <h1 class="text-xl font-bold mb-3">Knižnica</h1>-->
<!--                    <p class="text-lg mb-1">kniznica@aspekt.sk</p>-->
<!--                </section>-->
<!--            </div>-->
        </div>
    </main-layout>
</template>

<style scoped>

</style>

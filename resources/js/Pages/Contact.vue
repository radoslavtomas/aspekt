<script setup>
import { Head, usePage } from '@inertiajs/inertia-vue3'
import MainLayout from '../Layouts/MainLayout.vue'
import { computed } from 'vue'

import { EnvelopeIcon, PhoneIcon } from '@heroicons/vue/24/outline'
import SocialLinks from '@/Components/SocialLinks.vue'
import { useStore } from 'vuex'

const store = useStore()
const lang = computed(() => store.getters.lang)
const locale = computed(() => usePage().props.value.locale)
const settings = computed(() => usePage().props.value.settings)
const navigation = computed(() => usePage().props.value.navigation)
const title = computed(() => navigation.value.find(el => el.route === 'contact')[`name_${locale.value}`])

</script>

<template>
    <Head :title="title"/>
    <main-layout>
        <div class="max-w-[48rem] mx-auto">
            <h1 class="border-b border-gray-300 pb-6 text-2xl md:text-3xl text-red-600 font-bold mt-6 mb-4 text-center">
                {{ title }}
            </h1>
            <!--            <div class="my-6 sm:my-4 flex flex-col lg:flex-row">-->
            <!--                <div class="mr-12 w-full lg:w-3/12 text-center lg:text-left mb-8 lg:mb-0">-->
            <!--                    <section class="mb-8">-->
            <!--                        <h1 class="font-bold mb-1 text-sm text-red-500 uppercase">-->
            <!--                            {{ lang[locale].contactPageVisitUs }}</h1>-->
            <!--                        <p>ASPEKT</p>-->
            <!--                        <p>{{ settings.addressStreet }}</p>-->
            <!--                        <p>{{ `${settings.addressPostalCode} ${settings.addressTown}` }}</p>-->
            <!--                    </section>-->

            <!--                    <section class="mb-8">-->
            <!--                        <h1 class="font-bold mb-1 text-sm text-red-500 uppercase">{{-->
            <!--                                lang[locale].contactPageCallUs-->
            <!--                            }}</h1>-->
            <!--                        <a :href="`tel:${settings.phoneLandline.replace(/\s/g,'')}`" class="hover:underline block">-->
            <!--                            <phone-icon class="mr-1 w-4 h-4 inline-block"/>-->
            <!--                            {{ settings.phoneLandline }}-->
            <!--                        </a>-->
            <!--                        <a :href="`tel:${settings.phoneMobile.replace(/\s/g,'')}`" class="hover:underline block">-->
            <!--                            <phone-icon class="mr-1 w-4 h-4 inline-block"/>-->
            <!--                            {{ settings.phoneMobile }}-->
            <!--                        </a>-->
            <!--                    </section>-->

            <!--                    <section class="mb-8">-->
            <!--                        <h1 class="font-bold mb-1 text-sm text-red-500 uppercase">{{-->
            <!--                                lang[locale].contactPageWriteUs-->
            <!--                            }}</h1>-->
            <!--                        <p class="font-bold">{{ lang[locale].contactPageCoordination }}</p>-->
            <!--                        <a :href="`mailto:${settings.emailAdministration}`"-->
            <!--                           class="text-gray-700 hover:text-gray-800 block">-->
            <!--                            <envelope-icon class="mr-1 w-4 h-4 inline-block"/>-->
            <!--                            {{ settings.emailAdministration }}-->
            <!--                        </a>-->
            <!--                        <a :href="`mailto:${settings.emailAspekt}`" class="text-gray-700 hover:text-gray-800 block">-->
            <!--                            <envelope-icon class="mr-1 w-4 h-4 inline-block"/>-->
            <!--                            {{ settings.emailAspekt }}-->
            <!--                        </a>-->
            <!--                        <p class="mt-2 font-bold">{{ lang[locale].contactPageLibrary }}</p>-->
            <!--                        <a :href="`mailto:${settings.emailLibrary}`" class="text-gray-700 hover:text-gray-800 block">-->
            <!--                            <envelope-icon class="mr-1 w-4 h-4 inline-block"/>-->
            <!--                            {{ settings.emailLibrary }}-->
            <!--                        </a>-->
            <!--                    </section>-->

            <!--                    <section class="text-sm">-->
            <!--                        <h1 class="font-bold mb-2 text-red-500 uppercase">{{ lang[locale].contactPageStayInTouch }}</h1>-->
            <!--                        <div class="text-gray-800 hidden lg:block">-->
            <!--                            <social-links align="left" mode="light"/>-->
            <!--                        </div>-->
            <!--                        <div class="text-gray-800 lg:hidden">-->
            <!--                            <social-links align="center" mode="light"/>-->
            <!--                        </div>-->
            <!--                    </section>-->
            <!--                </div>-->

            <!--                <div class="w-full lg:w-9/12">-->
            <!--                    <iframe-->
            <!--                        allowfullscreen=""-->
            <!--                        height="450" loading="lazy" referrerpolicy="no-referrer-when-downgrade"-->
            <!--                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2661.650064372208!2d17.115207815828487!3d48.15555125788759!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476c894ddaf80adb%3A0x49cb2dcfc9e8f145!2sAspekt!5e0!3m2!1sen!2suk!4v1670441863757!5m2!1sen!2suk"-->
            <!--                        style="border:0;"-->
            <!--                        width="100%"></iframe>-->
            <!--                </div>-->
            <!--            </div>-->


            <div class="mt-8">
                <div class="w-full text-center mb-10 flex flex-col md:flex-row justify-between">
                    <section>
                        <h1 class="font-bold mb-4 text-red-500 uppercase">{{
                                lang[locale].contactPageWriteUs
                            }}</h1>
                        <p class="font-bold">{{ lang[locale].contactPageCoordination }}</p>
                        <a :href="`mailto:${settings.emailAdministration}`"
                           class="text-gray-700 hover:text-gray-800 block">
                            <envelope-icon class="mr-1 w-4 h-4 inline-block"/>
                            {{ settings.emailAdministration }}
                        </a>
                        <a :href="`mailto:${settings.emailAspekt}`" class="text-gray-700 hover:text-gray-800 block">
                            <envelope-icon class="mr-1 w-4 h-4 inline-block"/>
                            {{ settings.emailAspekt }}
                        </a>
                        <p class="mt-4 font-bold">{{ lang[locale].contactPageLibrary }}</p>
                        <a :href="`mailto:${settings.emailLibrary}`" class="text-gray-700 hover:text-gray-800 block">
                            <envelope-icon class="mr-1 w-4 h-4 inline-block"/>
                            {{ settings.emailLibrary }}
                        </a>
                    </section>

                    <section class="mt-12 md:mt-0">
                        <h1 class="font-bold mb-4 text-red-500 uppercase">
                            {{ lang[locale].contactPageVisitUs }}</h1>
                        <p>ASPEKT</p>
                        <p>{{ settings.addressStreet }}</p>
                        <p>{{ `${settings.addressPostalCode} ${settings.addressTown}` }}</p>
                    </section>

                    <section class="mt-12 md:mt-0">
                        <h1 class="font-bold mb-4 text-red-500 uppercase">{{
                                lang[locale].contactPageStayInTouch
                            }}</h1>
                        <a :href="`tel:${settings.phoneLandline.replace(/\s/g,'')}`"
                           class="hover:underline block text-base">
                            <phone-icon class="mr-1 w-4 h-4 inline-block"/>
                            {{ settings.phoneLandline }}
                        </a>
                        <a :href="`tel:${settings.phoneMobile.replace(/\s/g,'')}`" class="hover:underline block">
                            <phone-icon class="mr-1 w-4 h-4 inline-block"/>
                            {{ settings.phoneMobile }}
                        </a>

                        <div class="mt-6">
                            <social-links align="center" mode="light"/>
                        </div>
                    </section>
                </div>

                <div class="w-full mb-4 border border-gray-200 shadow-md">
                    <iframe
                        allowfullscreen=""
                        height="450" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2661.650064372208!2d17.115207815828487!3d48.15555125788759!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476c894ddaf80adb%3A0x49cb2dcfc9e8f145!2sAspekt!5e0!3m2!1sen!2suk!4v1670441863757!5m2!1sen!2suk"
                        style="border:0;"
                        width="100%"></iframe>
                </div>
            </div>
        </div>
    </main-layout>
</template>

<style scoped>

</style>

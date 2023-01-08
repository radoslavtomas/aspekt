<template>
    <footer class="bg-gray-800 w-full">
        <div class="container-aspekt mx-auto text-white text-sm">
            <div class="py-8 px-4 grid grid-cols-1 md:grid-cols-3 gap-4 text-center">
                <div class="p-6 flex flex-col">
                    <h3 class="text-lg mb-4 uppercase">{{lang[locale].footerColumn1Title}}</h3>

                    <p>Mýtna 38</p>
                    <p>811 07</p>
                    <p class="mb-4">Bratislava</p>
                    <a href="tel:+421252491639" class="mb-4">+421 2 5249 1639</a>
                    <a class="" href="mailto:aspekt@aspekt.sk">aspekt@aspekt.sk</a>
                    <a class="mb-6" href="/">www.aspekt.sk</a>
                    <div class="flex justify-center items-center gap-4">
                        <a target="_blank" href="https://www.facebook.com/feministickaorganizaciaaspekt">
                            <img src="/assets/img/facebook.png" alt="facebook" class="w-6 h-auto">
                        </a>
                        <a target="_blank" href="https://www.instagram.com/aspekt_organizacia/">
                            <img src="/assets/img/instagram.png" alt="instagram" class="w-6 h-auto">
                        </a>
                        <a target="_blank" href="https://www.aspekt.sk/">
                            <img src="/assets/img/link.png" alt="link" class="w-6 h-auto">
                        </a>
                    </div>
                </div>

                <div class="p-6 flex flex-col gap-1">
                    <h3 class="text-lg mb-4 uppercase">{{lang[locale].footerColumn2Title}}</h3>
                    <Link :href="route('home')">{{navigation[0][`name_${locale}`]}}</Link>
                    <Link :href="route('about', 'co-je-aspekt')">{{navigation[1][`name_${locale}`]}}</Link>
                    <Link :href="route('books', 'vsetko')">{{navigation[2][`name_${locale}`]}}</Link>
                    <Link :href="route('aspektin', 'vsetko')">{{navigation[3][`name_${locale}`]}}</Link>
                    <Link :href="route('library', 'o-kniznici-aspektu')">{{navigation[4][`name_${locale}`]}}</Link>
                    <Link :href="route('contact')">{{navigation[5][`name_${locale}`]}}</Link>
                    <Link :href="route('njuvinky', 'vsetko')">{{navigation[6][`name_${locale}`]}}</Link>
                </div>

                <div class="p-6 flex flex-col items-center">
                    <h3 class="text-lg mb-4 uppercase">{{lang[locale].footerColumn3Title}}</h3>
                    <p>{{lang[locale].footerDescriptionLine1}}</p>
                    <p class="">{{lang[locale].footerDescriptionLine2}}</p>

                    <section class="my-8 w-40">
                        <article class="mb-4 p-3 shadow-md border border-gray-300 bg-white">
                            <a href="http://glosar.aspekt.sk/" target="_blank">
                                <img class="w-48 mx-auto" src="/assets/img/glosar.png" alt="glosar rodovej terminologie">
                            </a>
                        </article>

                        <article class="p-3 shadow-md border border-gray-300 bg-white">
                            <a href="http://www.ruzovyamodrysvet.sk/" target="_blank">
                                <img class="w-48 mx-auto" src="/assets/img/ruzovysvet.png" alt="ruzovy a modry svet">
                            </a>
                        </article>
                    </section>

                    <p>{{lang[locale].footerDescriptionLine3}}</p>
                </div>
            </div>

        </div>
    </footer>
</template>

<script setup>
import {computed} from "vue";
import {Link, usePage} from "@inertiajs/inertia-vue3";
import {useStore} from "vuex";

const store = useStore();

const lang = computed(() => store.getters.lang);
const locale = computed(() => usePage().props.value.locale);

const navigation = computed(() => usePage().props.value.navigation);
</script>

<style scoped>

</style>

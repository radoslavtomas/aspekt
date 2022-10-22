<script setup>
import {computed, onMounted} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";

import BasketWidget from "../Components/BasketWidget.vue";
import MainLayout from '../Layouts/MainLayout.vue'
import Breadcrumbs from '../Components/Breadcrumbs.vue';

const locale = computed(() => usePage().props.value.locale)
const page = computed(() => usePage().props.value.page)
const breadcrumbsId = computed(() => usePage().props.value.breadcrumbs_id)

const title = computed(() => page.value[`name_${locale.value}`])
const body = computed(() => page.value[`body_${locale.value}`])

onMounted(() => console.log(page.value))
</script>

<template>
    <main-layout>
        <Breadcrumbs :id="breadcrumbsId" />

        <h1 class="border-b border-gray-300 pb-8 text-3xl md:text-4xl text-red-600 font-bold my-8 text-center">
            <span class=" pb-2 px-4">{{title}}</span>
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-12 gap-0 md:gap-8">
            <div class="col-span-12 md:col-span-8 lg:col-span-9">
                <div class="content" v-html="body"></div>
            </div>

            <div class="col-span-12 md:col-span-4 lg:col-span-3">
                <div class="sticky top-6">
                    <article class="text-center p-3 shadow-md border border-gray-300 mt-4">
                        <a href="#">
                            <h5 class="uppercase font-bold text-pink-600 text-gradient">
                                Archív ňjuvinky
                            </h5>
                            <p class="text-xs">Aspektovský newsletter</p>
                        </a>
                    </article>

                    <article class="p-3 shadow-md border border-gray-300 mt-4 flex flex-col justify-center items-center">
                        <h4 class="text-xl text-pink-600 text-center">
                            Aspektovské knihy pár klikov od vás
                        </h4>
                        <button class="bg-pink-500 hover:bg-pink-600 text-xs text-white my-3 py-1 px-5 rounded shadow-md">
                            <a href="#">E-knihy</a>
                        </button>
                        <p class="text-sm">
                            Takmer dve desiatky aspektovských kníh si môžete objedať aj v elektronickej podobe. Vo forme e-kníh nájdete rozhovor Jany Juráňovej s Agnešou Kalinovou, preklad knihy bell hooks, analýzu účasti žien v Nežnej revolúcii, feministický pohľad na literatúru, ale aj beletristické knihy Jany Juráňovej, Ireny Brežnej, Slavenky Drakulić, Jany Bodnárovej, Barbory Hrínovej, Etely Farkašovej, Jaroslavy Blažkovej či Diany Athill.
                        </p>
                    </article>

                    <article class="p-3 shadow-md border border-gray-300 mt-4">
                        <a href="http://glosar.aspekt.sk/" target="_blank">
                            <img class="w-48 mx-auto" src="/assets/img/glosar.png" alt="glosar rodovej terminologie">
                        </a>
                    </article>

                    <article class="p-3 shadow-md border border-gray-300 mt-4">
                        <a href="http://www.ruzovyamodrysvet.sk/" target="_blank">
                            <img class="w-48 mx-auto" src="/assets/img/ruzovysvet.png" alt="ruzovy a modry svet">
                        </a>
                    </article>
                </div>
            </div>
        </div>

    </main-layout>

    <basket-widget />
</template>

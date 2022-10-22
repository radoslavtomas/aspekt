<script setup>
import BasketWidget from "../Components/BasketWidget.vue";
import MainLayout from '../Layouts/MainLayout.vue'
import {computed, onMounted} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";

const locale = computed(() => usePage().props.value.locale)
const page = computed(() => usePage().props.value.page)

const title = computed(() => page.value[`name_${locale.value}`])
const body = computed(() => page.value[`body_${locale.value}`])

onMounted(() => console.log(page.value))
</script>

<template>
    <main-layout>
        <h1 class="text-3xl md:text-4xl text-red-600 font-bold my-8 text-center">
            <span class="border-b-2 pb-2 px-4 border-red-600">{{title}}</span>
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-12 gap-0 md:gap-8">
            <div class="col-span-12 md:col-span-8 lg:col-span-9">
                <div class="content" v-html="body"></div>
            </div>

            <div class="col-span-12 md:col-span-4 lg:col-span-3">
                <div class="sticky top-6">
                    <article class="p-3 rounded-md shadow-xl border-2 border-pink-600 mt-4">
                        <h4 class="text-xl text-pink-600 text-center">
                            Aspektovské knihy pár klikov od vás
                        </h4>
                        <button class="w-full bg-pink-600 hover:bg-pink-700 text-white my-3 py-3 rounded">
                            <a href="#">E-knihy</a>
                        </button>
                        <p class="text-sm">
                            Takmer dve desiatky aspektovských kníh si môžete objedať aj v elektronickej podobe. Vo forme e-kníh nájdete rozhovor Jany Juráňovej s Agnešou Kalinovou, preklad knihy bell hooks, analýzu účasti žien v Nežnej revolúcii, feministický pohľad na literatúru, ale aj beletristické knihy Jany Juráňovej, Ireny Brežnej, Slavenky Drakulić, Jany Bodnárovej, Barbory Hrínovej, Etely Farkašovej, Jaroslavy Blažkovej či Diany Athill.
                        </p>
                    </article>

                    <article class="p-3 rounded-md shadow-xl border-2 border-pink-600 mt-4">
                        <a href="http://glosar.aspekt.sk/">
                            <img class="w-48 mx-auto" src="/assets/img/glosar.png" alt="glosar rodovej terminologie">
                        </a>
                    </article>

                    <article class="p-3 rounded-md shadow-xl border-2 border-pink-600 mt-4">
                        <a href="http://www.ruzovyamodrysvet.sk/">
                            <img class="w-48 mx-auto" src="/assets/img/ruzovysvet.png" alt="ruzovy a modry svet">
                        </a>
                    </article>

                    <article class="text-center p-3 rounded-md shadow-xl border-2 border-pink-600 mt-4">
                        <a href="http://www.ruzovyamodrysvet.sk/">
                            <h5 class="uppercase font-bold text-pink-600 text-gradient">
                                Archív ňjuvinky
                            </h5>
                            <p class="text-xs">Aspektovský newsletter</p>
                        </a>
                    </article>
                </div>
            </div>
        </div>

    </main-layout>

    <basket-widget />
</template>

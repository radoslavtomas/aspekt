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
        <div class="grid grid-cols-1 md:grid-cols-12 gap-4 mt-8">
            <div class="col-span-9 ">
                <h1 class="text-3xl text-red-600 font-bold mb-4 text-center">{{title}}</h1>
                <div v-html="body"></div>
            </div>

            <div class="col-span-3">
                Prvá feministická organizácia na Slovensku ASPEKT sa oficiálne zaregistrovala v roku 1993 ako Záujmové združenie žien Aspekt. V tomto roku vyšlo aj prvé číslo feministického kultúrneho časopisu Aspekt, ktorý bol ako slovensko-české médium prvým feministickým časopisom v bývalom Československu a dnes pokračuje ako webzin ASPEKTin. Naša organizácia sa ako nositeľka množstva vzdelávacích a publikačných projektov od svojich začiatkov zameriava na rodovú senzibilizáciu spoločnosti. V roku 1996 sme založili knižnú edíciu, v ktorej dodnes vyšlo viac ako 110 titulov. Už 20 rokov ASPEKT usporadúva vzdelávacie podujatia, spravuje knižnicu, poskytuje odborné konzultácie, realizuje výskumné projekty, prevádzkuje materiálovo bohaté webové stránky, podieľa sa na formovaní rodovo citlivého jazyka, spolu pracuje s inými médiami a domácimi i zahraničnými organizáciami. Je jednou zo zakladajúcich organizácií iniciatív

                Možnosť voľby (za dodržiavanie ľudských práv žien a detí)

                Piata žena (proti násiliu páchanému na ženách)
            </div>
        </div>

    </main-layout>

    <basket-widget />
</template>

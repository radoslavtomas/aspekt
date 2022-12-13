<template>
    <section class="bg-gray-200 mt-8 px-4 pt-8 pb-10 rounded shadow-lg">
        <div class="text-center">
            <h5 class="uppercase font-bold text-pink-600 text-gradient">
                Ňjuvinky
            </h5>
            <p class="text-xs">Aspektovský newsletter</p>

            <p class="text-xs italic mt-4 w-full sm:w-2/3 mx-auto">
                Ňjuvinky prinášajú informácie o zaujímavých článkoch vo webzine ASPEKTin, o nových knihách v knižnici ASPEKTu a o ďalších aktualitách z našich webových rubrík aj ASPEKTovských priestorov priamo do emailovej schránky.</p>
        </div>

        <div class="flex justify-center items-center flex-col sm:flex-row max-w-screen-sm mx-auto mt-8">
            <label class="block w-full sm:w-auto flex-1 mb-4 sm:mb-0">
                <input type="email"
                       name="subscribe_email"
                       placeholder="Email"
                       v-model="subscribe_email"
                       class="text-sm py-2.5 block w-full shadow-sm">
            </label>

            <button type="submit" class="text-sm text-white text-center px-4 py-2.5 shadow-sm border border-pink-500 bg-pink-500 hover:bg-pink-600">
                Prihlás sa <HandThumbUpIcon class="w-4 h-4 ml-1 inline" />
            </button>
        </div>

        <div class="flex items-center justify-center mt-2 text-green-700 max-w-screen-sm mx-auto text-sm text-center">Skvelé! Úspešne ste sa zaregistrovali. <CheckIcon class="w-4 h-4 ml-1 inline" /></div>
        <div class="flex items-center justify-center mt-2 text-red-700 max-w-screen-sm mx-auto text-sm text-center">Niekde sa stala chyba, nepodarilo sa nám zaregistrovať vás. Prosím, skúste to neskôr.</div>
    </section>
</template>

<script setup>
import {HandThumbUpIcon, CheckIcon} from '@heroicons/vue/24/outline';
import {ref} from "vue";

const subscribe_email = ref('');
</script>

<style scoped>

</style>

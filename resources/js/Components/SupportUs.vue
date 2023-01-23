<template>
<!--<section class="container-aspekt flex justify-center items-center md:justify-end my-4 sm:my-2">-->

<!--    <a class="rounded text-white text-xs text-center px-4 py-2 shadow-md block bg-pink-500 hover:bg-pink-600 relative" href="https://aspekt.darujme.sk/prispevok-k-feministickej-buducnosti-3470e/"-->
<!--        target="_blank">-->
<!--            <span class="relative text-white">-->
<!--                {{lang[locale].supportUs}}-->
<!--            </span>-->
<!--    </a>-->
<!--</section>-->
    <section class="p-4">
        <div class="text-center">
            <h5 class="uppercase font-bold text-pink-600 text-gradient mb-8">
                Podporte nas
            </h5>
<!--            <p class="text-xs">{{lang[locale].njuvinkySubtitle}}</p>-->

            <p class="text-xs italic mt-4 w-full mx-auto">
                Paci sa Vam nasa praca? Aj nam. Navyse, myslime si, ze je dolezita. Nezaplati sa vsak sama a vlada na nas kasle. Vy nemusite :)
            </p>
        </div>

        <div class="flex justify-center items-center flex-col sm:flex-row max-w-screen-sm mx-auto mt-8">
            <button type="submit" class="text-sm text-white text-center px-4 py-2.5 shadow-sm border border-pink-500 bg-pink-500 hover:bg-pink-600">
                Podporte nas <HeartIcon class="w-4 h-4 ml-1 inline" />
            </button>
        </div>

        <!--        <div class="flex items-center justify-center mt-2 text-green-700 max-w-screen-sm mx-auto text-sm text-center">{{lang[locale].njuvinkyRegistrationSuccess}}<CheckIcon class="w-4 h-4 ml-1 inline" /></div>-->
        <!--        <div class="flex items-center justify-center mt-2 text-red-700 max-w-screen-sm mx-auto text-sm text-center">{{lang[locale].njuvinkyRegistrationError}}</div>-->
    </section>
</template>

<script setup>
import {computed} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";
import {HeartIcon} from '@heroicons/vue/24/outline';
import {useStore} from "vuex";

const store = useStore();
const lang = computed(() => store.getters.lang);
const locale = computed(() => usePage().props.value.locale);
</script>

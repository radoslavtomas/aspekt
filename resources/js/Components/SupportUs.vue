<template>
<!--<section class="container-aspekt flex justify-center items-center md:justify-end my-4 sm:my-2">-->

<!--    <a class="rounded text-white text-xs text-center px-4 py-2 shadow-md block bg-pink-500 hover:bg-pink-600 relative" href="https://aspekt.darujme.sk/prispevok-k-feministickej-buducnosti-3470e/"-->
<!--        target="_blank">-->
<!--            <span class="relative text-white">-->
<!--                {{lang[locale].supportUs}}-->
<!--            </span>-->
<!--    </a>-->
<!--</section>-->
    <div class="mt-8 border border-gray-100 rounded shadow-md relative overflow-hidden">
        <div class="p-4 flex flex-row justify-center">
            <section class="p-2 flex items-center">
                <div class="flex justify-center items-center flex-col xl:flex-row mr-36 xl:mr-0">
                    <div class="text-center mb-1 xl:mr-4 xl:mb-0">
                        <h5 class="font-bold text-pink-600">
                            Paci sa Vam nasa praca? Podporte nas!
                        </h5>
                    </div>

                    <div class="flex justify-center items-center flex-col sm:flex-row max-w-screen-sm mx-auto z-10">
                        <button type="submit" class="text-sm text-white text-center px-3 py-1.5 shadow-sm border border-pink-500 bg-pink-500 hover:bg-pink-600 rounded">
                            Prispevok k feministickej buducnosti <ArrowTopRightOnSquareIcon class="w-4 h-4 ml-1 inline" />
                        </button>
                    </div>
                </div>

                <img src="/assets/img/cat_with_eyes.gif" class="absolute w-28 h-auto right-32 md:right-46 lg:right-44 top-4 xl:-top-2" alt="">
            </section>
        </div>
    </div>

</template>

<script setup>
import {computed} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";
import {ArrowTopRightOnSquareIcon} from '@heroicons/vue/24/outline';
import {useStore} from "vuex";

const store = useStore();
const lang = computed(() => store.getters.lang);
const locale = computed(() => usePage().props.value.locale);
</script>

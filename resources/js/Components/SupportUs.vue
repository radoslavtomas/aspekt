<template>
    <div class="mt-8 border border-pink-200 rounded shadow-md relative overflow-hidden">
        <div class="p-4 flex flex-row justify-center">
            <section class="p-2 flex items-center">
                <div class="flex justify-center items-center flex-col xl:flex-row mr-0 xl:mr-0">
                    <div class="text-center mb-1 xl:mr-4 xl:mb-0">
                        <h5 class="font-bold text-pink-600">
                            Páči sa Vám naša práca? <span class="hidden sm:inline-block">Podporte nás!</span>
                        </h5>
                    </div>

                    <div class="flex justify-center items-center flex-col sm:flex-row max-w-screen-sm mx-auto z-10">
                        <a
                            href="https://aspekt.darujme.sk/prispevok-k-feministickej-buducnosti-3470e/"
                            target="_blank"
                            class="text-sm text-white text-center px-3 py-1.5 shadow-sm border border-pink-500 bg-pink-500 hover:bg-pink-600 rounded"
                        >
                            <span class="hidden sm:inline-block">Príspevok k feministickej budúcnosti</span>
                            <span class="sm:hidden">Podporte nás!</span>
                            <ArrowTopRightOnSquareIcon class="w-4 h-4 ml-1 inline" />
                        </a>
                    </div>
                </div>

                <img src="/assets/img/cat_with_eyes.gif" class="absolute w-20 h-auto right-0 sm:right-16 md:right-46 lg:right-44 top-11 xl:top-4" alt="">
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

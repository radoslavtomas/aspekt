<template>
    <section class="bg-gray-200 mt-8 px-4 pt-8 pb-10 sm:rounded shadow-lg">
        <div class="text-center">
            <h5 class="uppercase font-bold text-pink-600 text-gradient">
                {{lang[locale].njuvinkyTitle}}
            </h5>
            <p class="text-xs">{{lang[locale].njuvinkySubtitle}}</p>

            <p class="text-xs italic mt-4 w-full sm:w-2/3 mx-auto">
                {{lang[locale].njuvinkyDescription}}</p>
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
                {{lang[locale].njuvinkySubscribeButton}} <HandThumbUpIcon class="w-4 h-4 ml-1 inline" />
            </button>
        </div>

        <div class="flex items-center justify-center mt-2 text-green-700 max-w-screen-sm mx-auto text-sm text-center">{{lang[locale].njuvinkyRegistrationSuccess}}<CheckIcon class="w-4 h-4 ml-1 inline" /></div>
        <div class="flex items-center justify-center mt-2 text-red-700 max-w-screen-sm mx-auto text-sm text-center">{{lang[locale].njuvinkyRegistrationError}}</div>
    </section>
</template>

<script setup>
import {HandThumbUpIcon, CheckIcon} from '@heroicons/vue/24/outline';
import {computed, ref} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";
import {useStore} from "vuex";

const store = useStore();

const lang = computed(() => store.getters.lang);
const locale = computed(() => usePage().props.value.locale);

const subscribe_email = ref('');
</script>

<style scoped>

</style>

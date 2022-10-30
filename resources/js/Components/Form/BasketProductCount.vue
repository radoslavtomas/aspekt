<template>
    <div class="flex justify-start items-center">
        <div class="h-full flex justify-start items-center">
            <div class="border border-r-0 border-gray-300 rounded-l w-7 h-7 flex justify-center items-center">
                <TrashIcon v-if="count === 1" class="h-4 w-4 text-red-500 hover:text-red-600 cursor-pointer" />
                <MinusIcon v-else @click="decrementProductCount" class="h-4 w-4 text-red-500 hover:text-red-600 cursor-pointer" />
            </div>
            <label class="block">
                <input :value="count" type="tel" class="
                                    text-sm
                                    text-center
                                    h-7
                                    w-12
                                    block
                                    w-full
                                    border-gray-300
                                    shadow-sm
                                    focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </label>
            <div class="border border-l-0 border-gray-300 rounded-r w-7 h-7 flex justify-center items-center">
                <PlusIcon @click="incrementProductCount" class="h-4 w-4 text-teal-600 hover:text-teal-700 cursor-pointer" />
            </div>
        </div>
    </div>
</template>

<script setup>
import {ref} from 'vue';

import { TrashIcon, PlusIcon, MinusIcon } from '@heroicons/vue/24/outline';

const count = ref(1)

const incrementProductCount = () => count.value++;
const decrementProductCount = () => count.value--;
</script>

<style scoped>

</style>

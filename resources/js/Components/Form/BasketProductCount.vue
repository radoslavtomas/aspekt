<template>
    <div class="flex justify-start items-center">
        <div class="h-full flex justify-start items-center">
            <div class="border border-r-0 border-gray-300 rounded-l w-7 h-7 flex justify-center items-center">
                <TrashIcon v-if="props.qty === 1" @click="removeBookFromBasket" class="h-4 w-4 text-red-500 hover:text-red-600 cursor-pointer" />
                <MinusIcon v-else @click="decrementBookCount" class="h-4 w-4 text-red-500 hover:text-red-600 cursor-pointer" />
            </div>
            <label class="block">
                <input
                    :value="props.qty"
                    type="tel"
                    @input="incrementBookCountBy"
                    @blur="handleBlur"
                    ref="productCount"
                    class="
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
                <PlusIcon @click="incrementBookCount" class="h-4 w-4 text-teal-600 hover:text-teal-700 cursor-pointer" />
            </div>
        </div>
    </div>
</template>

<script setup>
import {ref} from 'vue';
import {useStore} from "vuex";

import { TrashIcon, PlusIcon, MinusIcon } from '@heroicons/vue/24/outline';

const store = useStore()

const props = defineProps({
    'book_id': Number,
    'qty': Number
})

const productCount = ref(null);

const incrementBookCount = () => store.dispatch('incrementBookCount', { 'book_id': props.book_id });
const incrementBookCountBy = (event) => {
    let qty = parseInt(event.target.value);

    if(isNaN(qty)) {
        qty = props.qty;
    }

    store.dispatch('incrementBookCountBy', {
        'book_id': props.book_id,
        qty
    })
};
const handleBlur = (event) => {
    let qty = event.target.value;

    if(isNaN(qty) || !Number.isInteger(qty)) {
        productCount.value.value = props.qty;
    }
}
const decrementBookCount = () => store.dispatch('decrementBookCount', { 'book_id': props.book_id });
const removeBookFromBasket = () => store.dispatch('removeBookFromBasket', { 'book_id': props.book_id });
</script>

<style scoped>

</style>

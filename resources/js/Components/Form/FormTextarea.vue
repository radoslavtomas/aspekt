<template>
    <label class="block">
        <span class="text-gray-700 text-sm">{{props.title}}</span>
        <textarea
            @input="updateValue"
            :value="modelValue"
            class="
                mt-1
                text-sm
                block
                w-full
                rounded-md
                border-gray-300
                shadow-sm"
            :class="props.errors ?
               'border-red-500 focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50':
               'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'"
            rows="3"></textarea>
    </label>
    <span v-if="props.errors">
            <span class="text-xs text-red-600" v-if="props.errors.$uid.includes('-maxLength')">{{lang[locale].maxLength}}</span>
        </span>
</template>

<script setup>
import {computed} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";
import {useStore} from "vuex";

const emit = defineEmits(['update:modelValue'])

const store = useStore()
const lang = computed(() => store.getters.lang);
const locale = computed(() => usePage().props.value.locale);

const updateValue = (event) => {
    emit('update:modelValue', event.target.value)
}

const props = defineProps({
    title: String,
    name: String,
    errors: Object|null,
    placeholder: String,
    modelValue: String
})
</script>

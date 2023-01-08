<template>
    <label class="block mb-2.5">
        <span v-if="props.title" class="text-sm text-gray-700 pl-1">{{props.title}}</span>
        <input :type="props.type"
               :name="props.name"
               :value="modelValue"
               @input="updateValue"
               class="
                    text-sm
                    py-1.5
                    block
                    w-full
                    rounded-md
                    shadow-sm
                    placeholder:italic placeholder:text-slate-400"
               :class="props.errors ?
               'border-red-500 focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50':
               'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'"
               :placeholder="props.placeholder">
        <span v-if="props.errors">
            <span class="text-xs text-red-600" v-if="props.errors.$uid.includes('-required')">{{lang[locale].eshopValidationRequired}}</span>
            <span class="text-xs text-red-600" v-if="props.errors.$uid.includes('-email')">{{lang[locale].eshopValidationEmail}}</span>
            <span class="text-xs text-red-600" v-if="props.errors.$uid.includes('-maxLength')">{{lang[locale].eshopValidationMaxLength}}</span>
        </span>
    </label>
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
    type: {
        type: String,
        default: 'text'
    },
    name: String,
    errors: Object|null,
    placeholder: String,
    modelValue: String
})

</script>

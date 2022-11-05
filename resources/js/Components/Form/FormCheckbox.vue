<template>
    <label class="inline-flex items-center">
        <input
            type="checkbox"
            :checked="modelValue"
            @input="updateValue"
            class="
              rounded
              border-gray-300
              text-fuchsia-600
              shadow-sm
              focus:border-indigo-300
              focus:ring
              focus:ring-offset-0
              focus:ring-indigo-200
              focus:ring-opacity-50
            ">
        <span class="ml-2 text-sm">{{props.title}}</span>
    </label>
</template>

<script setup>
const props = defineProps({
    title: String,
    modelValue: Boolean
})

const emit = defineEmits(['update:modelValue'])
const updateValue = (event) => {
    emit('update:modelValue', event.target.checked)
}
</script>

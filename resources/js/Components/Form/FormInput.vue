<template>
    <label class="block">
        <span v-if="props.title" class="text-xs text-gray-700 pl-1">{{props.title}}</span>
        <input :type="props.type" class="

                    text-sm
                    py-1.5
                    block
                    w-full
                    rounded-md
                    border-gray-300
                    shadow-sm
                    focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
               :placeholder="props.placeholder">
    </label>
</template>

<script setup>
const props = defineProps({
    title: String,
    type: {
        type: String,
        default: 'text'
    },
    placeholder: String
})
</script>


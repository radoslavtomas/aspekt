<template>
    <label :for="props.name" class="block mb-2.5">
        <span v-if="props.title" class="text-sm text-gray-700">{{props.title}}</span>
        <select :name="props.name" class="
                    block
                    text-sm
                    w-full
                    mt-1
                    rounded-md
                    border-gray-300
                    shadow-sm
                    focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50
                  ">
            <option
                class="text-sm"
                v-for="option in options"
                :value="option.value"
                :key="option.value">
                {{option.description}}
            </option>
        </select>
    </label>
</template>

<script setup>
const props = defineProps({
    title: String,
    type: {
        type: String,
        default: 'text'
    },
    name: String,
    options: Array
})
</script>

<style scoped>

</style>

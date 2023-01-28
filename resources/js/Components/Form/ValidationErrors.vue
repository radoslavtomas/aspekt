<template>
    <span
        class="text-xs text-red-600"
        v-if="props.error.includes('-required')">
        {{lang[locale].eshopValidationRequired}}
    </span>
    <span
        class="text-xs text-red-600"
        v-if="props.error.includes('-email')">
                {{lang[locale].eshopValidationEmail}}
            </span>
    <span
        class="text-xs text-red-600"
        v-if="props.error.includes('-maxLength')">
        {{lang[locale].eshopValidationMaxLength}}
    </span>
</template>

<script setup>
import {useStore} from "vuex";
import {computed} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";

const store = useStore()
const lang = computed(() => store.getters.lang);
const locale = computed(() => usePage().props.value.locale);

const props = defineProps({
    error: String
})
</script>

<style scoped>

</style>

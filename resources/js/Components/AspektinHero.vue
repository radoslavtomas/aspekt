<template>
    <div class="text-purple-800 aspektin text-center p-4">
        <h1 class="text-3xl font-bold tracking-widest">A S P E K T i n</h1>

        <h5 class="text-sm tracking-wider font-bold" v-html="lang[locale].subtitle"></h5>
    </div>
</template>

<script setup>
import { computed } from 'vue'
import { usePage } from '@inertiajs/inertia-vue3'

const locale = computed(() => usePage().props.value.locale)
const lang = {
    sk: {
        subtitle: 'f e m i n i s t i c k ý&nbsp;&nbsp;&nbsp;w e b z i n'
    },
    en: {
        subtitle: 'f e m i n i s t&nbsp;&nbsp;&nbsp;w e b z i n e'
    }
}
</script>

<style scoped>

</style>

<template>
    <a :href="link.link"
       class="flex items-center text-sm bg-slate-300 hover:bg-slate-400 px-3 py-2 shadow-xl rounded mb-3 last:mb-0"
       target="_blank">
        {{ link.eshop_name }}

        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
             xmlns="http://www.w3.org/2000/svg">
            <path d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </a>
</template>

<script setup>

// const store = useStore()
// const lang = computed(() => store.getters.lang)
// const locale = computed(() => usePage().props.value.locale)

const props = defineProps({
    link: Object
})

</script>

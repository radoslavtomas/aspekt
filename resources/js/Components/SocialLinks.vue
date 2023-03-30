<template>
    <div :class="alignClass" class="flex items-center gap-4">
        <a
            v-for="icon in icons"
            :key="icon.id"
            class="flex justify-center items-center w-7 h-7 rounded-full border border-1"
            :class="modeClass"
            target="_blank"
            :href="icon.link">
                <font-awesome-icon :icon="icon.icon" />
        </a>
    </div>
</template>
<script setup>
import {computed, onMounted, ref} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";

const settings = computed(() => usePage().props.value.settings);

onMounted(() => {
    icons.value.facebook.link = settings.value.linkFacebook ? settings.value.linkFacebook : '';
    icons.value.instagram.link = settings.value.linkInstagram ? settings.value.linkInstagram : '';
})

const props = defineProps({
    align: {
        type: String,
        default: 'center'
    },
    mode: {
        type: String,
        default: 'dark'
    }
})

let icons = ref({
    'facebook': {
        id: 'facebook',
        link: '',
        icon: 'fa-brands fa-facebook'
    },
    'instagram': {
        id: 'instagram',
        link: '',
        icon: 'fa-brands fa-instagram'
    },
    'web': {
        id: 'web',
        link: 'https://www.aspekt.sk/',
        icon: 'fa-solid fa-link'
    }
})

const alignClass = computed(() => {
    switch (props.align) {
        case 'center':
            return 'justify-center';
        case 'left':
            return 'justify-start';
        case 'right':
            return 'justify-end';
        default:
            return 'justify-center';
    }
});

const modeClass = computed(() => {
    switch (props.mode) {
        case 'light':
            return 'border-gray-800';
        case 'dark':
            return 'border-white';
        default:
            return 'border-gray-400';
    }
});
</script>

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
import {computed} from "vue";

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

const icons = [
    {
        id: 'facebook',
        link: 'https://www.facebook.com/feministickaorganizaciaaspekt',
        icon: 'fa-brands fa-facebook'
    },
    {
        id: 'instagram',
        link: 'https://www.instagram.com/aspekt_organizacia/',
        icon: 'fa-brands fa-instagram'
    },
    {
        id: 'link',
        link: 'https://www.aspekt.sk/',
        icon: 'fa-solid fa-link'
    }
]

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

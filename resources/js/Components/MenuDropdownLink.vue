<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import {computed} from "vue";

const props = defineProps({
    mobile: {
        default: false
    },
});

const mobileClasses = computed(() => {
    if (props.mobile) {
        return 'text-left ml-3 text-xs py-1';
    } else {
        return 'text-center text-sm py-3 uppercase';
    }
});
</script>

<template>
    <Link class="block w-full px-4 leading-5 font-bold focus:outline-none focus:bg-red-100 transition duration-150 ease-in-out" :class="mobileClasses">
        <span class="text-red-600 border-b-4 border-transparent hover:border-red-600 hover:text-red-700transition duration-50 ease-in-out">
            <slot />
        </span>
    </Link>
</template>

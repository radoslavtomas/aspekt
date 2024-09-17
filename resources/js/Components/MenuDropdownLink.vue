<script setup>
import { Link } from '@inertiajs/inertia-vue3'
import { computed } from 'vue'

const props = defineProps({
    mobile: {
        type: Boolean,
        default: false
    },
    blank: {
        type: Boolean,
        default: false
    },
    href: {
        type: String
    }
})

const mobileClasses = computed(() => {
    if (props.mobile) {
        return 'ml-3 text-xs py-1'
    } else {
        return 'text-center text-sm py-3 uppercase'
    }
})
</script>

<template>
    <a v-if="blank"
       :class="mobileClasses"
       :href="href"
       class="block w-full px-4 leading-5 tracking-normal font-bold focus:outline-none focus:bg-red-100 transition duration-150 ease-in-out"
       target="_blank">
            <span
                class="text-red-600 border-b-4 border-transparent hover:border-red-600 hover:text-red-700 transition duration-50 ease-in-out">
                <slot/>
            </span>
    </a>
    <Link
        v-else
        :class="mobileClasses"
        :href="href"
        class="block w-full px-4 leading-5 font-bold focus:outline-none focus:bg-red-100 transition duration-150
        ease-in-out">
        <span
            class="text-red-600 border-b-4 border-transparent hover:border-red-600 hover:text-red-700 transition duration-50 ease-in-out">
            <slot/>
        </span>
    </Link>
</template>

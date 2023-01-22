<template>
<div class="relative w-full h-7 overflow-hidden">
    <span :class="positionClass" class="absolute border-b border-gray-400">
        <img  class="peekaboo h-7" src="/assets/img/cats_small.gif" alt="cats_winking">
    </span>
</div>
</template>

<script setup>
import {onMounted, onUnmounted, ref} from "vue";

const intervalID = ref(null);
const positionClass = ref('left-0');

const classes = [
    'left-0',
    'left-0 ml-20',
    'left-0 ml-40',
    'left-0 ml-60',
    'right-0 mr-20',
    'right-0 mr-40',
    'right-0 mr-60',
    'right-0',
];

onMounted(() => {
    intervalID.value = setInterval(() => {
        positionClass.value = classes[Math.floor(Math.random() * classes.length)]
    }, 10000)
})

onUnmounted(() => {
    clearInterval(intervalID.value);
})
</script>

<style scoped>
.peekaboo {
    animation: peekaboo 10s linear infinite;
    transform: translateY(100%);
}

@keyframes peekaboo {
    10% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(15%);
    }

    65% {
        transform: translateY(0);
    }

    85% {
        transform: translateY(20%);
    }

    100% {
        transform: translateY(110%);
    }
}
</style>

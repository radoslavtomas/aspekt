<template>
    <section class="my-4">
        <Separator :title="lang[locale].homePageFeaturedEventsTitle" margin/>

        <!--        <div class="mt-8 border-4 border-teal-200 p-3">-->
        <div v-for="item in events" class="mb-2 last:mb-0">
            <EventListItem :item="item"/>
        </div>

        <!--        </div>-->
    </section>
</template>

<script setup>
import EventListItem from '@/Components/EventListItem.vue'
import Separator from '@/Components/Separator.vue'
import { usePage } from '@inertiajs/inertia-vue3'
import { useStore } from 'vuex'
import { computed } from 'vue'

const store = useStore()

const lang = computed(() => store.getters.lang)
const locale = computed(() => usePage().props.value.locale)

defineProps({
    events: Array,
})
</script>

<style scoped>

</style>

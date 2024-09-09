<template>
    <section class="my-4">
        <Separator :title="lang[locale].homePageFeaturedEventsTitle" margin/>

        <div class="flex gap-2 flex-col md:flex-row">
            <div v-for="item in events" class="mb-2 last:mb-0 md:mb-0 grow basis-0">
                <EventListItem :fullHeight="true" :item="item"/>
            </div>

        </div>
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

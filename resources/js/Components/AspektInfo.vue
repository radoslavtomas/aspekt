<template>
    <section v-if="route().current() === 'home'" class="bg-zinc-600 mt-8 p-4 sm:rounded shadow-lg">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 text-white">
            <div class="p-6">
                <Link :href="route('books', 'vsetko')"
                      class="flex  items-center ml-2 text-lg leading-7 hover:text-red-400">
                    <BookOpenIcon class="h-5 w-5 mr-2"/>
                    {{ lang[locale].infoPanelBooksTitle }}
                </Link>

                <div class="">
                    <div class="mt-2 text-sm">
                        {{ lang[locale].infoPanelBooksDescription }}
                    </div>
                </div>
            </div>

            <div class="p-6">
                <Link :href="route('aspektin', 'vsetko')"
                      class="flex items-center ml-2 text-lg leading-7 hover:text-red-400">
                    <NewspaperIcon class="h-5 w-5 mr-2"/>
                    {{ lang[locale].infoPanelAspektinTitle }}
                </Link>

                <div class="">
                    <div class="mt-2 text-sm">
                        {{ lang[locale].infoPanelAspektinDescription }}
                    </div>
                </div>
            </div>

            <div class="p-6">
                <!--                @TODO: select link for library-->
                <Link :href="route('library', 'kedy-a-kde')"
                      class="flex  items-center ml-2 text-lg leading-7 hover:text-red-400">
                    <BuildingLibraryIcon class="h-5 w-5 mr-2"/>
                    {{ lang[locale].infoPanelLibraryTitle }}
                </Link>

                <div class="">
                    <div class="mt-2 text-sm">
                        {{ lang[locale].infoPanelLibraryDescription }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/inertia-vue3'
import { BookOpenIcon, BuildingLibraryIcon, NewspaperIcon } from '@heroicons/vue/24/outline'
import { useStore } from 'vuex'
import { computed, onMounted } from 'vue'

const store = useStore()

const lang = computed(() => store.getters.lang)
const locale = computed(() => usePage().props.value.locale)

onMounted(() => {
    console.log(route().current())
    console.log(route().current() === 'home')
})
</script>

<style scoped>

</style>

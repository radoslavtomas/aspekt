<template>
    <section class="my-4">
        <Separator :title="lang[locale].homePageFeaturedBlogsTitle" margin/>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
            <BlogListItem v-for="blog in blogs" :key="blog.id" :fullHeight="true" :item="blog"/>
        </div>


        <!--        <div class="mt-8 bg-white overflow-hidden border border-gray-200 sm:rounded shadow-lg">-->
        <!--            <div class="grid grid-cols-1 md:grid-cols-2">-->
        <!--                <div class="p-6 flex flex-col justify-start">-->
        <!--                    <div class="mb-4">-->
        <!--                        <div class="flex items-center">-->
        <!--                            <div class="ml-2 text-lg font-bold">-->
        <!--                                <Link :href="route('aspektin', {category: 'vsetko', slug: blogs[0].slug})"-->
        <!--                                      class="text-red-600 hover:text-red-700">{{ blogs[0].title }}-->
        <!--                                </Link>-->
        <!--                            </div>-->
        <!--                        </div>-->

        <!--                        <div>-->
        <!--                            <div class="mt-2 text-gray-600 text-sm" v-html="blogs[0].teaser"></div>-->
        <!--                        </div>-->
        <!--                    </div>-->

        <!--                    <div class="flex w-full justify-end">-->
        <!--                        <Link :href="route('aspektin', {category: 'vsetko', slug: blogs[0].slug})"-->
        <!--                              class="rounded text-zinc-600 text-sm text-center px-3 py-2 w-full sm:w-auto shadow-md bg-gray-200 hover:bg-gray-300">-->
        <!--                            {{ lang[locale].homePageReadMoreButton }}-->
        <!--                            <ArrowRightCircleIcon class="w-5 h-5 ml-1 inline"/>-->
        <!--                        </Link>-->
        <!--                    </div>-->

        <!--                </div>-->

        <!--                <div class="p-6 flex flex-col justify-start border-t border-gray-200 md:border-t-0 md:border-l">-->
        <!--                    <div class="mb-4">-->
        <!--                        <div class="flex items-center">-->
        <!--                            <div class="ml-2 text-lg font-bold">-->
        <!--                                <Link :href="route('aspektin', {category: 'vsetko', slug: blogs[1].slug})"-->
        <!--                                      class="text-red-600 hover:text-red-700">{{ blogs[1].title }}-->
        <!--                                </Link>-->
        <!--                            </div>-->
        <!--                        </div>-->

        <!--                        <div class="">-->
        <!--                            <div class="mt-2 text-gray-600 text-sm" v-html="blogs[1].teaser"></div>-->
        <!--                        </div>-->
        <!--                    </div>-->

        <!--                    <div class="flex w-full justify-end">-->
        <!--                        <Link :href="route('aspektin', {category: 'vsetko', slug: blogs[1].slug})"-->
        <!--                              class="rounded text-zinc-600 text-sm text-center px-3 py-2 w-full sm:w-auto shadow-md bg-gray-200 hover:bg-gray-300">-->
        <!--                            {{ lang[locale].homePageReadMoreButton }}-->
        <!--                            <ArrowRightCircleIcon class="w-5 h-5 ml-1 inline"/>-->
        <!--                        </Link>-->
        <!--                    </div>-->
        <!--                </div>-->

        <!--                <div class="p-6 flex flex-col justify-start border-t border-gray-200">-->
        <!--                    <div class="mb-4">-->
        <!--                        <div class="flex items-center">-->
        <!--                            <div class="ml-2 text-lg font-bold">-->
        <!--                                <Link :href="route('aspektin', {category: 'vsetko', slug: blogs[2].slug})"-->
        <!--                                      class="text-red-600 hover:text-red-700">{{ blogs[2].title }}-->
        <!--                                </Link>-->
        <!--                            </div>-->
        <!--                        </div>-->

        <!--                        <div class="">-->
        <!--                            <div class="mt-2 text-gray-600 text-sm" v-html="blogs[2].teaser"></div>-->
        <!--                        </div>-->
        <!--                    </div>-->

        <!--                    <div class="flex w-full justify-end">-->
        <!--                        <Link :href="route('aspektin', {category: 'vsetko', slug: blogs[2].slug})"-->
        <!--                              class="rounded text-zinc-600 text-sm text-center px-3 py-2 w-full sm:w-auto shadow-md bg-gray-200 hover:bg-gray-300">-->
        <!--                            {{ lang[locale].homePageReadMoreButton }}-->
        <!--                            <ArrowRightCircleIcon class="w-5 h-5 ml-1 inline"/>-->
        <!--                        </Link>-->
        <!--                    </div>-->
        <!--                </div>-->

        <!--                <div class="p-6 flex flex-col justify-start border-t border-gray-200 md:border-l">-->
        <!--                    <div class="mb-4">-->
        <!--                        <div class="flex items-center">-->
        <!--                            <div class="ml-2 text-lg font-bold">-->
        <!--                                <Link :href="route('aspektin', {category: 'vsetko', slug: blogs[3].slug})"-->
        <!--                                      class="text-red-600 hover:text-red-700">{{ blogs[3].title }}-->
        <!--                                </Link>-->
        <!--                            </div>-->
        <!--                        </div>-->

        <!--                        <div class="">-->
        <!--                            <div class="mt-2 text-gray-600 text-sm" v-html="blogs[3].teaser"></div>-->
        <!--                        </div>-->
        <!--                    </div>-->

        <!--                    <div class="flex w-full justify-end">-->
        <!--                        <Link :href="route('aspektin', {category: 'vsetko', slug: blogs[3].slug})"-->
        <!--                              class="rounded text-zinc-600 text-sm text-center px-3 py-2 w-full sm:w-auto shadow-md bg-gray-200 hover:bg-gray-300">-->
        <!--                            {{ lang[locale].homePageReadMoreButton }}-->
        <!--                            <ArrowRightCircleIcon class="w-5 h-5 ml-1 inline"/>-->
        <!--                        </Link>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->

    </section>
</template>

<script setup>
import { usePage } from '@inertiajs/inertia-vue3'
import Separator from '@/Components/Separator.vue'
import { useStore } from 'vuex'
import { computed } from 'vue'
import BlogListItem from '@/Components/BlogListItem.vue'

const store = useStore()

const lang = computed(() => store.getters.lang)
const locale = computed(() => usePage().props.value.locale)
defineProps({
    blogs: Array
})
</script>

<style scoped>

</style>

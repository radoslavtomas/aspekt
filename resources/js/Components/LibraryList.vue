<template>
    <section>
        <Head :title="title" />

        <Breadcrumbs id="library"/>

        <div class="bg-books">
            <div class="mb-4 border-2 border-purple-100 p-4 bg-transparent">
                <MasonryWall :items="items.data" :column-width="230" :gap="16">
                    <template #default="{item}">
                        <LibraryListItem :item="item" />
                    </template>
                </MasonryWall>
            </div>
        </div>

        <pagination class="mt-4" :links="items.meta.links"></pagination>
    </section>
</template>

<script setup>
import {Head, usePage} from '@inertiajs/inertia-vue3';
import {computed, onMounted} from "vue";

// 3rd party
import MasonryWall from '@yeger/vue-masonry-wall'

// components
import LibraryListItem from './LibraryListItem.vue';
import Breadcrumbs from '../Components/Breadcrumbs.vue';
import Pagination from '../Components/Pagination.vue'

// computed
const category = computed(() => usePage().props.value.category);
const categoryString = computed(() => category.value[`name_${locale.value}`]);
const items = computed(() => usePage().props.value.blogs);
const locale = computed(() => usePage().props.value.locale);
const navigation = computed(() => usePage().props.value.navigation);

const title = computed(() => {
    const navigationString = computed(() => navigation.value.find(el => el.route === 'library')[`name_${locale.value}`]);

    return `${navigationString.value} | ${categoryString.value}`
})
</script>

<style>

</style>



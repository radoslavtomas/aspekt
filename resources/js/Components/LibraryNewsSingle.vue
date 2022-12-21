<template>
    <div class="max-w-3xl mx-auto">
        <Head :title="title" />

        <div class="mb-6">
            <Breadcrumbs id="library" :article="blog.title"/>
        </div>

        <article class="">
            <header class="relative flex flex-col md:flex-row justify-between items-center md:items-start mb-6 md:mb-12">
                <div class="text-center md:text-left w-full h-full flex-1 flex flex-col justify-items-stretch">
                    <div class="">
                        <h1 class="text-2xl md:text-3xl text-red-600 font-bold">{{blog.title}}</h1>
                        <h4 class="text-xl text-red-600 my-1">{{blog.subtitle}}</h4>
                        <h3 class="md:my-4 text-xl">{{blog.authors}}</h3>
                    </div>
                </div>
            </header>

            <main class="max-w-2xl mx-auto px-1">
                <section class="mb-6">
                    <div class="content" v-html="blog.body"></div>
                </section>

                <section v-if="blog.links" class="mb-6">
                    <Separator :title="lang[locale].links" margin />
                    <div v-html="blog.links"></div>
                </section>


                <section v-if="blog.files.length" class="mb-6">
                    <Separator :title="lang[locale].files" margin />
                    <file-list :files="blog.files" />
                </section>

                <section v-if="blog.downloads.length" class="mb-6">
                    <Separator :title="lang[locale].downloads" margin />
                    <file-list :files="blog.downloads" />
                </section>
            </main>
        </article>
    </div>
</template>

<script setup>
import {computed, onMounted} from "vue";
import {Head, usePage} from "@inertiajs/inertia-vue3";

// components
import FileList from './FileList.vue'
import Breadcrumbs from '../Components/Breadcrumbs.vue';
import Separator from "@/Components/Separator.vue";

// computed
const blog = computed(() => usePage().props.value.blog.data);
const locale = computed(() => usePage().props.value.locale);
const navigation = computed(() => usePage().props.value.navigation);

const title = computed(() => {
    const navigationString = computed(() => navigation.value.find(el => el.route === 'aspektin')[`name_${locale.value}`]);
    const articleString = blog.value.title
    return `${navigationString.value} | ${articleString}`
})

// data
const lang = {
    sk: {
        'pages': 'Počet strán',
        'aspekt_price': 'ASPEKT cena',
        'common_price': 'Bežná cena',
        'editors': 'Editorstvo',
        'translation': 'Preklad',
        'sample': 'Ukážka z knihy',
        'links': 'Súvisiace odkazy',
        'files': 'Súbory na stiahnutie',
        'downloads': 'Knihy na stiahnutie',
    },
    en: {
        'pages': 'Number of pages',
        'aspekt_price': 'ASPEKT price',
        'common_price': 'Common cena',
        'editors': 'Editors',
        'translation': 'Translation',
        'sample': 'Sample',
        'links': 'Related links',
        'files': 'Files to download',
        'downloads': 'Books to download',
    }
}

onMounted(() => console.log(blog.value))
</script>




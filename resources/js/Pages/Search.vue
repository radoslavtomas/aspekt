<script setup>
import { computed, reactive } from 'vue'
import { Head, usePage } from '@inertiajs/inertia-vue3'
import MainLayout from '../Layouts/MainLayout.vue'
import FormInput from '@/Components/Form/FormInput.vue'
import FormSelect from '@/Components/Form/FormSelect.vue'
import { maxLength, required } from '@vuelidate/validators'
import useVuelidate from '@vuelidate/core'
import { Inertia } from '@inertiajs/inertia'
import { ArrowRightCircleIcon } from '@heroicons/vue/24/outline'

const locale = computed(() => usePage().props.value.locale)

const searchString = {
    'en': 'Search',
    'sk': 'Vyhľadávanie'
}

const lang = {
    en: {
        form: {
            category: 'Category',
            query: 'Search for',
            options: {
                authors: 'Authors',
                blogs: 'AspektIn',
                books: 'Books',
                events: 'Events',
                pages: 'Pages',
                njuvinky: 'Njuvinky',
            },
            submit: 'Search'
        }
    },
    sk: {
        form: {
            category: 'Kategória',
            query: 'Vyhľadaj',
            options: {
                authors: 'Autorky / Autori',
                blogs: 'AspektIn',
                books: 'Knihy',
                events: 'Podujatia',
                pages: 'Stránky',
                njuvinky: 'Ňjúvinky',
            },
            submit: 'Hľadaj'
        }
    }
}

const options = [
    { value: 'blogs', description: lang[locale.value].form.options.blogs },
    { value: 'books', description: lang[locale.value].form.options.books },
    { value: 'authors', description: lang[locale.value].form.options.authors },
    { value: 'events', description: lang[locale.value].form.options.events },
    { value: 'pages', description: lang[locale.value].form.options.pages },
    { value: 'njuvinky', description: lang[locale.value].form.options.njuvinky },
]

let form = reactive({
    category: 'blogs',
    query: '',
})

const rules = computed(() => {
    return {
        category: { required, maxLength: maxLength(100) },
        query: { required, maxLength: maxLength(100) },
    }
})

const v$ = useVuelidate(rules, form, { $scope: false })

const handleForm = async () => {
    const result = await v$.value.$validate()

    if (!result) {
        const el = document.getElementsByClassName('max-w-[48rem]')[0]
        setTimeout(() => {
            el.scrollIntoView({ behavior: 'smooth' })
        }, 100)
        return
    }

    Inertia.visit('/search/' + form.category, {
        method: 'get',
        data: {
            query: form.query
        },
    })
}

</script>

<template>
    <Head :title="searchString[locale]"/>

    <main-layout>
        <div class="max-w-[48rem] mx-auto">
            <h1 class="border-b border-gray-300 pb-8 text-2xl md:text-3xl text-red-600 font-bold my-8 text-center">
                <span class=" pb-2 px-4">{{ searchString[locale] }}</span>
            </h1>

            <div class="max-w-[36rem] mx-auto">

                <form @submit.prevent="handleForm">
                    <FormSelect
                        v-model="form.category"
                        :errors="v$.category.$errors.length ? v$.category.$errors[0] : null"
                        :options="options"
                        :title="lang[locale].form.category"
                        name="category"/>

                    <FormInput
                        v-model.trim="form.query"
                        :errors="v$.query.$errors.length ? v$.query.$errors[0] : null"
                        :title="lang[locale].form.query"
                        name="query"/>

                    <section
                        class="my-8 flex flex-col sm:flex-row flex-col-reverse justify-between items-center text-sm sm:text-base">
                        <button
                            class="rounded text-white text-center px-4 py-3 mb-3 sm:mb-0 w-full sm:w-auto shadow-md bg-pink-500 hover:bg-pink-600"
                            type="submit">
                            {{ lang[locale].form.submit }}
                            <ArrowRightCircleIcon class="w-5 h-5 inline"/>
                        </button>
                    </section>

                </form>
            </div>
        </div>

    </main-layout>
</template>

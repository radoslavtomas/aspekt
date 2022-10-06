<template>
    <article class="mt-10 max-w-4xl mx-auto">
        <header class="flex flex-col md:flex-row justify-between items-center md:items-start mb-6 md:mb-12">
            <div class="text-center md:text-left w-full h-full flex-1 flex flex-col justify-items-stretch">
                <div class="">
                    <h1 class="text-2xl md:text-3xl text-red-600 font-bold">{{props.book.title}}</h1>
                    <h4 class="text-sm my-1">{{props.book.subtitle}}</h4>
                    <h3 class="md:my-4 text-xl">{{props.book.authors}}</h3>
                    <p v-if="props.book.editors" class="text-gray-500 text-xs">Editorky & editori: {{props.book.editors}}</p>
                    <p v-if="props.book.translation" class="text-gray-500 text-xs">Preklad: {{props.book.translation}}</p>
                </div>

                <img v-if="props.book.cover" class="md:hidden w-64 h-auto mt-4 md:mt-0 md:ml-4 shadow-xl border border-gray-200 mx-auto md:mx-0 rounded-2xl" :src="`/storage/${props.book.cover}`" alt="book.title">

                <div class="text-xs mt-6 md:mt-12 text-gray-500 flex flex-col items-center md:items-start" v-if="props.book.is_product">
                    <p>Pocet stran: {{props.book.pages}}</p>
                    <p>ISBN: {{props.book.isbn}}</p>
                    <br>
                    <p class="text-xl text-red-600 font-bold">ASPEKT cena: {{props.book.aspekt_price}}</p>
                    <p>(Bezna cena {{props.book.common_price}})</p>
                    <button class="flex items-center text-sm bg-red-600 hover:bg-red-700 text-white px-3 py-2 mt-4 md:mt-8">Pridaj do tasky <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 ml-2">
                        <path fill-rule="evenodd" d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 004.25 22.5h15.5a1.875 1.875 0 001.865-2.071l-1.263-12a1.875 1.875 0 00-1.865-1.679H16.5V6a4.5 4.5 0 10-9 0zM12 3a3 3 0 00-3 3v.75h6V6a3 3 0 00-3-3zm-3 8.25a3 3 0 106 0v-.75a.75.75 0 011.5 0v.75a4.5 4.5 0 11-9 0v-.75a.75.75 0 011.5 0v.75z" clip-rule="evenodd" />
                    </svg>
                    </button>
                </div>

            </div>
            <img v-if="props.book.cover" class="hidden md:block w-64 h-auto mt-4 md:mt-0 md:ml-4 shadow-xl border border-gray-200 mx-auto md:mx-0 rounded-2xl" :src="`/storage/${props.book.cover}`" alt="book.title">
        </header>

        <main class="max-w-2xl mx-auto px-1">
            <div v-html="props.book.body" class="mb-4"></div>
            <div v-html="props.book.sample" class="bg-green-200 mb-4"></div>
            <div v-html="props.book.links" class="bg-blue-200 mb-4"></div>
        </main>
    </article>

</template>

<script setup>

const props = defineProps({
    book: Object
})
</script>

<style scoped>

</style>

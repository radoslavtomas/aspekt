<template>
    <nav class="tracking-widest">
        <div class="mx-auto max-w-7xl px-2 md:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="absolute inset-y-0 left-0 flex items-center lg:hidden">
                    <!-- Mobile menu button-->
                    <button type="button" class="inline-flex items-center justify-center rounded-md p-2 text-gray-800 hover:bg-gray-200 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-red-500" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <!--
                          Icon when menu is closed.

                          Heroicon name: outline/bars-3

                          Menu open: "hidden", Menu closed: "block"
                        -->
                        <svg v-if="!openNav" @click="openNav = true" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <!--
                          Icon when menu is open.

                          Heroicon name: outline/x-mark

                          Menu open: "block", Menu closed: "hidden"
                        -->
                        <svg v-if="openNav" @click="openNav = false" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="flex flex-1 items-center justify-center lg:items-stretch lg:justify-start">
                    <div class="flex flex-shrink-0 items-center">
                        <Link :href="route('home')">
                            <img class="h-12 w-auto" src="/assets/img/aspekt_logo.jpg" alt="Aspekt">
                        </Link>
                    </div>

                </div>
                <div class="hidden lg:ml-6 lg:block">
                    <div class="flex items-center justify-between space-x-3.5 h-full">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <Link :href="route('home')" :class="{ 'border-b-4 border-red-600': $page.component === 'Home' }" class="inline-block font-bold text-red-600 hover:bg-red-100 hover:text-red-700 px-3 py-2 text-sm font-medium" aria-current="page">{{menuItems[locale].home}}</Link>

<!--                        <Link :href="route('about')" :class="{ 'border-b-4 border-red-600': $page.component === 'About' }" class="inline-block font-bold text-red-600 hover:bg-red-100 hover:text-red-700 px-3 py-2 text-sm font-medium" aria-current="page">{{menuItems[locale].about}}</Link>-->

                        <MenuDropdown align="center" width="48">
                            <template #trigger>
                                <button :class="{ 'border-b-4 border-red-600': $page.component === 'About' }" class="font-bold text-red-600 hover:bg-red-100 hover:text-red-700 px-3 py-2 text-sm font-medium">{{menuItems[locale].about}}</button>
                            </template>

                            <template #content>
                                <MenuDropdownLink  href="#" as="button">
                                    {{menuItems.aspekt[locale].what}}
                                </MenuDropdownLink>
                                <MenuDropdownLink href="#" as="button">
                                    {{menuItems.aspekt[locale].projects}}
                                </MenuDropdownLink>
                                <MenuDropdownLink href="#" as="button">
                                    {{menuItems.aspekt[locale].history}}
                                </MenuDropdownLink>
                                <MenuDropdownLink href="#" as="button">
                                    {{menuItems.aspekt[locale].whoiswho}}
                                </MenuDropdownLink>
                                <MenuDropdownLink href="#" as="button">
                                    {{menuItems.aspekt[locale].archive}}
                                </MenuDropdownLink>
                                <MenuDropdownLink href="#" as="button">
                                    {{menuItems.aspekt[locale].cooperation}}
                                </MenuDropdownLink>
                                <MenuDropdownLink href="#" as="button">
                                    {{menuItems.aspekt[locale].thanks}}
                                </MenuDropdownLink>
                            </template>
                        </MenuDropdown>

<!--                        <Link :href="route('books')" :class="{ 'border-b-4 border-red-600': $page.component === 'Books' }" class="inline-block font-bold text-red-600 hover:bg-red-100 hover:text-red-700 px-3 py-2 text-sm font-medium">{{menuItems[locale].books}}</Link>-->

                        <MenuDropdown align="center" width="64">
                            <template #trigger>
                                <button :class="{ 'border-b-4 border-red-600': $page.component === 'Books' }" class="font-bold text-red-600 hover:bg-red-100 hover:text-red-700 px-3 py-2 text-sm font-medium">{{menuItems[locale].books}}</button>
                            </template>

                            <template #content>
                                <MenuDropdownLink href="#" as="button">
                                    {{menuItems.books[locale].plan}}
                                </MenuDropdownLink>
                                <MenuDropdownLink href="#" as="button">
                                    {{menuItems.books[locale].new}}
                                </MenuDropdownLink>
                                <MenuDropdownLink href="#" as="button">
                                    {{menuItems.books[locale].fiction}}
                                </MenuDropdownLink>
                                <MenuDropdownLink href="#" as="button">
                                    {{menuItems.books[locale].children}}
                                </MenuDropdownLink>
                                <MenuDropdownLink href="#" as="button">
                                    {{menuItems.books[locale].society}}
                                </MenuDropdownLink>
                                <MenuDropdownLink href="#" as="button">
                                    {{menuItems.books[locale].aspekt}}
                                </MenuDropdownLink>
                                <MenuDropdownLink href="#" as="button">
                                    {{menuItems.books[locale].digest}}
                                </MenuDropdownLink>
                                <MenuDropdownLink href="#" as="button">
                                    {{menuItems.books[locale].aspekt}}
                                </MenuDropdownLink>
                                <MenuDropdownLink href="#" as="button">
                                    {{menuItems.books[locale].magazine}}
                                </MenuDropdownLink>
                                <MenuDropdownLink href="#" as="button">
                                    {{menuItems.books[locale].calendar}}
                                </MenuDropdownLink>
                                <MenuDropdownLink href="#" as="button">
                                    {{menuItems.books[locale].ebooks}}
                                </MenuDropdownLink>
                                <MenuDropdownLink href="#" as="button">
                                    {{menuItems.books[locale].people}}
                                </MenuDropdownLink>
                            </template>
                        </MenuDropdown>

                        <Link :href="route('aspektin')" :class="{ 'border-b-4 border-red-600': $page.component === 'AspektIn' }" class="inline-block text-red-600 font-bold hover:bg-red-100 hover:text-red-700 px-3 py-2 text-sm font-medium">{{menuItems[locale].aspektin}}</Link>

                        <Link :href="route('library')" :class="{ 'border-b-4 border-red-600': $page.component === 'Library' }" class="inline-block text-red-600 font-bold hover:bg-red-100 hover:text-red-700 px-3 py-2 text-sm font-medium">{{menuItems[locale].library}}</Link>

                        <Link :href="route('contact')" :class="{ 'border-b-4 border-red-600': $page.component === 'Contact' }" class="inline-block text-red-600 font-bold hover:bg-red-100 hover:text-red-700 px-3 py-2 text-sm font-medium">{{menuItems[locale].contact}}</Link>
                    </div>
                </div>
                <LanguageSelector></LanguageSelector>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div v-if="openNav" class="md:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pt-2 pb-3">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <Link :href="route('home')" :class="{ 'border-b-4 border-red-600': $page.component === 'Home' }" class="block font-bold text-red-600 hover:bg-red-100 hover:text-red-700 px-3 py-2 text-sm font-medium" aria-current="page">{{menuItems[locale].home}}</Link>

                <Link :href="route('about')" :class="{ 'border-b-4 border-red-600': $page.component === 'About' }" class="block font-bold text-red-600 hover:bg-red-100 hover:text-red-700 px-3 py-2 text-sm font-medium" aria-current="page">{{menuItems[locale].about}}</Link>

                <Link :href="route('books')" :class="{ 'border-b-4 border-red-600': $page.component === 'Books' }" class="block font-bold text-red-600 hover:bg-red-100 hover:text-red-700 px-3 py-2 text-sm font-medium">{{menuItems[locale].books}}</Link>

                <Link :href="route('aspektin')" :class="{ 'border-b-4 border-red-600': $page.component === 'AspektIn' }" class="block text-red-600 font-bold hover:bg-red-100 hover:text-red-700 px-3 py-2 text-sm font-medium">{{menuItems[locale].aspektin}}</Link>

                <Link :href="route('library')" :class="{ 'border-b-4 border-red-600': $page.component === 'Library' }" class="block text-red-600 font-bold hover:bg-red-100 hover:text-red-700 px-3 py-2 text-sm font-medium">{{menuItems[locale].library}}</Link>

                <Link :href="route('contact')" :class="{ 'border-b-4 border-red-600': $page.component === 'Contact' }" class="block text-red-600 font-bold hover:bg-red-100 hover:text-red-700 px-3 py-2 text-sm font-medium">{{menuItems[locale].contact}}</Link>
            </div>
        </div>
    </nav>
</template>

<script setup>
import {computed, ref} from 'vue';
import {Link, usePage} from "@inertiajs/inertia-vue3";
import LanguageSelector from '../Components/LanguageSelector.vue'
import MenuDropdown from '../Components/MenuDropdown.vue'
import MenuDropdownLink from '../Components/MenuDropdownLink.vue'

const openNav = ref(false);
const locale = computed(() => usePage().props.value.locale);

const menuItems = ref({
    sk: {
        home: 'DOMOV',
        about: 'O ASPEKTE',
        books: 'KNIŽNÁ EDÍCIA',
        aspektin: 'ASPEKTin',
        library: 'KNIŽNICA',
        contact: 'KONTAKT',
    },
    en: {
        home: 'HOME',
        about: 'ABOUT ASPEKT',
        books: 'BOOKS',
        aspektin: 'ASPEKTin',
        library: 'LIBRARY',
        contact: 'CONTACT',
    },
    aspekt: {
        sk: {
            what: 'Čo je ASPEKT?',
            projects: 'Projekty',
            history: 'História',
            whoiswho: 'Kto je kto',
            archive: 'Archív ňjúvinky',
            cooperation: 'Spolupráca',
            thanks: 'Ďakujeme',
        },
        en: {
            what: 'What\'s ASPEKT?',
            projects: 'Projects',
            history: 'History',
            whoiswho: 'Who is who',
            archive: 'Njuvinky archive',
            cooperation: 'Cooperation',
            thanks: 'Thank you',
        }
    },
    books: {
        sk: {
            plan: 'Pripravujeme',
            new: 'Novinky',
            fiction: 'Beletria',
            children: 'Knihy pre deti a mládež',
            society: 'Spoločenskovedná literatúra',
            aspekt: 'Zborníkový rad Aspekty',
            digest: 'Zborníkový rad Čítanka',
            interview: 'Rozhovory ASPEKTU',
            apsektin: 'Výber textov ASPEKTin',
            magazine: 'Časopis Aspekt',
            calendar: 'Kalendárky',
            ebooks: 'E-knihy',
            people: 'Autorky, redaktorky, prekladateľky',
        },
        en: {
            plan: 'Edition plan',
            new: 'New books',
            fiction: 'Fiction',
            children: 'Children\'s books',
            society: 'Politics, philosophy & culture',
            aspekt: 'Aspekty journal',
            digest: 'Reader\'s digest',
            interview: 'Aspekt interviews',
            apsektin: 'ASPEKTin reader\'s digest',
            magazine: 'Aspekt magazine',
            calendar: 'Aspekt calendars',
            ebooks: 'E-books',
            people: 'Authors, editors, translators',
        }
    }
})

</script>

<style scoped>

</style>

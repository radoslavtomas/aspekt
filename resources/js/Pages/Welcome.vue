<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
})
</script>

<template>
    <Head title="Welcome" />

    <nav class="">
        <div class="mx-auto max-w-7xl px-2 md:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="absolute inset-y-0 left-0 flex items-center md:hidden">
                    <!-- Mobile menu button-->
                    <button type="button" class="inline-flex items-center justify-center rounded-md p-2 text-gray-800 hover:bg-gray-200 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-red-500" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <!--
                          Icon when menu is closed.

                          Heroicon name: outline/bars-3

                          Menu open: "hidden", Menu closed: "block"
                        -->
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <!--
                          Icon when menu is open.

                          Heroicon name: outline/x-mark

                          Menu open: "block", Menu closed: "hidden"
                        -->
                        <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="flex flex-1 items-center justify-center md:items-stretch md:justify-start">
                    <div class="flex flex-shrink-0 items-center">
                        <img class="block h-10 w-auto lg:hidden" src="/assets/img/aspekt_logo.jpg" alt="Aspekt">
                        <img class="hidden h-10 w-auto lg:block" src="/assets/img/aspekt_logo.jpg" alt="Aspekt">
                    </div>
                    <div class="hidden md:ml-6 md:block">
                        <div class="flex space-x-4">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            <a href="#" class="bg-red-600 font-semibold text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">O ASPEKTE</a>

                            <a href="#" class="text-red-600 font-semibold hover:bg-red-100 hover:text-red-700 px-3 py-2 rounded-md text-sm font-medium">KNIZNA EDICIA</a>

                            <a href="#" class="text-red-600 font-semibold hover:bg-red-100 hover:text-red-700 px-3 py-2 rounded-md text-sm font-medium">ASPEKTin</a>

                            <a href="#" class="text-red-600 font-semibold hover:bg-red-100 hover:text-red-700 px-3 py-2 rounded-md text-sm font-medium">KNIZNICA</a>

                            <a href="#" class="text-red-600 font-semibold hover:bg-red-100 hover:text-red-700 px-3 py-2 rounded-md text-sm font-medium">KONTAKT</a>
                        </div>
                    </div>
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto md:ml-6 md:pr-0">
                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                        <div>
                            <button type="button" class="flex p-1.5 rounded-full bg-red-600 text-white hover:bg-red-700 text-xs focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                SK
                            </button>
                        </div>

                        <!--
                          Dropdown menu, show/hide based on menu state.

                          Entering: "transition ease-out duration-100"
                            From: "transform opacity-0 scale-95"
                            To: "transform opacity-100 scale-100"
                          Leaving: "transition ease-in duration-75"
                            From: "transform opacity-100 scale-100"
                            To: "transform opacity-0 scale-95"
                        -->
                        <div class="absolute right-0 z-10 mt-2 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <!-- Active: "bg-gray-100", Not Active: "" -->
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200" role="menuitem" tabindex="-1" id="user-menu-item-0">SK</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200" role="menuitem" tabindex="-1" id="user-menu-item-1">EN</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="md:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pt-2 pb-3">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="#" class="bg-red-600 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">O ASPEKTE</a>

                <a href="#" class="block text-gray-700 hover:bg-gray-200 hover:text-gray-800 px-3 py-2 rounded-md text-sm font-medium">KNIZNA EDICIA</a>

                <a href="#" class="block text-gray-700 hover:bg-gray-200 hover:text-gray-800 px-3 py-2 rounded-md text-sm font-medium">ASPEKTin</a>

                <a href="#" class="block text-gray-700 hover:bg-gray-200 hover:text-gray-800 px-3 py-2 rounded-md text-sm font-medium">KNIZNICA</a>

                <a href="#" class="block text-gray-700 hover:bg-gray-200 hover:text-gray-800 px-3 py-2 rounded-md text-sm font-medium">KONTAKT</a>
            </div>
        </div>
    </nav>

    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
<!--        <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">-->
<!--            <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="text-sm text-gray-700 underline">-->
<!--                Dashboard-->
<!--            </Link>-->

<!--            <template v-else>-->
<!--                <Link :href="route('login')" class="text-sm text-gray-700 underline">-->
<!--                    Log in-->
<!--                </Link>-->

<!--                <Link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-gray-700 underline">-->
<!--                    Register-->
<!--                </Link>-->
<!--            </template>-->
<!--        </div>-->



        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                <img src="/assets/img/aspekt_logo.jpg" alt="Aspekt Logo">
            </div>

            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel.com/docs" class="underline text-gray-900 dark:text-white">Documentation</a></div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                Laravel has wonderful, thorough documentation covering every aspect of the framework. Whether you are new to the framework or have previous experience with Laravel, we recommend reading all of the documentation from beginning to end.
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laracasts.com" class="underline text-gray-900 dark:text-white">Laracasts</a></div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development. Check them out, see for yourself, and massively level up your development skills in the process.
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                            <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel-news.com/" class="underline text-gray-900 dark:text-white">Laravel News</a></div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                Laravel News is a community driven portal and newsletter aggregating all of the latest and most important news in the Laravel ecosystem, including new package releases and tutorials.
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">Vibrant Ecosystem</div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                Laravel's robust library of first-party tools and libraries, such as <a href="https://forge.laravel.com" class="underline">Forge</a>, <a href="https://vapor.laravel.com" class="underline">Vapor</a>, <a href="https://nova.laravel.com" class="underline">Nova</a>, and <a href="https://envoyer.io" class="underline">Envoyer</a> help you take your projects to the next level. Pair them with powerful open source libraries like <a href="https://laravel.com/docs/billing" class="underline">Cashier</a>, <a href="https://laravel.com/docs/dusk" class="underline">Dusk</a>, <a href="https://laravel.com/docs/broadcasting" class="underline">Echo</a>, <a href="https://laravel.com/docs/horizon" class="underline">Horizon</a>, <a href="https://laravel.com/docs/sanctum" class="underline">Sanctum</a>, <a href="https://laravel.com/docs/telescope" class="underline">Telescope</a>, and more.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                <div class="text-center text-sm text-gray-500 sm:text-left">
                    <div class="flex items-center">
                        <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="-mt-px w-5 h-5 text-gray-400">
                            <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>

                        <a href="https://laravel.bigcartel.com" class="ml-1 underline">
                            Shop
                        </a>

                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="ml-4 -mt-px w-5 h-5 text-gray-400">
                            <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>

                        <a href="https://github.com/sponsors/taylorotwell" class="ml-1 underline">
                            Sponsor
                        </a>
                    </div>
                </div>

                <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                    Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
    /*.bg-gray-100 {*/
    /*    background-color: #f7fafc;*/
    /*    background-color: rgba(247, 250, 252, var(--tw-bg-opacity));*/
    /*}*/

    /*.border-gray-200 {*/
    /*    border-color: #edf2f7;*/
    /*    border-color: rgba(237, 242, 247, var(--tw-border-opacity));*/
    /*}*/

    /*.text-gray-400 {*/
    /*    color: #cbd5e0;*/
    /*    color: rgba(203, 213, 224, var(--tw-text-opacity));*/
    /*}*/

    /*.text-gray-500 {*/
    /*    color: #a0aec0;*/
    /*    color: rgba(160, 174, 192, var(--tw-text-opacity));*/
    /*}*/

    /*.text-gray-600 {*/
    /*    color: #718096;*/
    /*    color: rgba(113, 128, 150, var(--tw-text-opacity));*/
    /*}*/

    /*.text-gray-700 {*/
    /*    color: #4a5568;*/
    /*    color: rgba(74, 85, 104, var(--tw-text-opacity));*/
    /*}*/

    /*.text-gray-900 {*/
    /*    color: #1a202c;*/
    /*    color: rgba(26, 32, 44, var(--tw-text-opacity));*/
    /*}*/

    /*@media (prefers-color-scheme: dark) {*/
    /*    .dark\:bg-gray-800 {*/
    /*        background-color: #2d3748;*/
    /*        background-color: rgba(45, 55, 72, var(--tw-bg-opacity));*/
    /*    }*/

    /*    .dark\:bg-gray-900 {*/
    /*        background-color: #1a202c;*/
    /*        background-color: rgba(26, 32, 44, var(--tw-bg-opacity));*/
    /*    }*/

    /*    .dark\:border-gray-700 {*/
    /*        border-color: #4a5568;*/
    /*        border-color: rgba(74, 85, 104, var(--tw-border-opacity));*/
    /*    }*/

    /*    .dark\:text-white {*/
    /*        color: #fff;*/
    /*        color: rgba(255, 255, 255, var(--tw-text-opacity));*/
    /*    }*/

    /*    .dark\:text-gray-400 {*/
    /*        color: #cbd5e0;*/
    /*        color: rgba(203, 213, 224, var(--tw-text-opacity));*/
    /*    }*/
    /*}*/
</style>

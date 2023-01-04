<template>
    <section class="bg-zinc-600 my-8 p-4 sm:rounded shadow-lg">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 text-white">
            <div class="p-6">
                <Link :href="route('books', 'vsetko')" class="flex  items-center ml-2 text-lg leading-7 hover:text-red-400">
                    <BookOpenIcon class="h-5 w-5 mr-2" />
                    Knizna edicia
                </Link>

                <div class="">
                    <div class="mt-2 text-sm">
                        Takmer dve desiatky aspektovských kníh si môžete objedať aj v elektronickej podobe. Vo forme e-kníh nájdete rozhovor Jany Juráňovej s Agnešou Kalinovou, preklad knihy bell hooks, analýzu účasti žien v Nežnej revolúcii, feministický pohľad na literatúru, ale aj beletristické knihy Jany Juráňovej, Ireny Brežnej, Slavenky Drakulić, Jany Bodnárovej, Barbory Hrínovej, Etely Farkašovej, Jaroslavy Blažkovej či Diany Athill.
                    </div>
                </div>
            </div>

            <div class="p-6">
                <Link :href="route('aspektin', 'vsetko')" class="flex items-center ml-2 text-lg leading-7 hover:text-red-400">
                    <NewspaperIcon class="h-5 w-5 mr-2" />
                    ASPEKTin
                </Link>

                <div class="">
                    <div class="mt-2 text-sm">
                        V roku 1993 vyšlo prvé číslo feministického kultúrneho časopisu Aspekt, ktorý bol ako slovensko-české médium prvým feministickým časopisom v bývalom Československu a dnes pokračuje ako webzin ASPEKTin. Naša organizácia sa ako nositeľka množstva vzdelávacích a publikačných projektov od svojich začiatkov zameriava na rodovú senzibilizáciu spoločnosti.
                    </div>
                </div>
            </div>

            <div class="p-6">
                <!--                @TODO: select link for library-->
                <Link :href="route('library', 'kedy-a-kde')" class="flex  items-center ml-2 text-lg leading-7 hover:text-red-400">
                    <BuildingLibraryIcon class="h-5 w-5 mr-2" />
                    Knižnica ASPEKTU
                </Link>

                <div class="">
                    <div class="mt-2 text-sm">
                        Knižnica ASPEKTU  sa špecializuje sa na literatúru s feministickou a rodovou problematikou, ponúka široký výber odbornej literatúry a beletrie v rôznych jazykoch (okrem slovenčiny a češtiny najmä v angličtine, nemčine a poľštine). Uchováva plagáty, brožúry, periodiká, audiovizuálne dokumenty a rôzne iné materiály.
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import {Link} from "@inertiajs/inertia-vue3";
import {BookOpenIcon, BuildingLibraryIcon, NewspaperIcon} from '@heroicons/vue/24/outline';
</script>

<style scoped>

</style>

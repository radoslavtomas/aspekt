<template>
    <header>
        <navigation-bar />
    </header>

    <support-us />

    <main class="relative container-aspekt mx-auto">
        <slot />
    </main>

    <footer class="bg-gray-800 w-full">
        <div class="container-aspekt mx-auto text-white py-12">
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <h3 class="text-lg">ASPEKT</h3>
                    <p class="mb-4 text-xs italic">Feministická vzdelávacia a publikačná organizácia</p>

                    <p>Mýtna 38</p>
                    <p>811 07</p>
                    <p>Bratislava</p>
                    <p>+421 2 5249 1639</p>
                    <a href="mailto:aspekt@aspekt.sk">aspekt@aspekt.sk</a>
                    <a href="/">www.aspekt.sk</a>
                </div>

                <div class="flex flex-col">
                    <h3 class="text-lg mb-4">Info</h3>
                    <a href="/">O Aspekte</a>
                    <a href="/">Knizna edicia</a>
                    <a href="/">ASPEKTin</a>
                    <a href="/">Kniznica</a>
                </div>

                <div class="flex flex-col">
                    <h3 class="text-lg mb-4">Najdite nas</h3>
                    <div class="flex">
                        <a href="">
                            <img src="/assets/img/facebook.png" alt="facebook" class="w-6 h-auto">
                        </a>
                        <a href="">
                            <img src="/assets/img/instagram.png" alt="instagram" class="w-6 h-auto">
                        </a>
                        <a href="">
                            <img src="/assets/img/link.png" alt="link" class="w-6 h-auto">
                        </a>
                    </div>

                </div>
            </div>




        </div>
    </footer>


</template>

<script setup>
import NavigationBar from '../Components/NavigationBar.vue';
import SupportUs from '../Components/SupportUs.vue'

</script>

<style scoped>

</style>

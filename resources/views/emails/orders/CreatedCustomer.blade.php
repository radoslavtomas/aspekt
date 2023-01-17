<x-email-layout>
    <x-email-header />

    <main class="main content-center">

        <section class="content order-note">
            <h4 class="font-bold">Ďakujeme za objednávku.</h4>
            <p class="">Urobíme všetko preto, aby sme ju vybavyli čo najskôr. Hneď, ako ju odošleme, dáme Vám určite vedieť.</p>
            <hr>
        </section>

        <x-email-order-summary
            :basket="$basket"
            :orderTotal="$orderTotal"
        />

    </main>

    <x-email-footer />
</x-email-layout>

<x-email-layout>
    <x-email-header />

    <main class="main content-center">

        <section class="content order-note">
            <h4 class="font-bold">Vaša objednávka bola odoslaná.</h4>
            <p class="">Prajeme pekné čítanie.</p>
            <hr>
        </section>

{{--        <x-email-order-summary--}}
{{--            :basket="$basket"--}}
{{--            :orderTotal="$orderTotal"--}}
{{--        />--}}

    </main>

    <x-email-footer />
</x-email-layout>

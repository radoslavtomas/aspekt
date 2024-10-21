{{--@formatter:off--}}
<x-email-layout>
<x-email-header />

<main style="background: #ffffff;border-radius: 3px;width: 100%;">

<section style="box-sizing: border-box;margin: 0 auto;min-width: 200px;max-width: 580px;text-align: center;padding: 1rem 0;">
<h4 style="font-weight: 700;">Vašu objednávku sme vybavili.</h4>
<p style="margin: 0;">Aspektovské knihy sú na ceste k Vám. Prajeme príjemné čítanie.</p>
<hr style="border: 0;border-bottom: 1px solid #d4d4d4;margin: 20px 0;">
</section>

<x-email-order-summary
:basket="$basket"
:orderTotal="$orderTotal"
/>

<section style="box-sizing: border-box;margin: 0 auto;min-width: 200px;max-width: 580px;text-align: center;padding: 1rem 0;">
@if(count($basket) == 1)
<p>Objednanú publikáciu Vám zašleme na dobierku. K cene knihy je potrebné pripočítať cenu poštovného, ktorá bude {{$postage}}.</p>
@else
<p>Objednané publikácie Vám zašleme na dobierku. K cene objednaných kníh je potrebné pripočítať cenu poštovného, ktorá bude {{$postage}}.</p>
@endif
</section>

</main>

<x-email-footer />
</x-email-layout>

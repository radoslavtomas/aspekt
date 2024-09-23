{{--@formatter:off--}}
<x-email-layout>
<x-email-header />

<div style="background: #ffffff;border-radius: 3px;width: 100%;">

<div style="box-sizing: border-box;margin: 0 auto;min-width: 200px;max-width: 580px;text-align: center;padding: 1rem 0;">
<h4 style="font-weight: 700;">Ďakujeme za objednávku.</h4>
<p>Urobíme všetko preto, aby sme ju vybavyli čo najskôr. Hneď, ako ju odošleme, dáme Vám určite vedieť.</p>
<hr style="border: 0;border-bottom: 1px solid #d4d4d4;margin: 20px 0;">
</div>

<x-email-order-summary
:basket="$basket"
:orderTotal="$orderTotal"
/>

</div>

<x-email-footer />
</x-email-layout>

{{--@formatter:off--}}
<x-mail::message>
# Nová objednávka na ASPEKT.sk

Nová objednávka od {{$customerName}}.

Objednávku môžete spravovať tu:

<x-mail::button url="{{env('APP_URL')."/admin/orders/".$orderId."/edit"}}">

Debug: {{env('APP_URL')."/admin/orders/".$orderId."/edit"}}

Debug2: {{$editUrl}}

Objednávka

</x-mail::button>

WebAdmin
</x-mail::message>

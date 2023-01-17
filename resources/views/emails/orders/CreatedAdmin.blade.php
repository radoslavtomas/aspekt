<x-mail::message>
# Nová objednávka na ASPEKT.sk

Nová objednávka od {{$customerName}}.

Objednávku môžete spravovať tu:

{{--TODO: change localhost--}}
<x-mail::button url="http://localhost:8000/admin/orders/{{$orderId}}/edit">
    Objednávka
</x-mail::button>

WebAdmin
</x-mail::message>

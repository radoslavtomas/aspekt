{{--@formatter:off--}}
<x-mail::message>
# Nová objednávka na ASPEKT.sk

Nová objednávka od {{$customerName}}.

Objednávku môžete spravovať tu:

<x-mail::button url="{{$editUrl}}">

Objednávka

</x-mail::button>

WebAdmin
</x-mail::message>

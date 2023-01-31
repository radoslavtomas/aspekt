
<div style="box-sizing: border-box;margin: 0 auto;min-width: 200px;max-width: 580px;padding: 1rem 0;">
    <h4 style="text-align: center;font-weight: 700">Tu je sumár Vašej objednávky:</h4>

    @foreach($basket as $item)
    <x-email-order-item :item="$item" />
    @endforeach
</div>


<div style="border: 0;border-top: 1px solid #d4d4d4;box-sizing: border-box;margin: 0 auto;min-width: 200px;max-width: 580px;padding: 1rem 0;text-align: center;">
    <p>Spolu: <span style="font-weight: 700">{{$orderTotal}}</span>
    </p>
</div>



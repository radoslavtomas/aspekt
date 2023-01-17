
<section class="content">
    <h4 class="text-center">Tu je sumár Vašej objednávky:</h4>

    @foreach($basket as $item)
    <x-email-order-item :item="$item" />
    @endforeach
</section>

<section class="subtotal content-center">
    <div class="content">
        <p>
            <span class="">Spolu:</span>
            {{$orderTotal}}
        </p>
    </div>
</section>


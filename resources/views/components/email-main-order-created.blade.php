<main class="main content-center">
    <section class="content order-note">
        <h4 class="font-bold">Ďakujeme za objednávku.</h4>
        <p class="">Urobíme všetko preto, aby sme ju vybavyli co najskôr. O tom, ako nam to ide, Vám určite dame vedieť.</p>
        <hr>
    </section>

    <section class="content">
        <h4 class="text-center">Tu je sumar Vasej objednavky:</h4>

        @foreach($basket as $item)
        <div class="order-item">
            <div class="image-preview">
                <img src="https://aspekt-dev.rdslv.com/storage/{{ $item['cover'] }}" alt="book">
            </div>

            <div class="books-meta-preview">
                <div class="meta">
                    <h4 class="font-bold">{{ $item['title'] }}</h4>
                    <h6 class="">{{ $item['authors'] }}</h6>
                    <h3 class="font-bold">{{ $item['aspekt_price'] }}</h3>
                </div>
                <div class="qty">
                    Mnozstvo: {{ $item['qty'] }}ks
                </div>
            </div>
        </div>
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
</main>

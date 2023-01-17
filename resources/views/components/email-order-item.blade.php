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
            Množstvo: {{ $item['qty'] }} ks
        </div>
    </div>
</div>

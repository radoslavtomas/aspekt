<section>
    <div style="padding: 1rem;border: 1px solid #d4d4d4;margin: 0 auto 1rem auto;border-radius: 0.25rem;width: 300px;">
        <div style="width: 100%;text-align: center;">
            <img style="width: 128px;height: auto;border-radius: 0.25rem;border: 1px solid #e9e9e9" src="https://aspekt-dev.rdslv.com/storage/{{ $item['cover'] }}" alt="book">
        </div>

        <div style="margin-bottom: 0.5rem;text-align: center;">
            <h4 style="font-size: 1rem;line-height: 1.5rem;text-transform: uppercase;font-weight: 700;margin-bottom: 8px;">{{ $item['title'] }}</h4>
            <h6 style="font-size: 0.875rem;line-height: 1.25rem;font-style: italic;margin: 0 0 0.25rem 0;font-weight: 400;">{{ $item['authors'] }}</h6>
            <h3 style="font-weight: 700">{{ $item['aspekt_price'] }}</h3>
            <p style="font-size: 0.875rem;line-height: 1.25rem;padding-bottom: 4px;">Množstvo: {{ $item['qty'] }} ks</p>
        </div>
    </div>
</section>

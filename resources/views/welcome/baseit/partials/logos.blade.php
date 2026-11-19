<section class="clients bi-logos">
    <div class="container">
        <div class="section-title">
            <h2>Our Clients</h2>
            <p>Some of the companies who trust BASE IT.</p>
        </div>
        <div class="bi-logo-grid">
            @foreach(config('baseit.client_logos') as $logo)
            <div class="bi-logo"><img src="{{bimg($logo)}}" alt="Client logo" loading="lazy"></div>
            @endforeach
        </div>
    </div>
</section>

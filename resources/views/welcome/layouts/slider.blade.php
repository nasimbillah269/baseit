@php($slides = config('baseit.slides'))
<!-- Hero Slider: full screen, split image / content, side alternates every slide -->
<section class="bi-hero" id="biHero" aria-roledescription="carousel" aria-label="BASE IT services">
    @foreach($slides as $i=>$slide)
    <div class="bi-hero-slide {{$i % 2 ? 'is-reverse' : ''}} {{$i==0 ? 'is-active' : ''}}" role="group" aria-roledescription="slide" aria-label="{{$i+1}} of {{count($slides)}}" @if($i) aria-hidden="true" @endif>
        <div class="bi-hero-media">
            <div class="bi-hero-img" style="background-image:url('{{bimg($slide['img'])}}')"></div>
            <div class="bi-hero-shade"></div>
        </div>
        <div class="bi-hero-content">
            <span class="bi-hero-num" aria-hidden="true">{{str_pad($i+1, 2, '0', STR_PAD_LEFT)}}</span>
            <div class="bi-hero-inner">
                <span class="bi-hero-tag bi-anim">{{$slide['tag'] ?? config('baseit.company.name')}}</span>
                <h2 class="bi-hero-title bi-anim">{{$slide['title']}}</h2>
                <p class="bi-hero-text bi-anim">{{$slide['text']}}</p>
                <div class="bi-hero-actions bi-anim">
                    <a href="{{bpage($slide['slug'])}}" class="bi-hero-btn">Read More <i class="fas fa-arrow-right"></i></a>
                    <a href="{{bpage('contact-us')}}" class="bi-hero-link">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <div class="bi-hero-controls">
        <button type="button" class="bi-hero-prev" aria-label="Previous slide"><i class="fas fa-chevron-left"></i></button>
        <span class="bi-hero-count"><b>01</b> / {{str_pad(count($slides), 2, '0', STR_PAD_LEFT)}}</span>
        <div class="bi-hero-bars">
            @foreach($slides as $i=>$slide)
            <button type="button" class="bi-hero-bar {{$i==0 ? 'is-active' : ''}}" data-index="{{$i}}" aria-label="Go to slide {{$i+1}}"><i></i></button>
            @endforeach
        </div>
        <button type="button" class="bi-hero-next" aria-label="Next slide"><i class="fas fa-chevron-right"></i></button>
    </div>
</section>

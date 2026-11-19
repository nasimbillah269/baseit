@php($slides = config('baseit.slides'))
{{-- Hero Slider: full-width image on every slide; the text sits on the image's empty side and
     slides in from the left on one slide and from the right on the next ("reverse" animation). --}}
<section class="bi-hero" id="biHero" aria-roledescription="carousel" aria-label="BASE IT services">
    @foreach($slides as $i=>$slide)
    @php($side = ($slide['side'] ?? 'left') === 'right' ? 'right' : 'left')
    <div class="bi-hero-slide is-{{$side}} pos-{{$slide['pos'] ?? 'center'}} {{$i % 2 ? 'from-right' : 'from-left'}} {{$i==0 ? 'is-active' : ''}}"
         @if(!empty($slide['effect'])) data-effect="{{$slide['effect']}}" @endif @if(!empty($slide['text_effect'])) data-text="{{$slide['text_effect']}}" @endif
         role="group" aria-roledescription="slide" aria-label="{{$i+1}} of {{count($slides)}}" @if($i) aria-hidden="true" @endif>
        <div class="bi-hero-bg" style="background-image:url('{{bimg($slide['img'])}}'); background-position: {{$slide['bg_pos'] ?? 'center'}};"></div>
        <div class="bi-hero-shade"></div>
        <div class="bi-hero-content" @if(!empty($slide['width'])) style="--bi-hero-w: {{(int) $slide['width']}}%" @endif>
            <div class="bi-hero-inner">
                <h2 class="bi-hero-title bi-anim">{{$slide['title']}}</h2>
                <p class="bi-hero-text bi-anim">{{$slide['text']}}</p>
                <div class="bi-hero-actions bi-anim">
                    <a href="{{bpage($slide['slug'])}}" class="bi-hero-more">Read More</a>
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

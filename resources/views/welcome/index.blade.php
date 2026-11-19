@extends(welcomeTheme().'layouts.app')
@php($company = config('baseit.company'))
@section('title')
<title>{{$company['title']}}</title>
@endsection
@section('SEO')
<meta name="title" property="og:title" content="{{$company['title']}}" />
<meta name="description" property="og:description" content="{{$company['meta']}}" />
<meta name="keywords" content="{{$company['keywords']}}" />
<meta name="image" property="og:image" content="{{bimg($company['logo'])}}" />
<meta name="url" property="og:url" content="{{route('index')}}" />
<link rel="canonical" href="{{route('index')}}">
@endsection

@section('contents')

@include(welcomeTheme().'layouts.slider')

<!-- Tagline band -->
<section class="bi-tagline">
    <div class="container">
        <div class="bi-tagline-band">
            <h2>{{strtoupper($company['tagline'])}}</h2>
            <span class="bi-tagline-arrow" aria-hidden="true"><i class="fas fa-chevron-down"></i></span>
        </div>
    </div>
</section>

<!-- Services Section (checkerboard blue / green, direction-aware hover) -->
<section class="services bi-services">
    <div class="container">
        <div class="services-grid">
            @foreach(config('baseit.services') as $i=>$service)
            @php($green = ((intdiv($i, 4) + $i % 4) % 2) === 1)
            <a href="{{bpage($service['slug'])}}" class="service-box {{$green ? 'service-box-alt' : ''}}">
                <div class="service-icon"><i class="{{$service['icon']}}"></i></div>
                <h4>{{$service['title']}} <span>{{$service['sub']}}</span></h4>
                <div class="service-overlay">
                    <p>{{$service['text']}}</p>
                    <span class="service-link"><i class="fas fa-link"></i></span>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

@include('welcome.baseit.partials.domain')

@include('welcome.baseit.partials.stats')

<div class="section-wrapper">
    <div class="container-lg">
        <div class="row g-0">
            <!-- Software Grid -->
            <div class="col-lg-8 col-divider pe-lg-4">
                <h2 class="section-title text-start">Our Featured Software</h2>
                <div class="title-underline"></div>
                <div class="row g-0">
                    @foreach(collect(config('baseit.featured_software'))->chunk(3) as $column)
                    <div class="col-md-6 {{$loop->first ? 'pe-md-4' : 'ps-md-2'}}">
                        @foreach($column as $software)
                        <div class="software-item">
                            <div class="sw-icon"><i class="{{$software['icon']}}"></i></div>
                            <div class="sw-body">
                                <h5><a href="{{bpage($software['slug'])}}">{{$software['title']}}</a></h5>
                                <p>{{$software['text']}} <a href="{{bpage($software['slug'])}}">Read more</a></p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Trust Accordion -->
            <div class="col-lg-4 ps-lg-4 mt-5 mt-lg-0">
                <h2 class="section-title text-start">The company whom you trust</h2>
                <div class="title-underline"></div>
                @foreach(config('baseit.trust') as $trust)
                <div class="trust-panel {{$loop->first ? 'active' : ''}}" onclick="togglePanel(this)">
                    <div class="trust-panel-header">
                        <i class="{{$trust['icon']}} panel-icon"></i>
                        <h6>{{$trust['title']}}</h6>
                        <div class="toggle-btn"><i class="fa-solid {{$loop->first ? 'fa-minus' : 'fa-plus'}}"></i></div>
                    </div>
                    <div class="trust-panel-body">
                        <p>{{$trust['text']}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="footer-gear"><i class="fa-solid fa-gear"></i></div>
    </div>
</div>

<!-- Testimonials (same as original) -->
<section class="bi-testi" id="testimonials" @if(file_exists(public_path('welcome/baseit/testimonials-bg.jpg'))) style="background-image:url('{{asset('welcome/baseit/testimonials-bg.jpg')}}')" @endif>
    <div class="bi-testi-band">
        <h2>TESTIMONIALS</h2>
        <p>WHAT PEOPLE SAID</p>
        <span class="bi-testi-arrow" aria-hidden="true"><i class="fas fa-chevron-down"></i></span>
    </div>
    <p class="bi-testi-intro">Let's see what our customer's say about our service.</p>
    <div class="bi-testi-cards">
        @foreach(config('baseit.testimonials') as $testimonial)
        <div class="bi-testi-item">
            <blockquote class="bi-testi-card">&ldquo;{!! $testimonial['text'] !!}&rdquo;</blockquote>
            <div class="bi-testi-author">
                <span class="bi-testi-avatar"><img src="{{asset($testimonial['img'])}}" alt="{{$testimonial['name']}}" loading="lazy"></span>
                <span class="bi-testi-who">
                    <b>{{$testimonial['name']}}</b>
                    <span>{{$testimonial['role']}}</span>
                </span>
            </div>
        </div>
        @endforeach
    </div>
</section>

<!-- Counters + Our Skill Metrix (same as original) -->
<section class="bi-metrix" id="skills">
    <div class="bi-metrix-media" @if(file_exists(public_path('welcome/baseit/skills-bg.jpg'))) style="background-image:url('{{asset('welcome/baseit/skills-bg.jpg')}}')" @endif>
        <div class="bi-metrix-cards">
            @foreach(config('baseit.stats') as $stat)
            <div class="bi-metrix-card">
                <i class="{{$stat['icon']}}"></i>
                <span class="stat-number" data-target="{{$stat['value']}}">{{number_format($stat['value'])}}</span>
                <span class="bi-metrix-label">{{$stat['label']}}</span>
            </div>
            @endforeach
        </div>
    </div>
    <div class="bi-metrix-content">
        <h2>OUR SKILL METRIX</h2>
        <span class="bi-metrix-line"></span>
        <p>Let's see our skills in different sectors.</p>
        @foreach(config('baseit.skills') as $skill)
        <div class="bi-bar">
            <span class="bi-bar-label">{{$skill['label']}}</span>
            <div class="bi-bar-track">
                <div class="bi-bar-fill {{$skill['class']}}" data-width="{{$skill['value']}}%">
                    <span class="bi-bar-tip">{{$skill['value']}}%</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

@endsection

@push('js')
<script>
  function togglePanel(panel) {
    document.querySelectorAll('.trust-panel').forEach(p => {
      if (p !== panel) {
        p.classList.remove('active');
        p.querySelector('.toggle-btn i').classList.replace('fa-minus', 'fa-plus');
      }
    });
    panel.classList.toggle('active');
    const icon = panel.querySelector('.toggle-btn i');
    if (panel.classList.contains('active')) {
      icon.classList.replace('fa-plus', 'fa-minus');
    } else {
      icon.classList.replace('fa-minus', 'fa-plus');
    }
  }
</script>
@endpush

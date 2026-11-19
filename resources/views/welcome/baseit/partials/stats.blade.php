@php($circ = 2 * M_PI * 100)
<section class="bi-stats" id="statistics" @if(file_exists(public_path('welcome/baseit/stats-bg.jpg'))) style="background-image:url('{{asset('welcome/baseit/stats-bg.jpg')}}')" @endif>
    <div class="container-lg text-center">
        <h3 class="bi-stats-small">Our Customers</h3>
        <h2 class="bi-stats-title">Checkout Some <span>Statistics</span></h2>
        <div class="bi-stats-line"><i></i></div>
        <p class="bi-stats-desc">Customer service relates to the service provided to customers before, during and after a service.</p>

        <div class="bi-stats-row">
            @foreach(config('baseit.customer_stats') as $stat)
            <div class="bi-stat">
                <svg viewBox="0 0 220 220" aria-hidden="true">
                    <circle class="bi-stat-track" cx="110" cy="110" r="100"/>
                    <circle class="bi-stat-arc" cx="110" cy="110" r="100" transform="rotate(90 110 110)"
                        style="stroke-dasharray: {{round($circ, 2)}}; stroke-dashoffset: {{round($circ, 2)}}; --to: {{round($circ * (1 - $stat['percent'] / 100), 2)}}"/>
                    <circle class="bi-stat-face" cx="110" cy="110" r="91"/>
                </svg>
                <div class="bi-stat-inner">
                    <span class="stat-number bi-stat-num" data-target="{{$stat['value']}}" data-plain="1">0</span>
                    <span class="bi-stat-label">{{$stat['label']}}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

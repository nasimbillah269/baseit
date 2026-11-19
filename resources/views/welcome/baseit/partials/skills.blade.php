<div class="right-panel">
    <span class="section-tag">What we do</span>
    <h2 class="section-title text-start fw-bold">{{$title ?? 'OUR SKILL METRIX'}}</h2>
    <div class="title-line"></div>
    <p class="section-desc">Let's see our skills in different sectors.</p>
    @foreach($items as $skill)
    <div class="skill-item">
        <div class="skill-header">
            <span class="skill-name">{{$skill['label']}}</span>
            <span class="skill-pct">{{$skill['value']}}%</span>
        </div>
        <div class="skill-track">
            <div class="skill-fill {{$skill['class']}}" data-width="{{$skill['value']}}%"></div>
        </div>
    </div>
    @endforeach
</div>

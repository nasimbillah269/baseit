@extends(welcomeTheme().'layouts.app')
@php($company = config('baseit.company'))
@section('title')
<title>{{$page['title']}} | {{$company['name']}}</title>
@endsection
@section('SEO')
<meta name="title" property="og:title" content="{{$page['title']}} | {{$company['name']}}" />
<meta name="description" property="og:description" content="{{$page['subtitle'] ?? $company['meta']}}" />
<meta name="image" property="og:image" content="{{bimg($company['logo'])}}" />
<meta name="url" property="og:url" content="{{bpage($slug)}}" />
<link rel="canonical" href="{{bpage($slug)}}">
@endsection

@section('contents')

@php($classic = !empty($page['classic']))
{{-- Page Banner: every page uses the same title banner (dark rounded box + curled orange underline) --}}
@php($showCrumb = !empty($page['crumb']) || !$classic)
@php($bannerFile = collect([$page['banner'] ?? null, 'page-banner.jpg'])->filter()->first(fn($f) => file_exists(public_path('welcome/baseit/'.$f))))
@php($bannerImg = $bannerFile ? asset('welcome/baseit/'.$bannerFile) : null) {{-- optional override (page 'banner' or page-banner.jpg); default image is set in baseit.css --}}
<section class="bi-banner-classic" @if($bannerImg) style="background-image:url('{{$bannerImg}}')" @endif>
    <div class="container">
        <h1>{{$page['title']}}</h1>
        @if(!empty($page['subtitle']))<p>{{$page['subtitle']}}</p>@endif
    </div>
    @if($showCrumb)
    <nav class="bi-banner-crumb" aria-label="breadcrumb">
        <a href="{{route('index')}}">BASE IT</a> &gt;
        @if($parent)<a href="{{bpage($parent['slug'])}}">{{$parent['title']}}</a> &gt;@endif
        <span>{{$page['title']}}</span>
    </nav>
    @endif
</section>

<div class="bi-page {{$classic ? 'bi-classic' : ''}}">
@if(!empty($page['sidebar']))
    @foreach($page['blocks'] as $block)
        @if($block['type']==='heading')
            @include('welcome.baseit.partials.block')
        @endif
    @endforeach
    <div class="bi-side-layout">
        <div class="bi-side-main">
            @foreach($page['blocks'] as $block)
                @if($block['type']!=='heading')
                    @include('welcome.baseit.partials.block')
                @endif
            @endforeach
        </div>
        <aside class="bi-side-bar">
            @include('welcome.baseit.partials.sidebar', ['sidebar' => $page['sidebar']])
        </aside>
    </div>
@else
    @foreach($page['blocks'] as $block)
        @include('welcome.baseit.partials.block')
    @endforeach
@endif
</div>

@endsection

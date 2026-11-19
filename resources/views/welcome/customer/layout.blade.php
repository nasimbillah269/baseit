{{-- Shared "My Account" layout: classic banner + left menu + content (customer/*) --}}
@extends(welcomeTheme().'layouts.app')
@section('title')
<title>{{websiteTitle($accountTitle ?? 'My Account')}}</title>
@endsection
@section('SEO')
<meta name="title" property="og:title" content="{{websiteTitle($accountTitle ?? 'My Account')}}" />
<meta name="robots" content="noindex, nofollow" />
@endsection

@section('contents')
<section class="bi-banner-classic">
    <div class="container">
        <h1>My Account</h1>
        <p>Purchase your desire product / service</p>
    </div>
</section>

<div class="bi-acc">
    <div class="bi-acc-wrap">
        <aside class="bi-acc-nav">
            @include(welcomeTheme().'customer.includes.sidebar')
        </aside>
        <div class="bi-acc-main">
            @include(welcomeTheme().'alerts')
            @yield('account')
        </div>
    </div>
</div>
@endsection

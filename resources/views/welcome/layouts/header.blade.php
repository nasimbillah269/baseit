@php($company = config('baseit.company'))
<!-- Whole header (top bar + nav) is sticky on desktop; see .bi-sticky-head in baseit.css -->
<div class="bi-sticky-head" id="biStickyHead">
<!-- Top Bar -->
<div class="top-bar bi-topbar">
    <div class="container">
        <div class="bi-topbar-row">
            <div class="logo">
                <a href="{{route('index')}}" title="{{$company['tagline']}}">
                    <img src="{{bimg($company['logo'])}}" alt="{{$company['name']}}">
                </a>
            </div>
            <div class="bi-topbar-right">
                {{-- Cart icon hidden for now. To show it again, remove this comment wrapper:
                @php($cartCount = request()->cookie('carts') ? (int) \App\Models\Cart::where('cookie', request()->cookie('carts'))->sum('quantity') : 0)
                <a href="{{route('carts')}}" class="bi-cart" aria-label="Cart">
                    <i class="fas fa-shopping-cart"></i>
                    <span>{{$cartCount}}</span>
                </a>
                --}}
                <div class="contact-info">
                    @auth
                    <a href="{{route('customer.dashboard')}}">My Account</a>
                    @else
                    <a href="{{route('login')}}">My Account</a>
                    <a href="{{route('login')}}">Log In</a>
                    @endauth
                    <span class="bi-hotline">Hotline:<i class="fas fa-phone"></i> {{$company['hotline']}}</span>
                    <a href="mailto:{{$company['email']}}"><i class="fas fa-envelope"></i> {{$company['email']}}</a>
                </div>
            </div>
            <div class="mobile-menu-btn" aria-label="Open menu">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </div>
</div>

<!-- Header -->
<header class="header">
    <div class="container-fluid">
        <div class="header-content">
            <nav class="main-nav">
                <ul class="nav-menu">
                    @foreach(config('baseit.menu') as $item)
                        @if(!empty($item['children']))
                        <li class="dropdown {{bactive($item)?'active':''}}">
                            <a href="{{bpage($item['slug'])}}" class="{{bactive($item)?'active':''}}">{{strtoupper($item['label'])}} <i class="fas fa-caret-down bi-caret"></i></a>
                            @if(($item['type'] ?? '')==='list')
                            <ul class="dropdown-menu dropdown-menu-four">
                                @foreach($item['children'] as $child)
                                <li><a href="{{bpage($child['slug'])}}">{{strtoupper($child['label'])}}</a></li>
                                @endforeach
                            </ul>
                            @else
                            <ul class="dropdown-menu {{($item['type'] ?? '')==='mega3'?'dropdown-menu-three':''}}">
                                @foreach($item['children'] as $child)
                                <li>
                                    <a href="{{bpage($child['slug'])}}">
                                        <img src="{{bicon($child['img'] ?? null)}}" alt="{{$child['label']}}" loading="lazy">
                                        <p>{{$child['label']}}</p>
                                        <span>View Details</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @else
                        <li>
                            <a href="{{bpage($item['slug'])}}" class="{{bactive($item)?'active':''}}">
                                @if(!empty($item['icon']))<i class="{{$item['icon']}}"></i>@endif {{strtoupper($item['label'])}}
                            </a>
                        </li>
                        @endif
                    @endforeach
                </ul>
            </nav>
        </div>
    </div>
</header>
</div>

<!-- Mobile Menu -->
<div class="mobile-menu-overlay"></div>
<div class="mobile-menu">
    <div class="mobile-menu-header">
        <img src="{{bimg($company['logo'])}}" alt="{{$company['name']}}" class="mobile-logo">
        <span class="close-menu">&times;</span>
    </div>
    <ul>
        @foreach(config('baseit.menu') as $item)
            @if(!empty($item['children']))
            <li class="mobile-dropdown">
                <a href="javascript:void(0)">{{$item['label']}} <i class="fas fa-chevron-down"></i></a>
                <ul class="mobile-dropdown-menu">
                    <li><a href="{{bpage($item['slug'])}}">All {{$item['label']}}</a></li>
                    @foreach($item['children'] as $child)
                    <li><a href="{{bpage($child['slug'])}}">{{$child['label']}}</a></li>
                    @endforeach
                </ul>
            </li>
            @else
            <li><a href="{{bpage($item['slug'])}}">{{$item['label']}}</a></li>
            @endif
        @endforeach
    </ul>
    <div class="mobile-menu-contact">
        <p><i class="fas fa-phone"></i> {{$company['hotline']}}</p>
        <p><i class="fas fa-envelope"></i> {{$company['email']}}</p>
    </div>
</div>

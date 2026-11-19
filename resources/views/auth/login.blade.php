@extends(general()->theme.'.layouts.app')
@section('title')
<title>{{websiteTitle('My Account')}}</title>
@endsection
@section('SEO')
<meta name="title" property="og:title" content="{{websiteTitle('My Account')}}" />
<meta name="description" property="og:description" content="{!!general()->meta_description!!}" />
<meta name="url" property="og:url" content="{{route('login')}}" />
<link rel="canonical" href="{{route('login')}}">
@endsection

@section('contents')
@php($reg = $errors->getBag('register'))
<section class="bi-banner-classic">
    <div class="container">
        <h1>My Account</h1>
        <p>Purchase your desire product / service</p>
    </div>
</section>

<div class="bi-auth">
    @include(general()->theme.'.alerts')
    <div class="bi-auth-cols">
        {{-- Login --}}
        <div class="bi-auth-col">
            <h2>Login</h2>
            <form action="{{route('login')}}" method="post" class="bi-auth-box bi-acc-form">
                @csrf
                @if(session('loginfail'))<p class="bi-auth-error">{{session('loginfail')}}</p>@endif
                @if(session('loginfailP'))<p class="bi-auth-error">{{session('loginfailP')}}</p>@endif

                <label for="login-user">Username or email address <span>*</span></label>
                <input type="text" id="login-user" name="username" value="{{old('username')}}" maxlength="100" autocomplete="username" required>
                @error('username')<small class="text-danger">{{$message}}</small>@enderror

                <label for="login-pass">Password <span>*</span></label>
                <input type="password" id="login-pass" name="password" autocomplete="current-password" required>
                @error('password')<small class="text-danger">{{$message}}</small>@enderror

                <div class="bi-auth-actions">
                    <button type="submit" class="bi-acc-btn">Log in</button>
                    <label class="bi-auth-remember"><input type="checkbox" name="remember" value="1"> Remember me</label>
                </div>
                <a href="{{route('forgotPassword')}}" class="bi-auth-lost">Lost your password?</a>
            </form>
        </div>

        {{-- Register --}}
        <div class="bi-auth-col">
            <h2>Register</h2>
            <form action="{{route('register')}}" method="post" class="bi-auth-box bi-acc-form">
                @csrf
                <div class="bi-acc-row">
                    <div>
                        <label for="reg-first">First Name</label>
                        <input type="text" id="reg-first" name="first_name" value="{{old('first_name')}}" maxlength="100" autocomplete="given-name">
                        @if($reg->has('first_name'))<small class="text-danger">{{$reg->first('first_name')}}</small>@endif
                    </div>
                    <div>
                        <label for="reg-last">Last Name</label>
                        <input type="text" id="reg-last" name="last_name" value="{{old('last_name')}}" maxlength="100" autocomplete="family-name">
                        @if($reg->has('last_name'))<small class="text-danger">{{$reg->first('last_name')}}</small>@endif
                    </div>
                </div>

                <label for="reg-email">Email address <span>*</span></label>
                <input type="email" id="reg-email" name="email" value="{{old('email')}}" maxlength="100" autocomplete="email" required>
                @if($reg->has('email'))<small class="text-danger">{{$reg->first('email')}}</small>@endif

                <label for="reg-pass">Password <span>*</span></label>
                <input type="password" id="reg-pass" name="password" autocomplete="new-password" required>
                @if($reg->has('password'))<small class="text-danger">{{$reg->first('password')}}</small>@endif

                <button type="submit" class="bi-acc-btn bi-auth-submit">Register</button>
            </form>
        </div>
    </div>
</div>
@endsection

<!-- Domain Checker -->
<section class="domain-checker {{($style ?? null)==='classic' ? 'domain-checker-classic' : ''}}">
    <div class="container">
        <div class="domain-box">
            @isset($heading)<h2 class="domain-heading">{{$heading}}</h2>@endisset
            <h3>{{($style ?? null)==='classic' ? 'CHECK YOUR DOMAIN HERE' : 'Check Your Domain here'}}</h3>
            <form class="domainCheckForm" action="{{route('domainCheck')}}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="domain" class="form-control" placeholder="{{($style ?? null)==='classic' ? '' : 'yourdomain.com'}}" aria-label="Domain name" required>
                    <button type="submit" class="input-group-text">Check</button>
                </div>
                <div class="domain-result" aria-live="polite"></div>
            </form>
        </div>
    </div>
</section>

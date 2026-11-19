@extends(welcomeTheme().'layouts.app') @section('title')
<title>{{$page->seo_title?:websiteTitle($page->name)}}</title>
@endsection @section('SEO')
<meta name="title" property="og:title" content="{{$page->seo_title?:websiteTitle($page->name)}}" />
<meta name="description" property="og:description" content="{!!$page->seo_description?:general()->meta_description!!}" />
<meta name="keywords" content="{{$page->seo_keyword?:general()->meta_keyword}}" />
<meta name="image" property="og:image" content="{{asset($page->image())}}" />
<meta name="url" property="og:url" content="{{route('pageView',$page->slug?:'no-title')}}" />
<link rel="canonical" href="{{route('pageView',$page->slug?:'no-title')}}">
@endsection
@push('css')
<style>
 .contact-card {
    background: #073e27;
    border-radius: 15px;
    transition: all 0.3s ease-in-out;
    border: 1px solid #f1f1f1;
    cursor: pointer;
}
.contactInfo h4 {
    color: #073e27;
}
.contaictUsForm h4 {
    color: #073e27;
}
.contact-card:hover {
    transform: translateY(-8px);
    box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.12);
}

.contact-card .icon {
    width: 70px;
    height: 70px;
    margin: 0 auto 15px;
    border-radius: 50%;
    background: #64ba68;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    color: #fff;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease;
}

.contact-card:hover .icon {
    background: #084298;
    transform: scale(1.1);
}

.contact-card .title {
    font-size: 18px;
    font-weight: bold;
    color: #fff;
    margin-bottom: 10px;
}

.contact-card .info {
    font-size: 15px;
    color: #fff;
    margin: 0;
}

.contact-card a {
    color: #fff;
    text-decoration: none;
    transition: 0.3s;
}

.contact-card a:hover {
    text-decoration: underline;
}
</style>
<script>
    window.dataLayer = window.dataLayer || [];
    dataLayer.push({
        event: "page_view",
        page_category: "page",
        page_title: "{{$page->name}}",
        page_url: "{{route('pageView',$page->slug?:'no-title')}}"
    });
</script>
@endpush 

@section('contents')

<!-- Start of Page Header -->
<div class="page-header" style="background-image: url({{asset($page->image())}}); background-position: center; background-size: cover; background-repeat: no-repeat;">
    <div class="overlayPageHeaderNew">
        <div class="container">
            <h1 class="page-title mb-0">{{$page->name}}</h1>
        </div>
    </div>
</div>
<!-- End of Page Header -->



<div class="contactUsPart">
    <div class="container">
        <div class="newRow">
            <div class="row">
            
              <div class="col-md-1"></div>
                <div class="col-md-10">
                    
                    <div class="contactInfo">
                        <h4>Contact Information</h4>
                        <div class="row g-4">
                            <!-- Address Card -->
                            <div class="col-md-4">
                                <div class="contact-card shadow-sm p-4 text-center">
                                    <div class="icon">
                                        <i class="fa-solid fa-location-dot"></i>
                                    </div>
                                    <h5 class="title">Address</h5>
                                    <p class="info">{{ general()->address_one }}</p>
                                </div>
                            </div>
                    
                            <!-- Phone Card -->
                            <div class="col-md-4">
                                <div class="contact-card shadow-sm p-4 text-center">
                                    <div class="icon">
                                        <i class="fa-solid fa-phone"></i>
                                    </div>
                                    <h5 class="title">Phone Number</h5>
                                    <p class="info">
                                        <a href="tel:{{ general()->mobile }}">{{ general()->mobile }}</a>
                                    </p>
                                </div>
                            </div>
                    
                            <!-- Email Card -->
                            <div class="col-md-4">
                                <div class="contact-card shadow-sm p-4 text-center">
                                    <div class="icon">
                                        <i class="fa-solid fa-envelope"></i>
                                    </div>
                                    <h5 class="title">Email Address</h5>
                                    <p class="info">
                                        <a href="mailto:{{ general()->email }}">{{ general()->email }}</a>
                                    </p>
                                </div>
                            </div>
                        </div>
           
                    </div>
                </div>
                <div class="col-md-1"></div>

            </div>
        </div>

        <div class="contaictUsForm">
            <h4>Get in touch !</h4>
            @if(Session::has('success'))
            <div class="alert alert-success alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <strong>Success! </strong> {{Session::get('success')}}.
            </div>
            @endif
            <form action="{{route('contactMail')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-1"></div>

                    <div class="col-md-5">
                        <div class="mb-3">
                            @if ($errors->has('name'))
                            <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('name') }}</p>
                            @endif
                            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Your Name" />
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="mb-3">
                            @if ($errors->has('email'))
                            <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('email') }}</p>
                            @endif
                            <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Your Email" />
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="mb-3">
                            @if ($errors->has('message'))
                            <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('message') }}</p>
                            @endif
                            <textarea name="message" class="form-control" id="exampleFormControlTextarea1" placeholder="Your Message" rows="6"></textarea>
                        </div>
                        <button type="submit" class="btnSendMsg">Send Message</button>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- contact us section end-->

@endsection @push('js')

<script src="https://www.google.com/recaptcha/api.js"></script>
<script>
    function onSubmit(token) {
        document.getElementById("contentForm").submit();
    }
</script>

@endpush
@extends(welcomeTheme().'layouts.app') @section('title')
<title>{{$product->seo_title?:websiteTitle($product->name)}}</title>
@endsection @section('SEO')
<meta name="title" property="og:title" content="{{$product->seo_title?:websiteTitle($product->name)}}" />
<meta name="description" property="og:description" content="{!!$product->seo_description?:general()->meta_description!!}" />
<meta name="keywords" content="{{$product->seo_keyword?:general()->meta_keyword}}" />
<meta name="image" property="og:image" content="{{asset($product->image())}}" />
<meta name="url" property="og:url" content="{{route('productView',$product->slug?:'no-title')}}" />
<link rel="canonical" href="{{route('productView',$product->slug?:'no-title')}}" />
@endsection @push('css')

<style>

.orderNoteBox {
    border: 1px solid #ccc;
    padding: 20px;
    margin-top: 20px;
    background-color: #eee;
    text-align: center;
    border-radius: 5px;
}

.orderNoteBox p{
    margin: 0;
    padding: 0;
}

    .btn-wishlist.w-icon-heart.active {
        border-color: unset;
        color: #fff;
        background-color: unset;
    }
    .product-single .singleaddCart.disabled {
        background-color: #444;
        border-color: #444;
        color: #aaa;
        cursor: not-allowed;
    }
    .singleaddCart {
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
    }

    .ir {
        text-indent: 100%;
        white-space: nowrap;
        overflow: hidden;
    }

    /**
 * Gallery Styles
 * 1. Enable fluid images
 */
    .gallery {
        overflow: hidden;
    }

    img.zoomImg {
        width: 600px !important;
        height: 600px !important;
    }

    .gallery__hero {
        overflow: hidden;
        position: relative;
        margin: 0 0 0.3333333333em;
        background: #fff;
    }
    .is-zoomed .gallery__hero {
        cursor: move;
    }
    .is-zoomed .gallery__hero img {
        max-width: none;
        position: absolute;
        z-index: 0;
        top: -50%;
        left: -50%;
    }

    .gallery__hero-enlarge:hover {
        opacity: 1;
    }

    img.zoomImg:hover {
        cursor: crosshair;
    }

    .gallery__thumbs {
        text-align: center;
        background: #fff;
    }
    .gallery__thumbs img {
        margin: 5px 0;
    }
    .gallery__thumbs a {
        display: inline-block;
        width: 20%;
        opacity: 0.75;
        transition: opacity 0.3s cubic-bezier(0.455, 0.03, 0.515, 0.955);
    }
    .gallery__thumbs a:hover {
        opacity: 1;
    }
    .gallery__thumbs a.is-active {
        opacity: 1;
    }
    
    ol{
        padding-left: 0!important;
    }
    
    .ctgTag span {
        margin-bottom: 10px;
        color: #373535;
        display: block;
        text-transform: none;
        font-size: 16px;
    }
    
    .ctgTag span b {}
    
    .ctgTag span a {
        color: #6f6b6b;
    }
    
    .ctgTag span a:hover {
        color: black;
    }
    
    .ctgTag span a.share {
        margin-right: 5px;
        padding: 2px 5px;
        height: 30px;
        width: 30px;
        display: inline-block;
        border: 1px solid gray;
        text-align: center;
        border-radius: 100%;
    }
    
    .toggleText {
        border-bottom: 1px solid gray;
        margin-bottom: 15px;
    }
    
    .toggleText p {
        margin-bottom: 15px;
    }
    
    .toggleText ul {
        padding-left: 15px;
        margin-bottom: 15px;
    }
    
    .toggleText ul li {
        padding: 5px 0;
    }
    
    @media only screen and (max-width: 767px){
    
        img.zoomImg {
            width: 100% !important;
            height: 100% !important;
        }
    }
</style>


<script>

    window.dataLayer = window.dataLayer || [];

    dataLayer.push({
        event: "page_view",
        page_category: "Product Details",
        page_title: "{{$product->name}}",
        page_url: "{{route('productView',$product->slug?:'no-title')}}"
    });
    
    
    dataLayer.push({
        event: "view_item",
        ecommerce: {
            items: [{
                item_id: "{{ $product->id }}",
                item_name: "{{ $product->name }}",
                currency: "{{ general()->currency }}", // Your currency
                item_category: "{!! implode(' - ', $product->productCategories->pluck('name')->toArray()) !!}", // Concatenate categories
                item_brand: "{{ $product->brand ? $product->brand->name : '' }}",
                price: "{{ $product->offerPrice() }}",
                item_variant: "{{ $product->variant ?? '' }}",
            }]
        }
    });
    
    
    function addToCart(product) {
        window.dataLayer = window.dataLayer || [];
        
        var qty = $('#quantity').val() || 0;
        
        dataLayer.push({
            event: "add_to_cart",
            ecommerce: {
                items: [{
                    item_id: product.id,
                    item_name: product.name,
                    item_category: product.category_name,
                    price: product.final_price,
                    quantity: parseInt(qty, 10)
                }]
            }
        });
    }
    
    
</script>

@endpush @section('contents')

<!-- Start of Page Header -->
{{--<div class="page-header" style="background-image: url({{asset($product->image())}}); background-position: center; background-size: cover; background-repeat: no-repeat;">
    <div class="overlayPageHeaderNew">
        <div class="container">
            <h1 class="page-title mb-0">{{$product->name}}</h1>
        </div>
    </div>
</div>--}}
<!-- End of Page Header -->

<div class="singlePagePart">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="singleProductLeftGrid">
                    <!-- Gallery -->
                    <div id="js-gallery" class="gallery">
                        <!--Gallery Hero-->
                        <div class="gallery__zoomimg">
                            <img src="{{asset($product->image())}}" alt="{{$product->name}}" />
                        </div>
                        <!--Gallery Hero-->

                        <!--Gallery Thumbs-->
                        <div class="gallery__thumbs">
                            @foreach($product->galleryFiles as $file)
                            <a href="{{asset($file->image())}}" data-gallery="thumb" class="is-active">
                                <img src="{{asset($file->image())}}" />
                            </a>
                            @endforeach
                        </div>
                        <!--Gallery Thumbs-->
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="singlePrductInfoGrid">
                    <h2>{{$product->name}}</h2>
                    @if($product->weight_per_pices)
                    <span style="font-weight: bold;color: black;">{!!$product->weight_per_pices!!}</span>
                    @endif
                    <!--<div class="SingleProductRating">-->
                    <!--    <i class="fa fa-star" aria-hidden="true"></i>-->
                    <!--    <i class="fa fa-star" aria-hidden="true"></i>-->
                    <!--    <i class="fa fa-star" aria-hidden="true"></i>-->
                    <!--    <i class="fa fa-star" aria-hidden="true"></i>-->
                    <!--    <i class="fa fa-star" aria-hidden="true"></i>-->
                    <!--    <span>(5)</span>-->
                    <!--</div>-->
                    <p class="SingleProcutprice">

                        <span> {{priceFullFormat($product->offerPrice())}}   @if($product->regular_price > $product->offerPrice()) <del>{{priceFullFormat($product->regular_price)}}</del> @endif</span> 
                        @if($product->regular_price > $product->offerPrice())
                        <span class="saveTk">Save {{priceFormat($product->regular_price - $product->offerPrice())}} BDT</span>
                        @endif
                    </p>
                    
                    <p class="pWeight">
                        Weight : {{$product->productWeight()}}
                    </p>
                    
                    <h6 class="stockReady">Availability: <span class="stock">In Stock</span></h6>
                    {{--<p>
                        {!!$product->short_description!!}
                    </p>--}}
                    @include(welcomeTheme().'.alerts')
                    <form action="{{route('addToCart',$product->id)}}" class="singleForm_{{$product->id}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="quntity" style="margin-bottom: 0;">
                                    <!--<span>Quantity</span>-->
                                    <button type="button" class="dcrementBtn" id="decrement">-</button>
                                    <input class="quantity" readonly="" name="quantity" type="text" value="1" step="any" />
                                    <button type="button" class="incrementBtn" id="increment">+</button>
                                </div>
                                
                                <p class="product-info-panel">
                                    <!--<b>Gross Weight:</b> <span class="grossWeight" data-weight="{{$product->weight_per_ices}}" >{{$product->productGrossWeightAmount()}}</span>-->
                                    <!--<b>Net Weight:</b> <span class="NetWeight" data-weight="{{$product->weight_amount?:1}}">{{$product->productWeightAmount()}}</span>-->
                                </p>
                            </div>
                            
                            <div class="col-md-12">
                                <button type="button" name="orderNow" value="cart" onclick="addToCart({{ json_encode($product) }})" data-url="{{route('addToCart',$product->id)}}" data-id="{{$product->id}}" class="btnAddToCart singleaddCart addTo">Add to cart</button>
                            </div>
                            <div class="col-md-12">
                                <button type="button" name="orderNow" value="checkout" onclick="addToCart({{ json_encode($product) }})" data-url="{{route('addToCart',$product->id)}}" data-id="{{$product->id}}" class="btnAddToCart singleaddCart">Buy Now</button>
                            </div>
                        </div>
                    </form>
                    
                    <div class="productAccroMain">
                        <div class="toggle-section">
                            
                            <div class="toggleButton" style="border-top: 1px solid #000; padding-top: 20px;">
                                <div class="toggleTop">
                                    <div class="toggleInfoIcon"><i class="fa fa-file-o" aria-hidden="true"></i></div>
                                    <div class="toggleTitle">
                                        <h3 class="toggle-heading">Product Description </h3>
                                        <p>🔍See our product description</p>
                                    </div>
                                </div>
                                <div><span class="icon">+</span></div>
                            </div>
                            
                          <div class="toggle-content" style="border-bottom: 1px solid gray;margin-bottom: 15px;">
                            <p>
                                 {!!$product->description!!}
                            </p>
                          </div>
                          
                          
                            
                          
                          
                            {{--                          
                            <div class="toggleButton">
                                <div class="toggleTop">
                                    <div class="toggleInfoIcon"><i class="fa fa-star-o" aria-hidden="true"></i></div>
                                    <div class="toggleTitle">
                                        <h3 class="toggle-heading">Customer Reviews</h3>
                                        <p>🎉 3,00,000+ 😍 Happy Customers & ⭐⭐⭐⭐⭐ Reviews! 🚀</p>
                                    </div>
                                </div>
                                <div><span class="icon">+</span></div>
                            </div>
                            
                            <div class="toggle-content">
                                <p>
                              At AZL Sea Food, customer satisfaction is our top priority. We are committed to delivering high-quality, fresh seafood every time. However, if you are not completely satisfied with your order, please review our return policy below:

                                ✅ Returns & Replacements
                                Due to the perishable nature of seafood, returns are only accepted if the product is damaged, spoiled, or incorrect at the time of delivery.
                                
                                Customers must notify us within 24 hours of receiving the order to be eligible for a return or replacement.
                                
                                To process a return, please provide clear photos of the product and a brief explanation of the issue.
                                
                                ✅ Refunds
                                If a return is approved, you may choose between a full refund or a replacement item.
                                
                                Refunds are processed within 5–7 business days to your original payment method.
                                
                                ✅ Non-Returnable Items
                                Products that were delivered in good condition and match the order are not eligible for return or refund.
                                
                                We do not accept returns for change of mind after delivery.
                                
                                ✅ How to Request a Return
                                Contact our customer service at [your phone number/email] within 24 hours.
                                
                                Provide your order number, photos, and reason for the return.
                                
                                Wait for confirmation and return instructions.
                                
                                We thank you for trusting AZL Sea Food. Your satisfaction and trust mean everything to us.


                                </p>
                            </div>
                            --}}
                          
                        </div>
                    </div>
                    
                    <div>
                        <p class="ctgTag">
                            
                            @if($product->productCategories->count()  > 0)
                            <span>
                            <b>Category:</b> @foreach($product->productCategories as $i=>$ctg){{$i==0?'':','}} <a href="{{route('productCategory',$ctg->slug?:'no-title')}}">{{$ctg->name}} </a> @endforeach
                            </span>
                            @endif
                            @if($product->productTags->count() > 0)
                            <span>
                            <b>Tag: </b> @foreach($product->productTags as $i=>$ptag) @if($tag =$ptag->attribute) {{$i==0?'':','}} {{$tag->name}} @endif @endforeach
                            </span>
                            @endif
                            <span>
                                <b>Share: </b> 
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ url(route('productView', $product->slug ?: 'no-title')) }}" target="_blank" class="share"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://twitter.com/intent/tweet?url={{ url(route('productView', $product->slug ?: 'no-title')) }}&text={{ urlencode($product->name) }}" target="_blank" class="share"><i class="fab fa-twitter"></i></a>
                                <a href="https://pinterest.com/pin/create/button/?url={{ url(route('productView', $product->slug ?: 'no-title')) }}&media={{asset($product->image())}}&description={{ urlencode($product->name) }}" target="_blank" class="share"><i class="fab fa-pinterest"></i></a>
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ url(route('productView', $product->slug ?: 'no-title')) }}&title={{ urlencode($product->name) }}" target="_blank" class="share"><i class="fab fa-linkedin"></i></a>
                                <a href="https://wa.me/?text={{ urlencode($product->name . ' : ' . url(route('productView', $product->slug ?: 'no-title'))) }}" target="_blank" class="share"><i class="fab fa-whatsapp"></i></a>
                            </span>
                        </p>
                    </div>
                    <!--<div class="orderNoteBox">-->
                    <!--    <p>-->
                    <!--        Order within the next <b id="countdown"></b> for dispatch today, and you'll receive your package between <span id="dates"></span>-->
                    <!--    </p>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
    </div>
</div>

{{--<div class="singleProductDescriptionPart">
    <div class="container">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                    Description
                </button>
            </li>
            <!--<li class="nav-item" role="presentation">-->
            <!--    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">-->
            <!--        Additional Information-->
            <!--    </button>-->
            <!--</li>-->
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                <div class="row">
                    <div class="col-md-6">
                        <div class="productImg">
                            <img src="{{asset($product->image())}}" alt="{{$product->name}}" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="productInfo">
                            <h4>Product information</h4>
                            <p>
                                {!!$product->description!!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                <div class="addtionalInfo">
                    <p>
                        
                    </p>
                </div>
            </div>
            
        </div>
    </div>
</div>--}}

<!-- related product start -->
<div class="relatedProductPart">
    <div class="container">
        <h4>Related Products</h4>

        <div class="row">
            @foreach($relatedProducts as $product)
            <div class="col-md-3 col-6" style="padding: 0 10px;">
                @include(welcomeTheme().'products.includes.productCard')
            </div>
            @endforeach
        </div>
        
    </div>
</div>
<!-- related product end -->

@endsection @push('js')

<script>
    $(document).ready(function() {
        function formatDate(date) {
            var day = date.getDate();
            var month = date.getMonth() + 1; // Months are zero-based
            var year = date.getFullYear();
            
            // Add leading zero for single digit months and days
            if (day < 10) day = '0' + day;
            if (month < 10) month = '0' + month;
            
            return day + '/' + month + '/' + year;
        }

        function displayFutureDates() {
            var today = new Date();
            const currentHour = today.getHours();
            // Calculate dates 4 and 5 days from today
            if (currentHour < 12) {
                var date4DaysFromNow = new Date(today);
                date4DaysFromNow.setDate(today.getDate() + 1);
        
                var date5DaysFromNow = new Date(today);
                date5DaysFromNow.setDate(today.getDate() + 2);
            } else {
                var date4DaysFromNow = new Date(today);
                date4DaysFromNow.setDate(today.getDate() + 2);
        
                var date5DaysFromNow = new Date(today);
                date5DaysFromNow.setDate(today.getDate() + 3);
            }
        
            // Format dates
            var formattedDate4DaysFromNow = formatDate(date4DaysFromNow);
            var formattedDate5DaysFromNow = formatDate(date5DaysFromNow);
        
            // Display dates
            $("#dates").html("<b>" + formattedDate4DaysFromNow + "</b> & " + "<b>" + formattedDate5DaysFromNow + "</b>");
        }
        
        displayFutureDates();
    });
</script>

<script>
    $(document).ready(function() {
        function updateCountdown() {
            var now = new Date();
            var targetTime = new Date();
            
            // Set target time to 12 PM of the current day
            targetTime.setHours(12, 0, 0, 0);

            // If it's already past 12 PM, set target time to 12 PM of the next day
            if (now.getTime() > targetTime.getTime()) {
                targetTime.setDate(targetTime.getDate() + 1);
            }

            var timeDifference = targetTime - now;
            var hours = Math.floor(timeDifference / (1000 * 60 * 60));
            var minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));

            $('#countdown').text(hours + ' hours ' + minutes + ' minutes');
        }

        // Update the countdown every minute
        updateCountdown();
        setInterval(updateCountdown, 60000);
    });
</script>

<script>

if ($(window).width() > 768) {
    
    var App = (function () {

      //=== Use Strict ===//
      'use strict';

      //=== Private Variables ===//
      var gallery = $('#js-gallery');
      $('.gallery__zoomimg').zoom();


      //=== Gallery Object ===//
      var Gallery = {
        zoom: function(imgContainer, img) {
          var containerHeight = imgContainer.outerHeight(),
          src = img.attr('src');

        },
        switch: function(trigger, imgContainer) {
          var src = trigger.attr('href'),
          thumbs = trigger.siblings(),
    			img = trigger.parent().prev().children();

          // Add active class to thumb
          trigger.addClass('is-active');

          // Remove active class from thumbs
          thumbs.each(function() {
            if( $(this).hasClass('is-active') ) {
              $(this).removeClass('is-active');
            }
          });


          // Switch image source
          img.attr('src', src);
        }
      };

      //=== Public Methods ===//
      function init() {


       // Listen for clicks on anchors within gallery
        gallery.delegate('a', 'click', function(event) {
          var trigger = $(this);
          var triggerData = trigger.data("gallery");

          if ( triggerData === 'zoom') {
            var imgContainer = trigger.parent(),
            img = trigger.siblings();
            Gallery.zoom(imgContainer, img);
          } else if ( triggerData === 'thumb') {
            var imgContainer = trigger.parent().siblings();
            Gallery.switch(trigger, imgContainer);
          } else {
            return;
          }

          event.preventDefault();
        });
      }

      //=== Make Methods Public ===//
      return {
        init: init
      };

    })();

    App.init();
}else{
    
    $('.gallery__thumbs a').click(function(e){
        e.preventDefault();
        $('.gallery__thumbs a').removeClass('is-active');
        $(this).addClass('is-active');
        
        img = $(this).attr('href');
        $('.gallery__zoomimg img').attr('src',img);
        
    });
    
}
    $(document).ready(function(){

        $(document).on("click", ".product-variations .size", function (e) {
            $('.product-variations .size').removeClass('active');
            $(this).addClass('active');
            var size=null;
            if($('.product-variations .size.active').data('id')){
               size =$('.product-variations .size.active').data('id');
            }
            $('.product-size-swatch .input').val(size);
            activeCartBtn();
        });

        $(document).on("click", ".product-variations .color", function (e) {
            $('.product-variations .color').removeClass('active');
            $(this).addClass('active');
            var color=null;
            if($('.product-variations .color.active').data('id')){
               color =$('.product-variations .color.active').data('id');
            }
            $('.product-color-swatch .input').val(color);
            activeCartBtn();
        });

        function activeCartBtn(){
            var allSizesActive =false;
            var allColorsActive =false;
            var status=true;
            if($('.product-variation-form').hasClass('product-size-swatch')){
                allSizesActive =allHaveClass('.product-variations .size', 'active');
            }
            if($('.product-variation-form').hasClass('product-color-swatch')){
               allColorsActive =allHaveClass('.product-variations .color', 'active');
            }

            if(allSizesActive){
                status=false;
            }else if(allColorsActive){
                status=false;
            }

            if(status){
               $('.singleaddCart').removeClass('disabled');
            }

        }

        $(document).on("click", ".singleaddCart.disabled", function (e) {
            var allSizesActive =false;
            var allColorsActive =false;
            if($('.product-variation-form').hasClass('product-size-swatch')){
                allSizesActive =allHaveClass('.product-variations .size', 'active');
            }
            if($('.product-variation-form').hasClass('product-color-swatch')){
               allColorsActive =allHaveClass('.product-variations .color', 'active');
            }
            if(allSizesActive){
                alert('Please Select Size');
            }else if(allColorsActive){
                alert('Please Select Color');
            }
        });

        function allHaveClass(selector, className) {
            var allHaveClass = true;
            $(selector).each(function() {
                if ($(this).hasClass(className)) {
                    allHaveClass = false;
                }
            });
            return allHaveClass;
        }

       
    });
</script>

@endpush

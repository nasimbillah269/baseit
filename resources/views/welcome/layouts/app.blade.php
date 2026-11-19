<!DOCTYPE html>
<html lang="en">
    <head>
        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{csrf_token()}}" />
        <meta name="google-site-verification" content="J83tCwnluEL14Isb7yJlJT1VxKft8ZZmOO0ULHidFFA" />
        <meta name="facebook-domain-verification" content="2n23ndpkt8jdx0lrekp35jp7vsozcp" />
        @yield('title')
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset(general()->favicon())}}" />
        @yield('SEO')
        
        <!-- Google Font CDN-->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Geologica:wght@100..900&display=swap" rel="stylesheet" />
        <!-- Bootstrap CS CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />

        <!-- Font Awesome CSS CDN-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <!-- Slick Slider CSS CDN-->
        <link rel="stylesheet" type="text/css" href="{{asset('welcome/css/slick.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('welcome/css/slick-theme.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('welcome/css/jquery.fancybox.css')}}" />
        
        <!-- Matis Menus CSS -->
        <link rel="stylesheet" href="{{asset('welcome/css/metisMenu.css')}}" />
        
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />
        <!-- Custom Css for this Design -->
        <link rel="stylesheet" href="{{asset('welcome/css/style.css')}}" />
        <link rel="stylesheet" href="{{asset('welcome/css/baseit.css')}}?v=55" />
        
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-KRT53QGM');</script>
        <!-- End Google Tag Manager -->
        
        <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=1703670447056577&ev=PageView&noscript=1"
        /></noscript>
        <!-- End Meta Pixel Code -->
        

        <style>
        /*    .load-more-overlay {*/
        /*        width: 20px;*/
        /*        height: 20px;*/
        /*        border: 2px solid #2d5;*/
        /*        border-bottom-color: transparent;*/
        /*        border-radius: 50%;*/
        /*        box-sizing: border-box;*/
        /*        animation: rotation 1s linear infinite;*/
        /*        display: none;*/
        /*        position: absolute;*/
        /*        left: 8px;*/
        /*    }*/
            
        /*    .load-more-overlay.loading {*/
        /*        display:block;   */
        /*    }*/
        
        /*    @keyframes rotation {*/
        /*        0% {*/
        /*            transform: rotate(0deg);*/
        /*        }*/
        /*        100% {*/
        /*            transform: rotate(360deg);*/
        /*        }*/
        /*    } */
            
        /*    .btn-cart {*/
        /*        position: relative;*/
        /*    }*/
            /*.ms a i {*/
            /*    background-color: #fff !important;*/
            /*    color: #000 !important;*/
            /*    font-size: 28px;*/
            /*}*/
            
        /*    .freeShipping {*/
        /*        display: none;*/
        /*    }*/
            
            
        /*   .whatsapp-btn {*/
        /*    position: fixed;*/
        /*    bottom: 25px;*/
        /*    right: 25px;*/
        /*    width: 60px;*/
        /*    height: 60px;*/
        /*    background-color: #25D366;*/
        /*    color: #fff;*/
        /*    border-radius: 50%;*/
        /*    text-align: center;*/
        /*    line-height: 60px;*/
        /*    font-size: 30px;*/
        /*    z-index: 9999;*/
        /*    box-shadow: 0 4px 15px rgba(0,0,0,0.3);*/
        /*    transition: transform 0.3s ease, background-color 0.3s ease;*/
        /*    animation: pulse-bg 2s infinite;*/
        /*}*/
        
        /*.whatsapp-btn:hover {*/
        /*    background-color: #128C7E;*/
        /*    transform: scale(1.2);*/
        /*}*/
        
        /* Zooming Background Animation */
        /*@keyframes pulse-bg {*/
        /*    0% {*/
        /*        box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7);*/
        /*    }*/
        /*    70% {*/
        /*        box-shadow: 0 0 0 15px rgba(37, 211, 102, 0);*/
        /*    }*/
        /*    100% {*/
        /*        box-shadow: 0 0 0 0 rgba(37, 211, 102, 0);*/
        /*    }*/
        /*}       */
        
        
        /*span#PrintAction {*/
        /*    color: #fff !important;*/
        /*    font-weight: bold;*/
        /*}    */
            
            
            

        </style>
        
        @stack('css')
        
    </head>
    
    <body>
        <div class="bi-flash">@include('welcome.alerts')</div>
            
        <!--Header Part Include Start-->
        @include(general()->theme.'.layouts.header')

        <!--Main Section Start-->
        @yield('contents')
        <!--Main Section End-->
        
        <!--Footer Part Include Start-->
        @include(general()->theme.'.layouts.footer')

        <!-- Floating "Leave a message" chat box -->
        @include(general()->theme.'.layouts.chat')

        <!--<div class="mobile-menu-side-modals side-modals left">-->
        <!-- <a href="javascript:void(0)" class="overlay side-modals-close"></a>-->
        <!--    <div class="cartAreaSection">-->
        <!--    @include(general()->theme.'.layouts.cartModal')-->
        <!--    </div>-->
        <!--</div>-->
            
        <!--<div class="cartAreaSection2">-->
        <!--@include(general()->theme.'.layouts.checkoutModal')-->
        <!--</div>-->
        
        <!-- WhatsApp Button -->
        <!--<a href="https://wa.me/8801552201822" target="_blank" class="whatsapp-btn">-->
        <!--    <i class="fa-brands fa-whatsapp"></i>-->
        <!--</a>-->
        
        <!-- <div class="mobileFixedFooter">-->
        <!--    <ul>-->
        <!--        <li>-->
        <!--            <a href="{{route('index')}}">-->
        <!--                <i class="fa fa-home"></i>-->
        <!--                <span>Home</span>-->
        <!--            </a>-->
        <!--        </li>-->
        <!--        <li>-->
        <!--            <a href="#">-->
        <!--                <i class="fa fa-th" aria-hidden="true"></i>-->
        <!--                <span>All Products</span>-->
        <!--            </a>-->
        <!--        </li>-->
                <!--<li>-->
                <!--    @if(Auth::check())-->
                <!--    <a href="{{route('customer.dashboard')}}">-->
                <!--        <i class="fa fa-user"></i>-->
                <!--        <span>Login</span>-->
                <!--    </a>-->
                <!--    @else-->
                <!--    <a href="{{route('login')}}">-->
                <!--        <i class="fa fa-user"></i>-->
                <!--        <span>Login</span>-->
                <!--    </a>-->
                <!--    @endif-->
                <!--</li>-->
        <!--        <li>-->
        <!--            <a href="javascript:void(0)" class="moble-menus-models">-->
        <!--                <div>-->
        <!--                    <i class="fa fa-shopping-bag"></i>-->
        <!--                    <span class="cart-count">@isset($cartsCount){{$cartsCount}}@endisset</span>-->
        <!--                </div>-->
        <!--                <span>Cart</span>-->
        <!--            </a>-->
        <!--        </li>-->
                <!--<li>-->
                <!--    <a href="{{route('myWishlist')}}">-->
                <!--        <div>-->
                <!--            <i class="fa fa-heart-o"></i>-->
                <!--            <span class="wish-count">0</span>-->
                <!--        </div>-->
                <!--        <span>Wishlist</span>-->
                <!--    </a>-->
                <!--</li>-->
        <!--        <li class="ms">-->
        <!--            <a href="javascript:void(0)" onclick="openSearch()" >-->
                        
        <!--                <i class="fa fa-search"></i>-->
        <!--                 <span>Search</span>-->
        <!--                </a>-->
        <!--        </li>-->
                
        <!--    </ul>-->
        <!--</div>-->
        
        <!-- Jquery Script  CDN-->
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.21/jquery.zoom.js"></script>
        
        <!-- Bootstrap Script  CDN-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <!-- Metis Menus Script -->
        <script src="{{asset('welcome/js/metisMenu.min.js')}}"></script>

        <!-- Sweet Alert CDN -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <!-- Slick slider CDN -->
        <script type="text/javascript" src="{{asset('welcome/js/slick.min.js')}}"></script>

        <!--iconify Script CDN-->
        <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>

        <!-- Custom Script for this Design -->
        <script src="{{asset('welcome/js/myScript.js')}}"></script>
        <script src="{{asset('welcome/js/baseit.js')}}?v=13"></script>
        
        <script>
              $(document).ready(function () {
                 // Increment button click
                $(".incrementBtn").click(function (e) {
                    e.preventDefault();
                    let quantityInput = $(this).siblings(".quantity");
                    let quantity = parseInt(quantityInput.val());
                    quantityInput.val(quantity + 1);
            
                    weightCalculate(quantity + 1, $(this));
                });
            
                // Decrement button click
                $(".dcrementBtn").click(function (e) {
                    e.preventDefault();
                    let quantityInput = $(this).siblings(".quantity");
                    let quantity = parseInt(quantityInput.val());
            
                    if (quantity > 1) {
                        quantityInput.val(quantity - 1);
                        weightCalculate(quantity - 1, $(this));
                    }
                });
            
                // Weight calculation function
                function weightCalculate(quantity, button) {
                    let container = button.closest(".product-info-panel");
                    let weight = parseFloat($('.NetWeight').data('weight'));
                    let ice = parseFloat($('.grossWeight').data('weight'));
            
                    let grossWeight = ((weight + ice) * quantity).toFixed(2) + ' KG';
                    let netWeight = (weight * quantity).toFixed(2) + ' KG';
            
                    $('.grossWeight').text(grossWeight);
                    $('.NetWeight').text(netWeight);
                }
                
                
              });
        </script>
        
        
    
        
        
        <script>
          $(document).ready(function(){
            $(".toggleButton").click(function(){
              // Hide all contents
              $(".toggle-content").slideUp();
              $(".toggleButton .icon").text("+");
        
              // Show clicked content if it's not already visible
              var content = $(this).next(".toggle-content");
              if(!content.is(":visible")) {
                content.slideDown();
                $(this).find(".icon").text("−");
              }
            });
          });
        </script>
        
        
        <script>
             $(document).on("click", ".singleaddCart:not(.disabled)", function (e) {

            var that =$(this);
            var id =that.data('id');
            var url = that.attr("data-url");

            var data = $('.singleForm_'+id).serialize();
            $('.alert-cart-product').remove();
            var type = that.attr('value');
            var reurl = "{{route('checkout')}}";

            $.ajax({
                url: url,
                method: "POST",
                data: data,
                beforeSend: function() {
                    $(that).find('.load-more-overlay').removeClass('loading');
                },
            })
            .done(function (data) {
                if(type == 'checkout'){
                    window.location.href = reurl;
                }else{
                    $('.mobile-menu-side-modals').addClass('open-side');
                    $("body").css('overflow-y','hidden');
                }
                
                $(that).find('.load-more-overlay').removeClass('loading');
                $(".cart-count").empty().append(data.cartCount);
                $(".cartAreaSection").empty().append(data.cartItem);
                $(".cartAreaSection2").empty().append(data.cartItem2);
            })
            .fail(function () {
                $(that).removeClass('load-more-overlay loading');
                // location.reload(true);
            });

        });
        </script>
        
        
        
        
        
        
        
        <script>
            $(document).ready(function(){
                
                $(document).on('click','.discountApply .apply',function(){
                    var code =$('.discountApply input').val();
                    var areaId =$('#district2').val();
                    var cityId =$('#city2').val();
                    if(code=='' || code=='undefined' || code==null){
                        $('.discountApply .couponErro').empty().append('<span style="color:red;">Input Coupon Code here..</span>');
                    }else{
                        
                        var url = "{{route('couponApply')}}";
                        
                        $.ajax({
                            url: url,
                            method: "POST",
                            data: {
                                coupon_code: code,
                                areaId: areaId,
                                cityId: cityId,
                                _token: "{{ csrf_token() }}" // Laravel CSRF token
                            },
                        })
                        .done(function (data) {
                            if(data.status=='success'){
                                $('.discountApply .couponErro').empty().append('<span style="color:green;">'+data.message+'</span>');
                                $('.cartItemsTotal').empty().append(data.view2);
                            }else{
                               $('.discountApply .couponErro').empty().append('<span style="color:red;">'+data.message+'</span>'); 
                            }
                            
                        })
                        .fail(function () {
                            //location.reload(true);
                        });
                        
                    }
                });
                
                $(document).on('keyup','.discountApply input',function(){
                    $('.discountApply .couponErro').empty();
                });
                
                $('.downMenus i').click(function(){
                    // $(this).parent().toggleClass('active');
                    const $li = $(this).parent();
                    const $ul = $li.parent().children('ul');
                    $li.toggleClass('active');
                    if ($li.hasClass('active')) {
                       $ul.slideDown();
                    } else {
                       $ul.slideUp();
                    }
                });
                
                
                 /** Mobile sidebar Menus  js **/
                $('.moble-menus-models').click(function(){
                  $('.mobile-menu-side-modals').addClass('open-side');
                  $("body").css('overflow-y','hidden');
                  viewCartDataCall();
                  
                });
                
                $('.moble-menus-models2').click(function(){
                  $('.mobile-menu-side-modals2').addClass('open-side');
                  $("body").css('overflow-y','hidden');
                  console.log("hello");
                  viewCartDataCall();
                  
                });
            
                $(document).on('click','.side-modals-close',function(){
                  $('.side-modals').removeClass('open-side');
                  $("body").css('overflow-y','');
                })
                /** Mobile sidebar Menus  js **/
                
                /** CSRF Token Header Set **/
                $.ajaxSetup({
            	    headers: {
            	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            	    }
            	});
            	
            	$(document).on("click", ".btn-wishlist", function () {
            	    var that =$(this);
                    var id = that.attr("data-id");
                    var url = that.attr("data-url");
                    $.ajax({
                        url: url,
                        method: "GET",
                        beforeSend: function() {
                            $(that).find('.load-more-overlay').addClass('loading');
                        },
                    })
                    .done(function (data) {
                        $(that).find('.load-more-overlay').removeClass('loading');
                        if(data.status){
                            $(that).addClass('active');
                        }else{
                            $(that).removeClass('active');
                        }
                        $(".wishlist-count").empty().append(data.count);
                        $('.mywishList').empty().append(data.itemsView);
                    })
                    .fail(function () {
                        $(that).find('.load-more-overlay').removeClass('loading');
                        //location.reload(true);
                    });

            	});
            	$(document).on("click", ".btn-cart", function () {
            	    var that =$(this);
                    var id = that.attr("data-id");
                    var url = that.attr("data-url");
                    
                    $.ajax({
                        url: url,
                        method: "GET",
                        beforeSend: function() {
                            $(that).find('.load-more-overlay').addClass('loading');
                        },
                    })
                    .done(function (data) {
                        $('.mobile-menu-side-modals').addClass('open-side');
                        $("body").css('overflow-y','hidden');
                        $(that).find('.load-more-overlay').removeClass('loading');
                        $(".cart-count").empty().append(data.cartCount);
                        $(".cartAreaSection").empty().append(data.cartItem);
                        $(".cartAreaSection2").empty().append(data.cartItem2);
                    })
                    .fail(function () {
                        $(that).find('.load-more-overlay').removeClass('loading');
                        // location.reload(true);
                    });
            	    
            	});
            	
            	$(document).on("click", ".orderModalAction", function () {
  
            	    beginCheckout();
            	});
            	
            	$(document).on("click", ".cartUpdate", function () {
            	    var that =$(this);
                    var url = that.attr("data-url");
                    $.ajax({
                        url: url,
                        method: "GET",
                    })
                    .done(function (data) {
                        $(".cart-count").empty().append(data.cartCount);
                        $('.cartItemsAll').empty().append(data.cartItems);
                        $(".cartAreaSection").empty().append(data.cartItem);
                        $(".cartAreaSection2").empty().append(data.cartItem2);
                    })
                    .fail(function () {
                       // location.reload(true);
                    });
            	});
            	
            	$(document).on("change", "#district2", function(){
                    var id = $(this).val();
                      if(id==''){
                       $('#city2').empty().append('<option value="">No City</option>');
                      }else{
                          var url = '{{url("/checkout")}}?areaId='+id;
                          $.get(url,function(data){
                            $('#city2').empty().append(data.geoData);
                            $('.orderSummryTable').empty().append(data.view);
                            $('.cartItemsTotal').empty().append(data.view2);
                          });  
                      }
                });
                
                $(document).on("change", "#city2", function(){
                        var area = $('#district2').val();
                        var id = $(this).val();
                      if(id=='' || area==''){
                       //$('#city').empty().append('<option value="">No City</option>');
                      }else{
                          var url = '{{url("/checkout")}}?areaId='+area+'&cityId='+id;
                          $.get(url,function(data){
                            $('.orderSummryTable').empty().append(data.view);
                            $('.cartItemsTotal').empty().append(data.view2);
                          });  
                      }
                });
            	
            	$(document).on('click','.subsriberbtm',function(e){
            	    
                    e.preventDefault();
                    var url = $('#subscirbeForm').data('url');
                    var formData =$('#subscirbeForm').serialize();
                    if(validateEmail()){
                        $.ajax({
                          url: url,
                          type: 'POST',
                          dataType: 'json',
                          data: formData,
                          cache: false,
                        })
                        .done(function(data) {
                            if(data.success)
                              {
                                $("#subscribeemailMsg").html("<span style='background: #00baa3;padding: 5px 15px;'>"+ data.message +"</span>");
                                $("#subscirbeForm")[0].reset();
                              }else{
                                $("#subscribeemailMsg").html("<span style='background: #ffc107;padding: 5px 15px;'>"+ data.message +"</span>");
                              }
                        })
                        .fail(function() {
                          // alert("error");
                        });
                    }else{ 
                        $("#subscribeemailMsg").html("<span style='background: #e52734;padding: 5px 15px;'>Please Write a Verified Email</span>");
                    }
        
            });
        
            function validateEmail(){
                  var subscribeEmail=$("#subscribeEmail").val();
                   var reg =/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                   if(reg.test(subscribeEmail)){
                      return true;
                   }else{
                      return false;
              }
            }
            	
                
            });
        </script>
        
        <script>
            function openSearch() {
              document.getElementById("myOverlay").style.display = "block";
            }
            
            function closeSearch() {
              document.getElementById("myOverlay").style.display = "none";
            }
        </script>
        
        @stack('js')
        
    </body>
</html>

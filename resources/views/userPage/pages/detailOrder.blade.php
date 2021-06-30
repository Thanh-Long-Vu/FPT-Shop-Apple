@extends('userPage.index')
@section('title')
    My Account
@endsection
@section('script_header')
    <link rel="stylesheet" href="assets/vendor/ion-rangeslider/css/ion.rangeSlider.css">
    <link rel="stylesheet" href="assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="assets/vendor/fancybox/jquery.fancybox.css">
    <link rel="stylesheet" href="assets/vendor/slick-carousel/slick/slick.css">
    <link rel="stylesheet" href="assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css">
@endsection
@section('content')
    <main id="content" role="main" class="checkout-page">
        <!-- breadcrumb -->
        <div class="bg-gray-13 bg-md-transparent">
            <div class="container">
                <!-- breadcrumb -->
                <div class="my-md-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="../home/index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">My
                                Account</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->
        <div class="container-fluid mb-10">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-8">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                            @php
                                Session::forget('success');
                            @endphp
                        </div>
                    @endif
                    <h2 class="h3 mb-4 page-title text-center">Order detail</h2>
                </div> <!-- /.col-12 -->
            </div> <!-- .row -->
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-8">
                    <div class="row align-items-center mb-4">
                        <div class="col">
                            <h2 class="h5 page-title"><small class="text-uppercase">ID Transaction</small><br />#{{$transaction->id_transaction}}
                            </h2>
                        </div>
                        {{-- <div class="col-auto">
                            <button type="button" class="btn btn-primary">Processed</button>
                        </div> --}}
                    </div>
                    <div class="card shadow">
                        <div class="card-body p-5">
                            <div class="row mb-5">
                                <div class="col-12 text-center mb-4">
                                    <h2 class="mb-0 text-uppercase">Invoice</h2>
                                </div>
                                <div class="col-md-7">
                                    <p class="small text-uppercase mb-2">Invoice from</p>
                                    <p class="mb-4">
                                        <strong>Name Sell</strong><br />  FPT Shop<br />
                                    </p>
                                    <p>
                                        <span class="small text-uppercase">Invoice #</span><br />
                                        <strong>{{$transaction->id_transaction}}</strong>
                                    </p>
                                </div>
                                <div class="col-md-5">
                                    <p class="small text-uppercase mb-2">Invoice to</p>
                                    <p class="mb-4">
                                        <strong>Name Receive</strong><br />{{$transaction->user->name}} <br /> <strong>Phone</strong>  {{$transaction->user->phone}}<br /> <strong>Address</strong> {{$transaction->user->address}} <br />
                                    </p>
                                    <p>
                                        <small class="small text-uppercase">Due date</small><br />
                                        <strong>{{$transaction->created_at}}</strong>
                                    </p>
                                </div>
                            </div> <!-- /.row -->
                            <table class="table table-borderless table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col" class="text-center">Order ID</th>
                                        <th scope="col" class="text-center">Image</th>
                                        <th scope="col" class="text-center">Color / Memory</th>
                                        <th scope="col" class="text-center">Product</th>
                                        <th scope="col" class="text-center">Price</th>
                                        <th scope="col" class="text-center">Quantity</th>
                                        <th scope="col" class="text-center">Discount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order as $item)
                                        <tr>
                                            <td class="text-center">{{$item->transaction_id}}</td>
                                            <td class="text-center w-40"><img class="w-25" src="../{{$item->first()->product->thumbnail}}" alt=""></td>
                                            <td class="text-right"> <b>
                                                @if ($order->first()->product->warehouse->color == 0)
                                                <span class="dot dot-lg dot-red mr-2"></span>Red 
                                                @elseif($order->first()->product->warehouse->color == 1)
                                                <span class="dot dot-lg dot-yellow mr-2"></span>Yellow
                                                @elseif($order->first()->product->warehouse->color == 2)
                                                <span class="dot dot-lg dot-violet mr-2"></span>Violet
                                                @elseif($order->first()->product->warehouse->color == 3)
                                                <span class="dot dot-lg dot-green mr-2"></span>Green
                                                @elseif($order->first()->product->warehouse->color == 4)
                                                <span class="dot dot-lg dot-black mr-2"></span>Black    
                                                @elseif($order->first()->product->warehouse->color == 5)
                                                <span class="dot dot-lg dot-white mr-2"></span>White    
                                                @elseif($order->first()->product->warehouse->color == 6)
                                                <span class="dot dot-lg dot-other mr-2"></span>Other    
                                                @elseif($order->first()->product->warehouse->color == 7)
                                                <span class="dot dot-lg dot-patific mr-2"></span>Patific    
                                                @endif</b> - <b>
                                                @if ($order->first()->product->warehouse->memory == 0)
                                                16GB  
                                                @elseif($order->first()->product->warehouse->memory == 1)
                                                32GB   
                                                @elseif($order->first()->product->warehouse->memory == 2)
                                                64GB 
                                                @elseif($order->first()->product->warehouse->memory == 3)
                                                128GB   
                                                @elseif($order->first()->product->warehouse->memory == 4)
                                                256GB   
                                                @elseif($order->first()->product->warehouse->memory == 5)
                                                512Gb  
                                                @endif</b>
                                            </td>
                                            <td class="text-center">{{$item->product->productType->name}}</td>
                                            <td class="text-right">{{number_format($item->price)}}.VND</td>
                                            <td class="text-right">{{$item->quantity}}</td>
                                            <td class="text-right">{{$item->sale}} %</td>
                                        <tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="row mt-5">
                                <div class="col-md-6">
                                    <p class="small">
                                        <strong>Note :</strong>{{$transaction->note}}
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-right mr-2">
                                        <p class="mb-2 h6">
                                            <span class="text-muted">Subtotal : </span>
                                            <strong>{{number_format($totalprice)}}.VNĐ</strong>
                                        </p>
                                        <p class="mb-2 h6">
                                            <span class="text-muted">Total Sale :</span>
                                            <strong>{{$sale}}%</strong>
                                        </p>
                                        <p class="mb-2 h6">
                                            <span class="text-muted">Total : </span>
                                            <span>{{number_format($transaction->total_price)}}.VNĐ</span>
                                        </p>
                                    </div>
                                </div>
                            </div> <!-- /.row -->
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div> <!-- /.col-12 -->
            </div>
        </div> <!-- .container-fluid -->
    </main>
@endsection
@section('script_footer')
    <!-- JS Global Compulsory -->
    <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
    <script src="assets/vendor/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/vendor/bootstrap/bootstrap.min.js"></script>

    <!-- JS Implementing Plugins -->
    <script src="assets/vendor/appear.js"></script>
    <script src="assets/vendor/jquery.countdown.min.js"></script>
    <script src="assets/vendor/hs-megamenu/src/hs.megamenu.js"></script>
    <script src="assets/vendor/svg-injector/dist/svg-injector.min.js"></script>
    <script src="assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="assets/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="assets/vendor/fancybox/jquery.fancybox.min.js"></script>
    <script src="assets/vendor/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
    <script src="assets/vendor/typed.js/lib/typed.min.js"></script>
    <script src="assets/vendor/slick-carousel/slick/slick.js"></script>
    <script src="assets/vendor/appear.js"></script>
    <script src="assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

    <!-- JS Electro -->
    <script src="assets/js/hs.core.js"></script>
    <script src="assets/js/components/hs.countdown.js"></script>
    <script src="assets/js/components/hs.header.js"></script>
    <script src="assets/js/components/hs.hamburgers.js"></script>
    <script src="assets/js/components/hs.unfold.js"></script>
    <script src="assets/js/components/hs.focus-state.js"></script>
    <script src="assets/js/components/hs.malihu-scrollbar.js"></script>
    <script src="assets/js/components/hs.validation.js"></script>
    <script src="assets/js/components/hs.fancybox.js"></script>
    <script src="assets/js/components/hs.onscroll-animation.js"></script>
    <script src="assets/js/components/hs.slick-carousel.js"></script>
    <script src="assets/js/components/hs.quantity-counter.js"></script>
    <script src="assets/js/components/hs.range-slider.js"></script>
    <script src="assets/js/components/hs.show-animation.js"></script>
    <script src="assets/js/components/hs.svg-injector.js"></script>
    <script src="assets/js/components/hs.scroll-nav.js"></script>
    <script src="assets/js/components/hs.go-to.js"></script>
    <script src="assets/js/components/hs.selectpicker.js"></script>

    <!-- JS Plugins Init. -->
    <script>
        $(window).on('load', function() {
            // initialization of HSMegaMenu component
            $('.js-mega-menu').HSMegaMenu({
                event: 'hover',
                direction: 'horizontal',
                pageContainer: $('.container'),
                breakpoint: 767.98,
                hideTimeOut: 0
            });
        });
        $(document).on('ready', function() {
            // initialization of header
            $.HSCore.components.HSHeader.init($('#header'));
            // initialization of animation
            $.HSCore.components.HSOnScrollAnimation.init('[data-animation]');
            // initialization of unfold component
            $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
                afterOpen: function() {
                    $(this).find('input[type="search"]').focus();
                }
            });
            // initialization of HSScrollNav component
            $.HSCore.components.HSScrollNav.init($('.js-scroll-nav'), {
                duration: 700
            });
            // initialization of quantity counter
            $.HSCore.components.HSQantityCounter.init('.js-quantity');
            // initialization of popups
            $.HSCore.components.HSFancyBox.init('.js-fancybox');
            // initialization of countdowns
            var countdowns = $.HSCore.components.HSCountdown.init('.js-countdown', {
                yearsElSelector: '.js-cd-years',
                monthsElSelector: '.js-cd-months',
                daysElSelector: '.js-cd-days',
                hoursElSelector: '.js-cd-hours',
                minutesElSelector: '.js-cd-minutes',
                secondsElSelector: '.js-cd-seconds'
            });
            // initialization of malihu scrollbar
            $.HSCore.components.HSMalihuScrollBar.init($('.js-scrollbar'));
            // initialization of forms
            $.HSCore.components.HSFocusState.init();
            // initialization of form validation
            $.HSCore.components.HSValidation.init('.js-validate', {
                rules: {
                    confirmPassword: {
                        equalTo: '#signupPassword'
                    }
                }
            });
            // initialization of forms
            $.HSCore.components.HSRangeSlider.init('.js-range-slider');
            // initialization of show animations
            $.HSCore.components.HSShowAnimation.init('.js-animation-link');
            // initialization of fancybox
            $.HSCore.components.HSFancyBox.init('.js-fancybox');
            // initialization of slick carousel
            $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');
            // initialization of go to
            $.HSCore.components.HSGoTo.init('.js-go-to');
            // initialization of hamburgers
            $.HSCore.components.HSHamburgers.init('#hamburgerTrigger');
            // initialization of unfold component
            $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
                beforeClose: function() {
                    $('#hamburgerTrigger').removeClass('is-active');
                },
                afterClose: function() {
                    $('#headerSidebarList .collapse.show').collapse('hide');
                }
            });
            $('#headerSidebarList [data-toggle="collapse"]').on('click', function(e) {
                e.preventDefault();
                var target = $(this).data('target');
                if ($(this).attr('aria-expanded') === "true") {
                    $(target).collapse('hide');
                } else {
                    $(target).collapse('show');
                }
            });
            // initialization of unfold component
            $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));
            // initialization of select picker
            $.HSCore.components.HSSelectPicker.init('.js-select');
        });
    </script>
@endsection
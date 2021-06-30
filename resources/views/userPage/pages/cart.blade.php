@extends('userPage.index')
@section('title')
    Cart
@endsection
@section('script_header')
    <link rel="stylesheet" href="assets/vendor/ion-rangeslider/css/ion.rangeSlider.css">
    <link rel="stylesheet" href="assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="assets/vendor/fancybox/jquery.fancybox.css">
    <link rel="stylesheet" href="assets/vendor/slick-carousel/slick/slick.css">
    <link rel="stylesheet" href="assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css">
@endsection
@section('content')
    <main id="content" role="main" class="cart-page">
        <!-- breadcrumb -->
        <div class="bg-gray-13 bg-md-transparent">
            <div class="container">
                <!-- breadcrumb -->
                <div class="my-md-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="../home/index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <div class="mb-4">
            @if(session('message'))
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{session('message')}}
                    </strong>
                  </div>
            @endif
            </div>
            <div class="mb-4">
                <h1 class="text-center">Cart</h1>
            </div>
            @if (Session::get('cart'))
            <div class="mb-10 cart-table">
                <form class="mb-4" action="#" method="post">
                    <table class="table" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="product-remove">&nbsp; <a href="javascript:void(0)" id="remove-all" class="text-gray-32 font-size-15">Remove All</a></th>
                                <th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-color">Color</th>
                                <th class="product-quantity w-lg-15">Quantity</th>
                                <th class="product-subtotal">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0; ?>
                                @foreach (Session::get('cart') as $cart)
                                    <?php $total +=  $cart['item']['product_price'] * $cart['item']['quantity'];?>
                                    <tr class="cart-item" id="item-{{ $cart['item']['product']->id_product }}">
                                        <td class="text-center">
                                            <a href="javascript:void(0)" id="delete_cart" data-id="{{ $cart['item']['product']->id_product }}" data-key="{{ $cart['key'] }}"
                                                class="text-gray-32 font-size-26 delete_cart">×</a>
                                        </td>
                                        <td class="d-none d-md-table-cell">
                                            <a href="#"><img class="img-fluid max-width-100 p-1 border border-color-1"
                                                    src="../{{ $cart['item']['product']->thumbnail }}" alt="Image Description"></a>
                                        </td>

                                        <td data-title="Product">
                                            <a href="#" class="text-gray-90">{{ $cart['item']['product_type'] }}</a>
                                        </td>

                                        <td data-title="Price">
                                            <span
                                                class="">$ {{ number_format($cart['item']['product_price'], 2) }}</span>
                                        </td>

                                        
                                        <td data-title="color">
                                            <span
                                                class="">{{ $cart['item']['color'] }}</span>
                                        </td>
                                        

                                        <td data-title="Quantity">
                                            <span class="sr-only">Quantity</span>
                                            <!-- Quantity -->
                                            <div class="border rounded-pill py-1 width-122 w-xl-80 px-3 border-color-1">
                                                <div class="js-quantity row align-items-center">
                                                    <div class="col">
                                                        <input data-id="{{ $cart['key'] }}"
                                                            class="js-result form-control h-auto border-0 rounded p-0 shadow-non"
                                                            min="1" max="99" type="text"
                                                            value="{{ $cart['item']['quantity'] }}">
                                                    </div>
                                                    <div class="col-auto pr-1">
                                                        <a  data-id="{{ $cart['item']['product']->id_product }}" data-key="{{ $cart['key'] }}" class="btn-update-cart-down js-minus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0"
                                                            href="javascript:;">
                                                            <small class="fas fa-minus btn-icon__inner"></small>
                                                        </a>
                                                        <a  data-id="{{ $cart['item']['product']->id_product }}" data-key="{{ $cart['key'] }}" class="btn-update-cart js-plus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0"
                                                            href="javascript:void(0)">
                                                            <small class="fas fa-plus btn-icon__inner"></small>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Quantity -->
                                        </td>

                                        <td data-title="Total">
                                            <span id="price-{{ $cart['item']['product']->id_product }}">${{ number_format($cart['item']['product_price'] * $cart['item']['quantity'], 2) }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="mb-8 cart-total">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 offset-lg-6 offset-xl-7 col-md-8 offset-md-4">
                        <div class="border-bottom border-color-1 mb-3">
                            <h3 class="d-inline-block section-title mb-0 pb-2 font-size-26">Cart totals</h3>
                        </div>
                        <table class="table mb-3 mb-md-0">
                            <tbody>
                                <tr class="cart-subtotal">
                                    <th>Subtotal</th>
                                    <td data-title="Subtotal" class="total_money"><span class="amount">$ {{ number_format($total, 2) }}</span></td>
                                </tr>
                                <tr class="order-total">
                                    <th>Total</th>
                                    <td data-title="Total" class="total_money"><strong><span class="amount">$ {{ number_format($total, 2) }}</span></strong></td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="{{ route('checkout') }}" style="margin-left: 55% ​!important" type="button"
                            class="btn btn-primary-dark-w ml-md-2 px-5 px-md-4 px-lg-5 w-100 w-md-auto">Proceed to
                            checkout</a>
                    </div>
                </div>
            </div>
            @else
            <div class="mb-12 cart-table">
                <div class="alert alert-primary" role="alert">
                    <p style="margin: 0; color:#333e48; font-weight: bold">Cart is empty !!!</p>
                  </div>
            </div>
            @endif
        </div>
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
            $(".delete_cart").click(function() {
                var key = $(this).attr('data-key');
                var id = $(this).attr('data-id');
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: '{{ route('cart.delete') }}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'key': key,
                    },
                    success: function(data) {
                        toastr.options.closeButton = 1;
                        toastr.options.closeMethod = 'fadeOut';
                        toastr.options.closeDuration = 100;
                        $("#item-"+ id).fadeOut();
                        // toastr.success(data.message);
                        $(".label_item_cart").text(data.count_cart);
                        $('.total_money').text('$' + data.total_cart);
                        toastr.success(data.message);
                        if(data.loadpage == 0 ){
                            setTimeout(function(){
                            location.reload();
                        }, 100);
                        }
                    }
                });
            });

            $("#remove-all").click(function() {
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: '{{ route('cart.remove.all') }}',
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        toastr.options.closeButton = 1;
                        toastr.options.closeMethod = 'fadeOut';
                        toastr.options.closeDuration = 100;
                        toastr.success(data.message);
                        setTimeout(function(){// wait for 5 secs(2)
                            location.reload(); // then reload the page.(3)
                        }, 2000);
                    }
                });
            });

            $(".btn-update-cart").click(function(e) {
                var quantity = parseInt($(e.target).closest(".js-quantity").find(".shadow-non").val()) + 1;
                var key = $(this).attr('data-key');
                var id = $(this).attr('data-id');
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: '{{ route('cart.update') }}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'key': key,
                        'quantity': quantity,
                    },
                    success: function(data) {
                        $('.total_money').text('$' + data.data.total_cart);
                        $('#price-' + id).text('$' + data.data.cart_item);
                        toastr.options.closeButton = 1;
                        toastr.options.closeMethod = 'fadeOut';
                        toastr.options.closeDuration = 100;
                        toastr.success(data.message);
                    }
                });
            });


            $(".btn-update-cart-down").click(function(e) {
                var quantity = parseInt($(e.target).closest(".js-quantity").find(".shadow-non").val()) - 1;
                var key = $(this).attr('data-key');
                var id = $(this).attr('data-id');
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: '{{ route('cart.update') }}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'key': key,
                        'quantity': quantity,
                    },
                    success: function(data) {
                        $('.total_money').text('$' + data.data.total_cart);
                        $('#price-' + id).text('$' + data.data.cart_item);
                        toastr.options.closeButton = 1;
                        toastr.options.closeMethod = 'fadeOut';
                        toastr.options.closeDuration = 100;
                        toastr.success(data.message);
                    }
                });
            });

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

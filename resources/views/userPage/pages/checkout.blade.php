@extends('userPage.index')
@section('title')
    Checkout
@endsection
@section('script_header')
    <link rel="stylesheet" href="assets/vendor/ion-rangeslider/css/ion.rangeSlider.css">
    <link rel="stylesheet" href="assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="assets/vendor/fancybox/jquery.fancybox.css">
    <link rel="stylesheet" href="assets/vendor/slick-carousel/slick/slick.css">
    <script src="../admin/js/jquery-ajax.min.js"></script>
    <link rel="stylesheet" href="../admin/css/toastr.min.css">
    <script src="../admin/js/toastr.min.js"></script>
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
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Checkout
                            </li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <div class="mb-5">
                <h1 class="text-center">Checkout</h1>
            </div>
            <!-- Accordion -->
            <!-- End Accordion -->

            <!-- Accordion -->
            <div id="shopCartAccordion1" class="accordion rounded mb-6">
                <!-- Card -->
                <div class="card border-0">
                    <div id="shopCartTwo" class="collapse border border-top-0" aria-labelledby="shopCartHeadingTwo"
                        data-parent="#shopCartAccordion1" style="">
                        <form class="js-validate p-5" novalidate="novalidate">
                            <p class="w-100 text-gray-90">If you have a coupon code, please apply it below.</p>
                            <div class="input-group input-group-pill max-width-660-xl">
                                <input type="text" class="form-control" name="name" placeholder="Coupon code"
                                    aria-label="Promo code">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-block btn-dark font-weight-normal btn-pill px-4">
                                        <i class="fas fa-tags d-md-none"></i>
                                        <span class="d-none d-md-inline">Apply coupon</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End Card -->
            </div>
            <!-- End Accordion -->
            <form class="js-validate" novalidate="novalidate">
                <div class="row">
                    <div class="col-lg-5 order-lg-2 mb-7 mb-lg-0">
                        <div class="pl-lg-3 ">
                            <div class="bg-gray-1 rounded-lg">
                                <!-- Order Summary -->
                                <div class="p-4 mb-4 checkout-table">
                                    <!-- Title -->
                                    <div class="border-bottom border-color-1 mb-5">
                                        <h3 class="section-title mb-0 pb-2 font-size-25">Your order</h3>
                                    </div>
                                    <!-- End Title -->

                                    <!-- Product Content -->
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="product-name">Product</th>
                                                <th class="product-total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php $total = 0; ?>
                                            @foreach (Session::get('cart') as $cart)
                                                <?php $total += $cart['item']['product_price'] *
                                                $cart['item']['quantity']; ?>
                                                <tr class="cart_item">
                                                    <td>{{ $cart['item']['product_type'] }}&nbsp;<strong
                                                            class="product-quantity">×
                                                            {{ $cart['item']['quantity'] }}</strong></td>
                                                    <td>{{ number_format($cart['item']['product_price'], 2) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Subtotal</th>
                                                <td>${{ number_format($total, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Shipping</th>
                                                <td style="color: crimson">Free shipping nationally</td>
                                            </tr>
                                            <tr>
                                                <th>Total</th>
                                                <td><strong>${{ number_format($total, 2) }}</strong></td>
                                            </tr>
                                            {{-- {{dd($cart)}} --}}
                                            <input type="hidden" name="total_price" id="total_price" value="{{ $cart['item']['total_price'] = $total ?? 0 }}">
                                        </tfoot>
                                    </table>
                                    <div class="border-top border-width-3 border-color-1 pt-3 mb-3">
                                        <!-- Basics Accordion -->
                                        <div id="basicsAccordion1">
                                            <!-- Card -->
                                            <div class="border-bottom border-color-1 border-dotted-bottom">
                                                <div class="p-3" id="basicsHeadingOne">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" id="stylishRadio1"
                                                            name="payment_method_id" value="4">
                                                        <label class="custom-control-label form-label" for="stylishRadio1"
                                                            data-toggle="collapse" data-target="#basicsCollapseOnee"
                                                            aria-expanded="true" aria-controls="basicsCollapseOnee">
                                                            Direct bank transfer
                                                        </label>
                                                    </div>
                                                </div>
                                                <div id="basicsCollapseOnee"
                                                    class="collapse border-top border-color-1 border-dotted-top bg-dark-lighter"
                                                    aria-labelledby="basicsHeadingOne" data-parent="#basicsAccordion1">
                                                    <div class="p-4">
                                                        Make your payment directly into our bank account. Please use your
                                                        Order ID as the payment reference. Your order will not be shipped
                                                        until the funds have cleared in our account.
                                                    </div>
                                                    <div class="col-12 text-center d-none d-sm-block pb-2">
                                                        <div class="rounded p-2 mt-3 bg-100">
                                                            <div class="text-uppercase fs--2 font-weight-bold">Current
                                                                account : 3506205083001 <br> VU THANH LONG</div><img
                                                                src="assets/img/QR-payment.jpg" alt="" width="120">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Card -->

                                            <!-- Card -->
                                            <div class="border-bottom border-color-1 border-dotted-bottom">
                                                <div class="p-3" id="basicsHeadingTwo">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                            id="secondStylishRadio1" name="payment_method_id" value="2">
                                                        <label class="custom-control-label form-label"
                                                            for="secondStylishRadio1" data-toggle="collapse"
                                                            data-target="#basicsCollapseTwo" aria-expanded="false"
                                                            aria-controls="basicsCollapseTwo">
                                                            Check payments
                                                        </label>
                                                    </div>
                                                </div>
                                                <div id="basicsCollapseTwo"
                                                    class="collapse border-top border-color-1 border-dotted-top "
                                                    aria-labelledby="basicsHeadingTwo" data-parent="#basicsAccordion1">
                                                    <div class="text-md-center">
                                                        <span class="d-inline-block bg-white border rounded p-1">
                                                            <img class="max-width-5" src="assets/img/logo-payment/img1.jpg"
                                                                alt="Image Description">
                                                        </span>
                                                        <span class="d-inline-block bg-white border rounded p-1">
                                                            <img class="max-width-5" src="assets/img/logo-payment/img2.jpg"
                                                                alt="Image Description">
                                                        </span>
                                                        <span class="d-inline-block bg-white border rounded p-1">
                                                            <img class="max-width-5" src="assets/img/logo-payment/img3.jpg"
                                                                alt="Image Description">
                                                        </span>
                                                        <span class="d-inline-block bg-white border rounded p-1">
                                                            <img class="max-width-5" src="assets/img/logo-payment/img4.jpg"
                                                                alt="Image Description">
                                                        </span>
                                                        <span class="d-inline-block bg-white border rounded p-1">
                                                            <img class="max-width-5" src="assets/img/logo-payment/img5.jpg"
                                                                alt="Image Description">
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Card -->

                                            <!-- Card -->
                                            <div class="border-bottom border-color-1 border-dotted-bottom">
                                                <div class="p-3" id="basicsHeadingThree">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                            id="thirdstylishRadio1" name="payment_method_id" value="1" checked>
                                                        <label class="custom-control-label form-label"
                                                            for="thirdstylishRadio1" data-toggle="collapse"
                                                            data-target="#basicsCollapseThree" aria-expanded="false"
                                                            aria-controls="basicsCollapseThree">
                                                            Cash on delivery
                                                        </label>
                                                    </div>
                                                </div>
                                                <div id="basicsCollapseThree"
                                                    class="collapse show border-top border-color-1 border-dotted-top bg-dark-lighter"
                                                    aria-labelledby="basicsHeadingThree" data-parent="#basicsAccordion1">
                                                    <div class="p-4">
                                                        Pay with cash upon delivery.
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Card -->

                                            <!-- Card -->
                                            <div class="border-bottom border-color-1 border-dotted-bottom">
                                                <div class="p-3" id="basicsHeadingFour">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                            id="FourstylishRadio1" name="payment_method_id" value="3">
                                                        <label class="custom-control-label form-label"
                                                            for="FourstylishRadio1" data-toggle="collapse"
                                                            data-target="#basicsCollapseFour" aria-expanded="false"
                                                            aria-controls="basicsCollapseFour">
                                                            Installment payment
                                                        </label>
                                                    </div>
                                                </div>
                                                <div id="basicsCollapseFour"
                                                    class="collapse border-top border-color-1 border-dotted-top bg-dark-lighter"
                                                    aria-labelledby="basicsHeadingFour" data-parent="#basicsAccordion1">
                                                    <div class="p-4">
                                                        Use the installment attribute to submit a series of payments over time to pay back the cost of the product.
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Card -->
                                        </div>
                                        <!-- End Basics Accordion -->
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between px-3 mb-5">
                                        <div class="form-check" onclick="checked()">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck10"
                                                required data-msg="Please agree terms and conditions."
                                                data-error-class="u-has-error" data-success-class="u-has-success">
                                                <label class="form-check-label form-label" for="defaultCheck10">
                                                I have read and agree to the website <a href="#" class="text-blue">terms and
                                                    conditions </a>
                                                <span class="text-danger">*</span>
                                            </label>
                                        </div>
                                    </div>
                                    <!-- End Product Content -->
                                    <button type="button" class="btn btn-primary-dark-w btn-block btn-pill font-size-20 mb-3 py-3" disabled id="place-order">Place order</button>
                                </div>
                                <!-- End Order Summary -->
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7 order-lg-1">
                        <div class="pb-7 mb-7">
                            <!-- Title -->
                            <div class="border-bottom border-color-1 mb-5">
                                <h3 class="section-title mb-0 pb-2 font-size-25">Billing details</h3>
                            </div>
                            <!-- End Title -->

                            <!-- Billing Form -->
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Input -->
                                    <div class="js-form-message mb-6">
                                        <label class="form-label">
                                            Name User
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="addtional_data[first_name]" class="form-control"
                                            name="firstName" value="{{ auth()->user()->name ?? null }}" placeholder="Jack"
                                            aria-label="Jack" required="" data-msg="Please enter your frist name."
                                            data-error-class="u-has-error" data-success-class="u-has-success"
                                            autocomplete="off">
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <div class="col-md-6">
                                    <!-- Input -->
                                    <div class="js-form-message mb-6">
                                        <label class="form-label">
                                            Email address
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="email" value="{{ auth()->user()->email ?? null }}"
                                            class="form-control" name="addtional_data[email]"
                                            placeholder="jackwayley@gmail.com" aria-label="jackwayley@gmail.com" required=""
                                            data-msg="Please enter a valid email address." data-error-class="u-has-error"
                                            data-success-class="u-has-success">
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <div class="col-md-6">
                                    <!-- Input -->
                                    <div class="js-form-message mb-6">
                                        <label class="form-label">
                                            Phone
                                        </label>
                                        <input type="text" value="{{ auth()->user()->phone ?? null }}" class="form-control"
                                            name="addtional_data[phone]" placeholder="+84 ( 888 519 575)"
                                            aria-label="+84 ( 888 519 575)" data-msg="Please enter your last name."
                                            data-error-class="u-has-error" data-success-class="u-has-success">
                                    </div>
                                    <!-- End Input -->
                                </div>
                                <div class="col-md-6">
                                    <div class="js-form-message mb-6">
                                        <h6 class="font-size-14">Delivery method</h6>
                                        <!-- Select -->
                                        <select id="method_receive"
                                            class="js-select selectpicker dropdown-select btn-block col-12 px-0"
                                            data-style="btn-sm bg-white font-weight-normal py-2 border">
                                            <option value="0" selected>Home delivery</option>
                                            <option value="1">In-store delivery</option>
                                        </select>
                                    </div>
                                    <!-- End Select -->
                                </div>
                                <div class="col-md-6">
                                    <!-- Input -->
                                    <div class="js-form-message mb-6">
                                        <label class="form-label">
                                            Address
                                        </label>
                                        <input type="text" value="{{ auth()->user()->address ?? null }}" class="form-control"
                                               name="addtional_data[address]" placeholder="Ha Noi"
                                               aria-label="Ha Noi" data-msg="Please enter your address name."
                                               data-error-class="u-has-error" data-success-class="u-has-success">
                                    </div>
                                    <!-- End Input -->
                                </div>
                                <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id_user ?? 0 }}">

                                <div class="w-100"></div>
                            </div>
                            <!-- End Billing Form -->

                            <!-- Accordion -->
                            <!-- End Accordion -->
                            <!-- Title --
                            <!-- End Title -->
                            <!-- Accordion -->
                            <!-- End Accordion -->
                            <!-- Input -->
                            <div class="js-form-message mb-6">
                                <label class="form-label">
                                    Order notes (optional)
                                </label>

                                <div class="input-group">
                                    <textarea class="form-control p-5" rows="4" id="noteTextarea"
                                        placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>
                            </div>
                            <!-- End Input -->
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
@section('script_footer')
    <!-- JS Global Compulsory -->
    <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
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
            // $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');

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
    <script>
        function checked(){
			if($('#defaultCheck10').prop('checked')){
				$('#place-order').prop('disabled', false);
			}else{
				$('#place-order').prop('disabled', true);
			}
		}
        $(document).on('ready', function() {
            $("#place-order").click(function() {
                var total_price = $('#total_price').val();
                var user_id = $('#user_id').val();
                var note = $("#noteTextarea").val();
                var payment_method_id = $("input[name='payment_method_id']:checked").val();
                var method_receive = $('#method_receive').val();
                var addtional_data = $("input[name^='addtional_data']").serializeArray();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    }
                });
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{ route('order.store') }}",
                    data: {
                        'addtional_data': addtional_data,
                        'total_price': total_price,
                        'method_receive': method_receive,
                        'payment_method_id' :payment_method_id,
                        'user_id':user_id,
                        'note' : note
                    },
                    success: function(data) {
                        toastr.options.closeButton = 1;
                        toastr.options.closeMethod = 'fadeOut';
                        toastr.options.closeDuration = 100;
                        window.location.href = "{{ route('home') }}";
                        toastr.success(data.message);
                    }
                });
            });
        });
    </script>
@endsection

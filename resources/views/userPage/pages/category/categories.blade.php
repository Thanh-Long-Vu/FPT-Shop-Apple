@extends('userPage.index')
@section('title')
    Product
@endsection
@section('script_header')
<link rel="stylesheet" href="assets/vendor/animate.css/animate.min.css">
<link rel="stylesheet" href="assets/vendor/hs-megamenu/src/hs.megamenu.css">
<link rel="stylesheet" href="assets/vendor/ion-rangeslider/css/ion.rangeSlider.css">
<link rel="stylesheet" href="assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
<link rel="stylesheet" href="assets/vendor/fancybox/jquery.fancybox.css">
<link rel="stylesheet" href="assets/vendor/slick-carousel/slick/slick.css">
<link rel="stylesheet" href="assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css">

@endsection
@section('content')
    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main">
        <div class="bg-gray-13 bg-md-transparent">
            <div class="container">
                <!-- breadcrumb -->
                <div class="my-md-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{route('home')}}">Home</a></li>
                            @if(isset($categoryName) && !empty($categoryName))
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">{{$categoryName ?? ""}}</li>
                            @else
                                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">
                                    <a href="{{route('categories.show',[$idCategory ?? 0])}}">
                                        {{$nameCategory ?? ""}}
                                    </a></li>
                                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">{{$nameProductType ?? ""}}</li>
                            @endif
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>

        <div class="container">
            <!-- Categories Carousel -->
            <div class="mb-5">
                <div class="position-relative">
                    <div class="js-slick-carousel u-slick u-slick--gutters-0 position-static overflow-hidden u-slick-overflow-visble pb-5 pt-2 px-1"
                        data-arrows-classes="d-none d-xl-block u-slick__arrow-normal u-slick__arrow-centered--y rounded-circle text-black font-size-30 z-index-2"
                        data-arrow-left-classes="fa fa-angle-left u-slick__arrow-inner--left left-n16"
                        data-arrow-right-classes="fa fa-angle-right u-slick__arrow-inner--right right-n20"
                        data-pagi-classes="d-xl-none text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-3 pt-1"
                        data-slides-show="10" data-slides-scroll="1" data-responsive='[{
                              "breakpoint": 1400,
                              "settings": {
                                "slidesToShow": 8
                              }
                            }, {
                                "breakpoint": 1200,
                                "settings": {
                                  "slidesToShow": 6
                                }
                            }, {
                              "breakpoint": 992,
                              "settings": {
                                "slidesToShow": 5
                              }
                            }, {
                              "breakpoint": 768,
                              "settings": {
                                "slidesToShow": 3
                              }
                            }, {
                              "breakpoint": 554,
                              "settings": {
                                "slidesToShow": 2
                              }
                            }]'>
                        @if(!$productTypes->isEmpty())
                            @foreach ($productTypes as $productType)
                                <div class="js-slide">
                                    <a href="{{ route('productype.show', ['productType' => $productType->id_product_type ?? 0])}}"
                                        class="d-block text-center bg-on-hover width-122 mx-auto">
                                        @if($productType->category->id_category <= 2)
                                        <div class="bg pt-4 rounded-circle-top width-122 height-75">
                                            <img class="img-fluid mx-auto" src="../{{$productType->thumbnail ?? ""}}" alt="Image Product Type">
                                        </div>
                                        @else
                                        <div class="bg pt-4 rounded-circle-top width-122 height-75" style="background-color: #fed700 !important">
                                            <img class="img-fluid mx-auto" src="../{{$productType->thumbnail ?? ""}}" alt="Image Product Type">
                                        </div>
                                        @endif
                                        <div class="bg-white px-2 pt-2 width-122">
                                            <h6 class="font-weight-semi-bold font-size-14 text-gray-90 mb-0 text-lh-1dot2">
                                                {{ $productType->name ?? "" }}
                                            </h6>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <!-- End Categories Carousel -->
            <div class="row mb-8">
                <div class="d-none d-xl-block col-xl-3 col-wd-2gdot5">
                    <div class="mb-6">
                        <form action="{{route('filterProduct')}}" >
                            <div class="border-bottom border-color-1 mb-5">
                                <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Filters</h3>
                            </div>
                            <div class="border-bottom pb-4 mb-4">
                                <h4 class="font-size-14 mb-3 font-weight-bold">Price</h4>

                                <!-- Checkboxes -->
                                <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name = "price[]" id="1milli" value = "0">
                                        <label class="custom-control-label" for="1milli">
                                            Under 1 million VND
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name = "price[]" id="110milli" value = "1">
                                        <label class="custom-control-label" for="110milli">1 million - 10 million VND</label>
                                    </div>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name = "price[]" id="1020milli" value = "2">
                                        <label class="custom-control-label" for="1020milli">10 million - 20 million VND
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name = "price[]" id="2030milli" value = "3">
                                        <label class="custom-control-label" for="2030milli">20 million - 30 million VND
                                        </label>
                                    </div>
                                </div>
                                <!-- End Checkboxes -->
                                <!-- View More - Collapse -->
                                <div class="collapse" id="collapsePrice">
                                    <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name = "price[]" id="over30milli" value = "4">
                                        <label class="custom-control-label" for="over30milli">Over 30 million VND
                                        </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- End View More - Collapse -->

                                <!-- Link -->
                                <a class="link link-collapse small font-size-13 text-gray-27 d-inline-flex mt-2" data-toggle="collapse" href="#collapsePrice" role="button" aria-expanded="false" aria-controls="collapsePrice">
                                    <span class="link__icon text-gray-27 bg-white">
                                        <span class="link__icon-inner">+</span>
                                    </span>
                                    <span class="link-collapse__default">Show more</span>
                                    <span class="link-collapse__active">Show less</span>
                                </a>
                                <!-- End Link -->
                            </div>
                            <div class="border-bottom pb-4 mb-4">
                                <h4 class="font-size-14 mb-3 font-weight-bold">Color</h4>

                                <!-- Checkboxes -->
                                <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="red" name="color[]" value = "0" >
                                        <label class="custom-control-label" for="red">Red
                                        <span class="dot dot-lg dot-red"></span></label>
                                    </div>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="yellow" name="color[]" value = "1" >
                                        <label class="custom-control-label" for="yellow"> Yellow
                                        <span class="dot dot-lg dot-yellow"></span></label>
                                    </div>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="violet" name="color[]" value = "2" >
                                        <label class="custom-control-label" for="violet"> Violet
                                        <span class="dot dot-lg dot-violet"></span></label>
                                    </div>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="green" name="color[]" value = "3" >
                                        <label class="custom-control-label" for="green"> Green
                                        <span class="dot dot-lg dot-green"></span></label>
                                    </div>
                                </div>
                                <!-- End Checkboxes -->

                                <!-- View More - Collapse -->
                                <div class="collapse" id="collapseColor">
                                    <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="black" name="color[]" value = "4" >
                                            <label class="custom-control-label" for="black"> Black
                                            <span class="dot dot-lg dot-black"></span></label>
                                        </div>
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="white" name="color[]" value = "5" >
                                            <label class="custom-control-label" for="white"> White
                                            <span class="dot dot-lg dot-white"></span></label>
                                        </div>
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="other" name="color[]" value = "6" >
                                            <label class="custom-control-label" for="other"> Other
                                            <span class="dot dot-lg dot-other"></span></label>
                                        </div>
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="patific" name="color[]" value = "7" >
                                            <label class="custom-control-label" for="patific"> Patific
                                            <span class="dot dot-lg dot-patific"></span></label>
                                        </div>
                                    </div>
                                </div>
                                <!-- End View More - Collapse -->

                                <!-- Link -->
                                <a class="link link-collapse small font-size-13 text-gray-27 d-inline-flex mt-2" data-toggle="collapse" href="#collapseColor" role="button" aria-expanded="false" aria-controls="collapseColor">
                                    <span class="link__icon text-gray-27 bg-white">
                                        <span class="link__icon-inner">+</span>
                                    </span>
                                    <span class="link-collapse__default">Show more</span>
                                    <span class="link-collapse__active">Show less</span>
                                </a>
                                <!-- End Link -->
                            </div>
                            <div class="border-bottom pb-4 mb-4">
                                <h4 class="font-size-14 mb-3 font-weight-bold">Memory</h4>

                                <!-- Checkboxes -->
                                <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="16GB" name ="memory[]" value="0">
                                        <label class="custom-control-label" for="16GB"> 16GB</label>
                                    </div>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="32GB" name ="memory[]" value="1">
                                        <label class="custom-control-label" for="32GB"> 32GB
                                    </div>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="64GB" name ="memory[]" value="2">
                                        <label class="custom-control-label" for="64GB"> 64GB
                                    </div>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="128GB" name ="memory[]" value="3">
                                        <label class="custom-control-label" for="128GB"> 128GB
                                    </div>
                                </div>
                                <!-- End Checkboxes -->

                                <!-- View More - Collapse -->
                                <div class="collapse" id="collapseMemory">
                                    <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="256gb" name ="memory[]" value="4">
                                            <label class="custom-control-label" for="256gb"> 256GB
                                        </div>
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="512gb" name ="memory[]" value="5">
                                            <label class="custom-control-label" for="512gb"> 512GB
                                        </div>
                                    </div>
                                </div>
                                <!-- End View More - Collapse -->
                                <!-- Link -->
                                <a class="link link-collapse small font-size-13 text-gray-27 d-inline-flex mt-2" data-toggle="collapse" href="#collapseMemory" role="button" aria-expanded="false" aria-controls="collapseMemory">
                                    <span class="link__icon text-gray-27 bg-white">
                                        <span class="link__icon-inner">+</span>
                                    </span>
                                    <span class="link-collapse__default">Show more</span>
                                    <span class="link-collapse__active">Show less</span>
                                </a>
                                <!-- End Link -->
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-9 col-wd-9gdot5">
                    <!-- Shop-control-bar Title -->
                    <div class="d-block d-md-flex flex-center-between mb-3">
                        <h3 class="font-size-25 mb-2 mb-md-0">Product</h3>
{{--                        <p class="font-size-14 text-gray-90 mb-0">Showing 1–25 of 56 results</p>--}}
                    </div>
                    <!-- End shop-control-bar Title -->
                    <!-- Shop-control-bar -->
                    <div class="bg-gray-1 flex-center-between borders-radius-9 py-1">
                        <div class="d-xl-none">
                            <!-- Account Sidebar Toggle Button -->
                            <a id="sidebarNavToggler1" class="btn btn-sm py-1 font-weight-normal" href="javascript:;" role="button"
                                aria-controls="sidebarContent1"
                                aria-haspopup="true"
                                aria-expanded="false"
                                data-unfold-event="click"
                                data-unfold-hide-on-scroll="false"
                                data-unfold-target="#sidebarContent1"
                                data-unfold-type="css-animation"
                                data-unfold-animation-in="fadeInLeft"
                                data-unfold-animation-out="fadeOutLeft"
                                data-unfold-duration="500">
                                <i class="fas fa-sliders-h"></i> <span class="ml-1">Filters</span>
                            </a>
                            <!-- End Account Sidebar Toggle Button -->
                        </div>
                        <div class="d-flex">
{{--                            <form method="POST" class="ml-2 d-none d-xl-block">--}}
{{--                                <!-- Select -->--}}
{{--                                <select class="js-select selectpicker dropdown-select max-width-120"--}}
{{--                                    data-style="btn-sm bg-white font-weight-normal py-2 border text-gray-20 bg-lg-down-transparent border-lg-down-0">--}}
{{--                                    <option value="one" selected>Show 20</option>--}}
{{--                                    <option value="two">Show 40</option>--}}
{{--                                    <option value="three">Show All</option>--}}
{{--                                </select>--}}
{{--                                <!-- End Select -->--}}
{{--                            </form>--}}
                        </div>
                        <nav class="px-3 flex-horizontal-center text-gray-20 d-none d-xl-flex">

                            <form method="get">
                                <!-- Select -->
                                <select id="filter-all-product" class="js-select selectpicker dropdown-select max-width-200 max-width-160-sm right-dropdown-0 px-2 px-xl-0"
                                    data-style="btn-sm bg-white font-weight-normal py-2 border text-gray-20 bg-lg-down-transparent border-lg-down-0">
                                    <option value="0" selected>Default sorting</option>
                                    <option value="1">Sort by New Product</option>
                                    <option value="2">Sort by average rating</option>
                                    <option value="3">Sort by latest</option>
                                    <option value="4">Sort by price: low to high</option>
                                    <option value="5">Sort by price: high to low</option>
{{--                                    <input type="hidden" name="id_category" id="id_category" value="{{$categoryId}}">--}}
                                </select>
                                <!-- End Select -->
                            </form>
                        </nav>
                    </div>
                    <!-- End Shop-control-bar -->
                    <!-- Shop Body -->
                    <!-- Tab Content -->
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade pt-2 show active" id="pills-two-example1" role="tabpanel" aria-labelledby="pills-two-example1-tab" data-target-group="groups">
                            <ul class="row list-unstyled products-group no-gutters">
                                @if(isset($productTypes) && !empty($productTypes) && empty($products))
                                    @foreach($productTypes as $productType)
                                        @if($productType->products->all() !== null)
                                            @foreach($productType->products->all() as $product)
                                                @include('userPage.pages.category.productItem', compact('product'))
                                            @endforeach
                                        @endif
                                    @endforeach
                                @elseif(!empty($products) && isset($products) && count($products))
                                    @if($products !== null)
                                    @foreach($products as $product)
                                        @include('userPage.pages.category.productItemId', compact('product'))
                                    @endforeach
                                    @endif
                                 @else
                                    Not found page
                                @endif
                            </ul>
                        </div>
                    </div>
                    <!-- End Tab Content -->
                    <!-- End Shop Body -->
                    <!-- Shop Pagination -->
                    <nav class="d-md-flex justify-content-between align-items-center border-top pt-3"
                         aria-label="Page navigation example">
                    @if(isset($productTypes) && !empty($productTypes) && empty($products))
                        @foreach($productTypes as $productType)
                            @foreach($productType->products->all() as $product)
{{--                                    {{ $product->withQueryString()->links('vendor.pagination.custom') }}--}}
                            @endforeach
                        @endforeach
                    @elseif(!empty($products) && isset($products) && count($products))
                            {{ $products->withQueryString()->links('vendor.pagination.custom') }}
                    @endif
                    </nav>
                    <!-- End Shop Pagination -->
                </div>
            </div>
        </div>
    </main>
    <!-- ========== END MAIN CONTENT ========== -->
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
         $(window).on('load', function () {
             // initialization of HSMegaMenu component
             $('.js-mega-menu').HSMegaMenu({
                 event: 'hover',
                 direction: 'horizontal',
                 pageContainer: $('.container'),
                 breakpoint: 767.98,
                 hideTimeOut: 0
             });
         });

         $(document).on('ready', function () {
             // initialization of header
             $.HSCore.components.HSHeader.init($('#header'));

             // initialization of animation
             $.HSCore.components.HSOnScrollAnimation.init('[data-animation]');

             // initialization of unfold component
             $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
                 afterOpen: function () {
                     $(this).find('input[type="search"]').focus();
                 }
             });

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
                 beforeClose: function () {
                     $('#hamburgerTrigger').removeClass('is-active');
                 },
                 afterClose: function () {
                     $('#headerSidebarList .collapse.show').collapse('hide');
                 }
             });

             $('#headerSidebarList [data-toggle="collapse"]').on('click', function (e) {
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
        $(document).ready(function () {


        const changefuction = e => {
            let prices = [];
            let colors = [];
            let memories = [];
            e.preventDefault();
            prices = []; // reset

            $('input[name="price[]"]:checked').each(function()
            {
                prices.push($(this).val());
            });
            $('input[name="color[]"]:checked').each(function()
            {
                colors.push($(this).val());
            });

            $('input[name="memory[]"]:checked').each(function()
            {
                memories.push($(this).val());
            });
            $.get("{{route('filterProduct')}}", {prices: prices,colors: colors,memories: memories}, function(markup)
            {
                $('#search-results').html(markup);
            });
        }
        // Listen for 'change' event, so this triggers when the user clicks on the checkboxes labels
        $('input[name="price[]"]').on('change', changefuction);
        $('input[name="color[]"]').on('change', changefuction);
        $('input[name="memory[]"]').on('change',changefuction);
    });
        $(document).ready(function() {
          $('#filter-all-product').change(function() {
            var filterAllProduct = $(this).val();
            var category = $('#id_category').val();
            if (filterAllProduct) {
              $.ajax({
                type: "get",
                url: '../admin/categories/'+category+'/' + filterAllProduct,
                success: function(res) {
                  if (res.length !== 0) {
                    $("#productType").empty();
                    $("#productType").append(
                        '<option>Choose product type ...</option>');
                    $.each(res, function(key, value) {
                      $("#productType").append('<option value="' + key +
                          '">' + value + '</option>');
                    });
                  }
                  else {
                    $("#productType").empty();
                  }
                }
              });
            }
          });
        });
    </script>
@endsection

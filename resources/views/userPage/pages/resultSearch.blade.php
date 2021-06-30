@extends('userPage.index')
@section('title')
    Result Search
@endsection
@section('script_header')
    <link rel="stylesheet" href="assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="assets/vendor/fancybox/jquery.fancybox.css">
    <link rel="stylesheet" href="assets/vendor/slick-carousel/slick/slick.css">
    <link rel="stylesheet" href="assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css">
@endsection
@section('content')
<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">
    <!-- breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <!-- breadcrumb -->
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="../home/index.html">Home</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Result Search</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container">
        <div class="row mb-12">
            <div class="col-xl-12 col-wd-12gdot5">
                <!-- Shop-control-bar Title -->
                <div class="d-block d-md-flex flex-center-between mb-3">
                    <h3 class="font-size-25 mb-2 mb-md-0">Result Search</h3>
                    <p class="font-size-14 text-gray-90 mb-0">Showing 1–25 of 56 results</p>
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
                    <div class="px-3 d-none d-xl-block">
                        <ul class="nav nav-tab-shop" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="pills-one-example1-tab" data-toggle="pill" href="#pills-one-example1" role="tab" aria-controls="pills-one-example1" aria-selected="false">
                                    <div class="d-md-flex justify-content-md-center align-items-md-center">
                                        <i class="fa fa-th"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-two-example1-tab" data-toggle="pill" href="#pills-two-example1" role="tab" aria-controls="pills-two-example1" aria-selected="false">
                                    <div class="d-md-flex justify-content-md-center align-items-md-center">
                                        <i class="fa fa-align-justify"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-three-example1-tab" data-toggle="pill" href="#pills-three-example1" role="tab" aria-controls="pills-three-example1" aria-selected="true">
                                    <div class="d-md-flex justify-content-md-center align-items-md-center">
                                        <i class="fa fa-list"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-four-example1-tab" data-toggle="pill" href="#pills-four-example1" role="tab" aria-controls="pills-four-example1" aria-selected="true">
                                    <div class="d-md-flex justify-content-md-center align-items-md-center">
                                        <i class="fa fa-th-list"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="d-flex">
                            <form method="get">
                                <!-- Select -->
                                <select id="filter"class="js-select selectpicker dropdown-select max-width-200 max-width-160-sm right-dropdown-0 px-2 px-xl-0"
                                    data-style="btn-sm bg-white font-weight-normal py-2 border text-gray-20 bg-lg-down-transparent border-lg-down-0">
                                    <option value="0" selected>Default sorting</option>
                                    <option value="1">Sort by latest</option>
                                    <option value="2">Sort by price: low to high</option>
                                    <option value="3">Sort by price: high to low</option>
                                </select>
                                <!-- End Select -->
                            <input type="hidden" name="productType_id" id="productType_id" value="{{$productType->id_product_type}}">
                            <input type="button" class="btn px-4 btn-primary-dark-w py-2 rounded-lg" value="Filter" id="filter_search">

                            </form>
                            {{-- <form method="get" class="ml-2 d-none d-xl-block">
                                <!-- Select -->
                                <select class="js-select selectpicker dropdown-select max-width-120"
                                    data-style="btn-sm bg-white font-weight-normal py-2 border text-gray-20 bg-lg-down-transparent border-lg-down-0">
                                    <option value="one" selected>Show 20</option>
                                    <option value="two">Show 40</option>
                                    <option value="three">Show All</option>
                                </select>
                                <!-- End Select -->
                            </form> --}}
                    </div>
                    <nav class="px-3 flex-horizontal-center text-gray-20 d-none d-xl-flex">
                        <form method="post" class="min-width-50 mr-1">
                            <input size="2" min="1" max="3" step="1" type="number" class="form-control text-center px-2 height-35" value="1">
                        </form> of 3
                        <a class="text-gray-30 font-size-20 ml-2" href="#">→</a>
                    </nav>
                </div>
                <!-- Tab Content -->
                @if (isset($product) && isset($productType))
                <div class="tab-content" id="pills-tabContent">
                    @if(strlen($product) && !empty($product))
                        <div class="tab-pane fade pt-2" id="pills-one-example1" role="tabpanel" aria-labelledby="pills-one-example1-tab" data-target-group="groups">
                            <ul class="row list-unstyled products-group no-gutters">
                                @if (!empty($product))
                                    @foreach ($product as $item)
                                        <li class="col-6 col-md-3 col-wd-2gdot4 product-item">
                                            <div class="product-item__outer h-100">
                                                <div class="product-item__inner px-xl-4 p-3">
                                                    <div class="product-item__body pb-xl-2">
                                                        <div class="mb-2"><a href="{{ route('categories.show', ['category'=> $item->productType->category->id_category]) }}" class="font-size-12 text-gray-5">Category : {{ $item->productType->category->name }}</a></div>
                                                        <h5 class="mb-1 product-item__title"><a href="{{ route('categories.show', ['category'=> $item->productType->category->id_category]) }}" class="text-blue font-weight-bold"><b>
                                                                {{ $item->productType->name }}</b> -
                                                                <b style="color: {{$colors[(int)$item->warehouse->color]['color'] ?? "grey"}}; "class="mx-1">{{$colors[(int)$item->warehouse->color]['name'] ?? "Grey"}}
                                                                </b> -
                                                                <b class="mx-1">
                                                                    {{$memory[(int)$item->warehouse->memory]['text'] ?? ""}}
                                                                </b>
                                                            </a>
                                                        </h5>
                                                        <div class="mb-3 d-none d-md-block">
															<?php
															$point = $item->point ?? 0;
															$result = "";
															if(isset($point)){
																$starFull = 0;
																$startEmpty = 0;

																if(round($point) > $point){
																	$starFull = round($point) -1;
																	$startEmpty = 5 - ($starFull + 1);
																}else if (round($point) == $point) {
																	$starFull = round($point);
																	$startEmpty = 5 - $starFull;
																}else if(round($point) < $point){
																	$starFull = round($point);
																	$startEmpty = 5 - ($starFull + 1);
																}

																$result .= str_repeat('<small class="fas fa-star"></small>', $starFull);
																!($starFull + $startEmpty == 5) && $result .= '<small class="fas fa-star-half-alt"></small>';
																$result .= str_repeat('<small class="far fa-star text-muted"></small>', $startEmpty);
															}
															?>
                                                            @if(isset($point))
                                                                @if($item->point)
                                                                    <a class="d-inline-flex align-items-center small font-size-14" href="#">
                                                                        <div class="text-warning mr-2">
                                                                            {!! $result !!}
                                                                        </div>
                                                                        <span class="text-secondary">{{$point}}</span>
                                                                    </a>
                                                                @else
                                                                    <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                                                        {!! $result !!}
                                                                    </div>
                                                                @endif

                                                            @endif
                                                        </div>
                                                        <div class="mb-2">
                                                            <a href="{{ route('categories.show', ['category'=> $item->productType->category->id_category]) }}" class="d-block text-center"><img class="img-fluid" src="../{{$item->thumbnail}}" alt="Image Description"></a>
                                                        </div>
                                                        <div class="flex-center-between mb-1">
                                                            @if ($item->discount > 0)
                                                                <div class="prodcut-price d-flex align-items-center position-relative">
                                                                    <ins class="font-size-20 text-red text-decoration-none"><b class="font-size-14">Sell: </b><b>${{number_format($item->price - ($item->price*($item->discount/100)))}}</b></ins>
                                                                    <del class="font-size-12 tex-gray-6 position-absolute bottom-100">Original :{{number_format($item->price)}}</del>
                                                                </div>
                                                            @else
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100"><b>${{number_format($item->price)}}</b></div>
                                                                </div>
                                                            @endif
                                                            <input class="js-result form-control h-auto border-0 rounded p-0 shadow-none" type="hidden" value="1" name= "quantity" id="quantity">
                                                            <div class="prodcut-add-cart">
                                                                <a onclick="addCart({{$item->id_product}})" href="javascript:"
                                                                   class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="tab-pane fade pt-2 " id="pills-two-example1" role="tabpanel" aria-labelledby="pills-two-example1-tab" data-target-group="groups">
                            <ul class="row list-unstyled products-group no-gutters">
                                @foreach ($product as $item)
                                        <li class="col-6 col-md-3 col-wd-2gdot4 product-item">
                                            <div class="product-item__outer h-100">
                                                <div class="product-item__inner px-xl-4 p-3">
                                                    <div class="product-item__body pb-xl-2">
                                                        <div class="mb-2"><a href="{{ route('categories.show', ['category'=> $item->productType->category->id_category]) }}" class="font-size-12 text-gray-5">Category : {{ $item->productType->category->name }}</a></div>
                                                        <h5 class="mb-1 product-item__title"><a href="{{ route('categories.show', ['category'=> $item->productType->category->id_category]) }}" class="text-blue font-weight-bold"><b>
                                                                    {{ $item->productType->name }}</b> -
                                                                <b style="color: {{$colors[(int)$item->warehouse->color]['color'] ?? "grey"}}; "class="mx-1">                                                                        {{$colors[(int)$item->warehouse->color]['name'] ?? ""}}
                                                                </b> -
                                                                <b class="mx-1">
                                                                    {{$memory[(int)$item->warehouse->memory]['text'] ?? ""}}
                                                                </b>
                                                            </a></h5>
                                                        <div class="mb-2">
                                                            <a href="{{ route('categories.show', ['category'=> $item->productType->category->id_category]) }}" class="d-block text-center"><img class="img-fluid" src="../{{$item->thumbnail}}" alt="Image Description"></a>
                                                        </div>
                                                        <ul class="font-size-12 p-0 text-gray-110 mb-4">
                                                            <li class="line-clamp-1 mb-1 list-bullet">{{ $item->productType->description }}</li>
                                                            <li class="line-clamp-1 mb-1 list-bullet">Quality : <b style="color : red;">New Full Box </b></li>
                                                            <li class="line-clamp-1 mb-1 list-bullet">Warranty : <b style="color : red;">{{$item->warehouse->warranty}}.Month</b></li>
                                                            <li class="line-clamp-1 mb-1 list-bullet">
																<?php
																$point = $item->point ?? 0;
																$result = "";
																if(isset($point)){
																	$starFull = 0;
																	$startEmpty = 0;

																	if(round($point) > $point){
																		$starFull = round($point) -1;
																		$startEmpty = 5 - ($starFull + 1);
																	}else if (round($point) == $point) {
																		$starFull = round($point);
																		$startEmpty = 5 - $starFull;
																	}else if(round($point) < $point){
																		$starFull = round($point);
																		$startEmpty = 5 - ($starFull + 1);
																	}

																	$result .= str_repeat('<small class="fas fa-star"></small>', $starFull);
																	!($starFull + $startEmpty == 5) && $result .= '<small class="fas fa-star-half-alt"></small>';
																	$result .= str_repeat('<small class="far fa-star text-muted"></small>', $startEmpty);
																}
																?>
                                                                @if(isset($point))
                                                                    @if($item->point)
                                                                        <a class="d-inline-flex align-items-center small font-size-14" href="#">
                                                                            <div class="text-warning mr-2">
                                                                                {!! $result !!}
                                                                            </div>
                                                                            <span class="text-secondary">{{$point}}</span>
                                                                        </a>
                                                                    @else
                                                                        <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                                                            {!! $result !!}
                                                                        </div>
                                                                    @endif

                                                                @endif
                                                            </li>
                                                        </ul>
                                                        <div class="text-gray-20 mb-2 font-size-12 text-blue font-weight-bold"><b>SKU: {{$item->id_product}}</b></div>
                                                        <div class="flex-center-between mb-1">
                                                            @if ($item->discount > 0)
                                                                <div class="prodcut-price d-flex align-items-center position-relative">
                                                                    <ins class="font-size-20 text-red text-decoration-none"><b>${{number_format($item->price - ($item->price*($item->discount/100)))}}</b></ins>
                                                                    <del class="font-size-12 tex-gray-6 position-absolute bottom-100">${{number_format($item->price)}}</del>
                                                                </div>
                                                            @else
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100"><b>${{number_format($item->price)}}</b></div>
                                                                </div>
                                                            @endif
                                                            <input class="js-result form-control h-auto border-0 rounded p-0 shadow-none" type="hidden" value="1" name= "quantity" id="quantity">
                                                            <div class="prodcut-add-cart">
                                                                <a onclick="addCart({{$item->id_product}})" href="javascript:"
                                                                   class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                            </ul>
                        </div>
                        <div class="tab-pane fade pt-2 show active" id="pills-three-example1" role="tabpanel" aria-labelledby="pills-three-example1-tab" data-target-group="groups">
                            <ul class="d-block list-unstyled products-group prodcut-list-view">
                                @if (!empty($productType))
                                    @foreach ($productType->products as $item)
                                        <li class="product-item remove-divider">
                                            <div class="product-item__outer w-100">
                                                <div class="product-item__inner remove-prodcut-hover py-4 row">
                                                    <div class="product-item__header col-6 col-md-4">
                                                        <div class="mb-2">
                                                            <a href="{{ route('products.show', ['product' => $item->id_product ]) }}" class="d-block text-center"><img class="img-fluid" src="../{{$item->thumbnail}}" alt="Image Description"></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-item__body col-6 col-md-5">
                                                        <div class="pr-lg-10">
                                                            <div class="mb-2"><a href="{{ route('categories.show', ['category'=> $item->productType->category->id_category]) }}" class="font-size-20 text-gray-5">Category : {{ $item->productType->category->name }}</a></div>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <h3 class="font-size-22 font-weight-normal text-lh-28 ">
                                                                    <b>{{ $item->productType->name }}</b> -
                                                                    <b style="color: {{$colors[(int)$item->warehouse->color]['color'] ?? "grey"}}; "class="mx-1">                                                                        {{$colors[(int)$item->warehouse->color]['name'] ?? ""}}
                                                                    </b> -
                                                                    <b class="mx-1">
                                                                        {{$memory[(int)$item->warehouse->memory]['text'] ?? ""}}
                                                                    </b>
                                                                </h3>
                                                                @if ($item->discount > 0)
                                                                    <div class="d-flex align-items-center flex-column justify-content-center bg-primary rounded-pill height-60 width-60 text-lh-1">
                                                                        <span class="font-size-12"><b>Sales</b></span>
                                                                        <div class="font-size-20 font-weight-bold">{{$item->discount}}%</div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <h5 class="mb-2 product-item__title"><a href="../shop/single-product-fullwidth.html" class="font-size-15 text-blue font-weight-bold">{{ $item->productType->description }}</a></h5>
                                                            <div class="prodcut-price mb-2 d-md-none">
                                                                @if ($item->discount > 0)
                                                                    <div class="text-gray-100 font-size-15"><b><del>${{number_format($item->price)}}</del></b></div>
                                                                    <div class="text-gray-100 font-size-20"><b style="color: red">Price sell  : ${{number_format($item->price - ($item->price*($item->discount/100)))}}</b></div>
                                                                @else
                                                                    <div class="text-gray-100 font-size-20"><b style="color: red">Price sell : ${{number_format($item->price)}}</b></div>
                                                                @endif
                                                            </div>
                                                            <div class="mb-3 d-none d-md-block">
																<?php
                                                                $point = $item->point ?? 0;
																$result = "";
																if(isset($point)){
																	$starFull = 0;
																	$startEmpty = 0;

																	if(round($point) > $point){
																		$starFull = round($point) -1;
																		$startEmpty = 5 - ($starFull + 1);
																	}else if (round($point) == $point) {
																		$starFull = round($point);
																		$startEmpty = 5 - $starFull;
																	}else if(round($point) < $point){
																		$starFull = round($point);
																		$startEmpty = 5 - ($starFull + 1);
																	}

																	$result .= str_repeat('<small class="fas fa-star"></small>', $starFull);
																	!($starFull + $startEmpty == 5) && $result .= '<small class="fas fa-star-half-alt"></small>';
																	$result .= str_repeat('<small class="far fa-star text-muted"></small>', $startEmpty);
																}
																?>
                                                                @if(isset($point))
                                                                    @if($item->point)
                                                                        <a class="d-inline-flex align-items-center small font-size-14" href="#">
                                                                            <div class="text-warning mr-2">
                                                                                {!! $result !!}
                                                                            </div>
                                                                            <span class="text-secondary">{{$point}}</span>
                                                                        </a>
                                                                    @else
                                                                        <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                                                            {!! $result !!}
                                                                        </div>
                                                                    @endif

                                                                @endif
                                                            </div>
                                                            <ul class="font-size-15 p-0 text-gray-110 mb-4 d-none d-md-block">
                                                                <li class="line-clamp-1 mb-1 list-bullet">Quality : <b style="color : red;">New Full Box</b></li>
                                                                <li class="line-clamp-1 mb-1 list-bullet">Warranty : <b style="color : red;">{{$item->warehouse->warranty}}.Month</b></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-item__footer col-md-3 d-md-block">
                                                        <div class="mb-3">
                                                            <div class="prodcut-price mb-2">
                                                                @if ($item->discount > 0)
                                                                    <div class="d-flex align-items-center justify-content-center mb-3">
                                                                        <del class="font-size-18 mr-2 text-gray-2">${{number_format($item->price)}}</del>
                                                                        <ins class="font-size-30 text-red text-decoration-none">${{number_format($item->price - ($item->price*($item->discount/100)))}}</ins>
                                                                    </div>
                                                                @else
                                                                    <div class="d-flex align-items-center justify-content-center mb-3">
                                                                        <ins class="font-size-30 text-black text-decoration-none">${{number_format($item->price)}}</ins>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <div class="prodcut-add-cart">
                                                                <a onclick="addCart({{$item->id_product}})" href="javascript:" class="btn btn-sm btn-block btn-primary-dark btn-wide transition-3d-hover">Add to cart</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="tab-pane fade pt-2 " id="pills-four-example1" role="tabpanel" aria-labelledby="pills-four-example1-tab" data-target-group="groups">
                            <ul class="d-block list-unstyled products-group prodcut-list-view-small">
                                @foreach ($product as $item)
                                        <li class="product-item remove-divider">
                                            <div class="product-item__outer w-100">
                                                <div class="product-item__inner remove-prodcut-hover py-4 row">
                                                    <div class="product-item__header col-6 col-md-2">
                                                        <div class="mb-2">
                                                            <a href="{{ route('products.show', ['product' => $item->id_product ]) }}" class="d-block text-center"><img class="img-fluid" src="../{{$item->thumbnail}}" alt="Image Description"></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-item__body col-6 col-md-7">
                                                        <div class="pr-lg-10">
                                                            <div class="mb-2"><a href="{{ route('categories.show', ['category'=> $item->productType->category->id_category]) }}" class="font-size-12 text-gray-5">Category : {{ $item->productType->category->name }}</a></div>
                                                            <h5 class="mb-2 product-item__title"><a href="../shop/single-product-fullwidth.html" class="text-blue font-weight-bold"><b>{{ $item->productType->name }}</b> -
                                                                    <b style="color: {{$colors[(int)$item->warehouse->color]['color'] ?? "grey"}}; "class="mx-1">                                                                        {{$colors[(int)$item->warehouse->color]['name'] ?? ""}}
                                                                    </b> -
                                                                    <b class="mx-1">
                                                                        {{$memory[(int)$item->warehouse->memory]['text'] ?? ""}}
                                                                    </b>
                                                                </a></h5>
                                                            <div class="prodcut-price d-md-none">
                                                                @if ($item->discount > 0)
                                                                    <div class="text-gray-100 font-size-15"><b><del>${{number_format($item->price)}}</del></b></div>
                                                                    <div class="text-gray-100 font-size-20"><b style="color: red">Price sell  : ${{number_format($item->price - ($item->price*($item->discount/100)))}}</b></div>
                                                                @else
                                                                    <div class="text-gray-100 font-size-20"><b style="color: red">Price sell : ${{number_format($item->price)}}</b></div>
                                                                @endif
                                                            </div>
                                                            <ul class="font-size-12 p-0 text-gray-110 mb-4 d-none d-md-block">
                                                                <li class="line-clamp-1 mb-1 list-bullet">Description :{{ $item->productType->description }}</li>
                                                                <li class="line-clamp-1 mb-1 list-bullet">Quality : <b style="color : red;">New Full Box</b></li>
                                                                <li class="line-clamp-1 mb-1 list-bullet">Warranty : <b style="color : red;">{{$item->warehouse->warranty}}.Month</b></li>
                                                            </ul>
                                                            <div class="mb-3 d-none d-md-block">
																<?php
																$point = $item->point ?? 0;
																$result = "";
																if(isset($point)){
																	$starFull = 0;
																	$startEmpty = 0;

																	if(round($point) > $point){
																		$starFull = round($point) -1;
																		$startEmpty = 5 - ($starFull + 1);
																	}else if (round($point) == $point) {
																		$starFull = round($point);
																		$startEmpty = 5 - $starFull;
																	}else if(round($point) < $point){
																		$starFull = round($point);
																		$startEmpty = 5 - ($starFull + 1);
																	}

																	$result .= str_repeat('<small class="fas fa-star"></small>', $starFull);
																	!($starFull + $startEmpty == 5) && $result .= '<small class="fas fa-star-half-alt"></small>';
																	$result .= str_repeat('<small class="far fa-star text-muted"></small>', $startEmpty);
																}
																?>
                                                                @if(isset($point))
                                                                    @if($item->point)
                                                                        <a class="d-inline-flex align-items-center small font-size-14" href="#">
                                                                            <div class="text-warning mr-2">
                                                                                {!! $result !!}
                                                                            </div>
                                                                            <span class="text-secondary">{{$point}}</span>
                                                                        </a>
                                                                    @else
                                                                        <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                                                            {!! $result !!}
                                                                        </div>
                                                                    @endif

                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-item__footer col-md-3 d-md-block">
                                                        <div class="mb-2 flex-center-between">
                                                            <div class="prodcut-price">
                                                                @if ($item->discount > 0)
                                                                    <div class="d-flex align-items-center justify-content-center mb-3">
                                                                        <del class="font-size-15 mr-2 text-gray-2">${{number_format($item->price)}}</del>
                                                                        <ins class="font-size-25 text-red text-decoration-none">${{number_format($item->price - ($item->price*($item->discount/100)))}}</ins>
                                                                    </div>
                                                                @else
                                                                    <div class="d-flex align-items-center justify-content-center mb-3">
                                                                        <ins class="font-size-25 text-black text-decoration-none">${{number_format($item->price)}}</ins>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <div class="prodcut-add-cart">
                                                                <a onclick="addCart({{$item->id_product}})" href="javascript:" class="btn btn-sm btn-block btn-primary-dark btn-wide transition-3d-hover">Add to cart</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                            </ul>
                        </div>
                    @else
                        <div class="mb-5 text-center pb-3 border-bottom border-color-1">
                            <h1 class="font-size-sl-72 font-weight-light mb-3">404!</h1>
                            <p class="text-gray-90 font-size-20 mb-0 font-weight-light">Nothing was found at this location. Try
                                searching, or check out the links below.</p>
                        </div>
                    @endif
                </div>
                @else
                <div class="tab-content" id="pills-tabContent">
                    @include('userPage/ajax/resultSearchAjax')
                </div>
                @endif
                <!-- End Tab Content -->
                @if(!empty($productType) && !empty($product))
                <nav class="d-md-flex justify-content-between align-items-center border-top pt-3"
                     aria-label="Page navigation example">
                    {{ $product->withQueryString()->links('vendor.pagination.custom') }}
                    <input type="hidden" name="page_on" value="{{ $product->currentPage() }}">
                </nav>
                @endif
                <!-- End Shop Pagination -->
            </div>
        </div>
    </div>
</main>
<!-- ========== END MAIN CONTENT ========== -->
@endsection
@section('script_footer')
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
<script src="assets/vendor/typed.js/lib/typed.min.js"></script>
<script src="assets/vendor/slick-carousel/slick/slick.js"></script>
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
<script src="assets/js/components/hs.show-animation.js"></script>
<script src="assets/js/components/hs.svg-injector.js"></script>
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
            afterClose: function() {
                $('#headerSidebarList .collapse.show').collapse('hide');
            }
        });

        $('#headerSidebarList [data-toggle="collapse"]').on('click', function (e) {
            e.preventDefault();

            var target = $(this).data('target');

            if($(this).attr('aria-expanded') === "true") {
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
    $(document).ready(function() {
    $('#filter_search').click(function() {
        var productType_id = $('#productType_id').val();
        var filter = $('#filter').val();
        $.ajax({
            type:"get",
            url: '{{route('getOption')}}',
            data:{productType_id :productType_id,filter:filter },
            success:function(res){
                if(res.length !== 0){
                    $("#pills-tabContent").empty();
                    $("#pills-tabContent").html(res);
                }
            }
        });
    });
    });

</script>
@endsection

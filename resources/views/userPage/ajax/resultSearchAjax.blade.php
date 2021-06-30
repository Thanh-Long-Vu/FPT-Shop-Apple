<div class="tab-pane fade pt-2" id="pills-one-example1" role="tabpanel" aria-labelledby="pills-one-example1-tab" data-target-group="groups">
    <ul class="row list-unstyled products-group no-gutters">
        @if (isset($product))
            @foreach ($product as $item)
            <li class="col-6 col-md-3 col-wd-2gdot4 product-item">
                <div class="product-item__outer h-100">
                    <div class="product-item__inner px-xl-4 p-3">
                        <div class="product-item__body pb-xl-2">
                            <div class="mb-2"><a href="{{ route('categories.show', ['category'=> $item->productType->category->id_category]) }}" class="font-size-12 text-gray-5">Category : {{ $item->productType->category->name }}</a></div>
                            <h5 class="mb-1 product-item__title"><a href="{{ route('categories.show', ['category'=> $item->productType->category->id_category]) }}" class="text-blue font-weight-bold"><b>
                                {{ $item->productType->name }}</b> -
                                <b style="color: {{$colors[(int)$item->first()->warehouse->color]['color'] ?? "grey"}}; "class="mx-1">{{$colors[(int)$item->first()->warehouse->color]['name'] ?? ""}}
                                </b> -
                                <b class="mx-1">
                                    {{$memory[(int)$item->first()->warehouse->memory]['text'] ?? ""}}
                                </b>
                                </a></h5>
                            <div class="mb-2">
                                <a href="{{ route('categories.show', ['category'=> $item->productType->category->id_category]) }}" class="d-block text-center"><img class="img-fluid" src="../{{$item->thumbnail}}" alt="Image Description"></a>
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
        @endif
    </ul>
</div>
<div class="tab-pane fade pt-2 " id="pills-two-example1" role="tabpanel" aria-labelledby="pills-two-example1-tab" data-target-group="groups">
    <ul class="row list-unstyled products-group no-gutters">
        @if(isset($product))
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
                            <ul class="font-size-12 p-0 text-gray-110 mb-4">
                                <li class="line-clamp-1 mb-1 list-bullet">{{ $item->productType->description }}</li>
                                <li class="line-clamp-1 mb-1 list-bullet">Quality : <b style="color : red;">New Full Box </b></li>
                                <li class="line-clamp-1 mb-1 list-bullet">Warranty : <b style="color : red;">{{$item->warehouse->warranty}}.Month</b></li>
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
        @endif
    </ul>
</div>
<div class="tab-pane fade pt-2 show active" id="pills-three-example1" role="tabpanel" aria-labelledby="pills-three-example1-tab" data-target-group="groups">
    <ul class="d-block list-unstyled products-group prodcut-list-view">
        @if (isset($product))
            @foreach ($product as $item)
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
                                <input class="js-result form-control h-auto border-0 rounded p-0 shadow-none" type="hidden" value="1" name= "quantity" id="quantity">
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
        @if (isset($product))
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
                                <h5 class="mb-2 product-item__title">
                                    <a href="../shop/single-product-fullwidth.html" class="text-blue font-weight-bold"><b>{{ $item->productType->name }}</b> -
                                        <b style="color: {{$colors[(int)$item->warehouse->color]['color'] ?? "grey"}}; "class="mx-1"
                                        >
                                            {{$colors[(int)$item->warehouse->color]['name'] ?? ""}}
                                        </b> -
                                        <b class="mx-1">
                                            {{$memory[(int)$item->warehouse->memory]['text'] ?? ""}}
                                        </b>
                                    </a></h5>
                                <div class="prodcut-price d-md-none">
                                    @if ($item->discount > 0)
                                        <div class="text-gray-100 font-size-15"><b><del>{{number_format($item->price)}}</del></b></div>
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
                                <input class="js-result form-control h-auto border-0 rounded p-0 shadow-none" type="hidden" value="1" name= "quantity" id="quantity">
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

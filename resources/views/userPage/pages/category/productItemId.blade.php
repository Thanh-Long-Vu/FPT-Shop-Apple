@if(isset($product) && !empty($product))
    <li class="col-6 col-md-3 col-wd-2gdot4 product-item">
        <div class="product-item__outer h-100">
            <div class="product-item__inner px-xl-4 p-3">
                <div class="product-item__body pb-xl-2">
                    {{--                    <div class="mb-2"><a href="{{ route('products.show', ['product' => $product->id_product ?? 0 ]) }}" class="font-size-12 text-gray-5">Category : {{ $product->productType->category->name }}</a></div>--}}
                    <h5 class="mb-1 product-item__title">
                        {{--                        {{dd($product)}}--}}
                        <a href="{{ route('products.show', ['product' => $product->id_product ]) }}" class="text-blue font-weight-bold">
                            {{ $product->productType->name }}</b> -
                            <b style="color: {{$colors[(int)$product->warehouse->color]['color'] ?? "grey"}}; "class="mx-1">{{$colors[(int)$product->warehouse->color]['name'] ?? ""}}
                            </b> -
                            <b class="mx-1">
                                {{$memory[(int)$product->warehouse->memory]['text'] ?? ""}}
                            </b>
                        </a></h5>
                    <div class="mb-2">
                        <a href="{{ route('products.show', ['product' => $product->id_product ]) }}" class="d-block text-center">
                            <img class="img-fluid img-product" src="../{{ $product->thumbnail }}" alt="Image Description">
                        </a>
                    </div>
                    <div class="mb-3">
						<?php
						$point = $product->point ?? 0;
						$show = true;
						?>
                        @include('userPage.pages.category.ratingItem', compact('point'))
                    </div>
                    <ul class="font-size-12 p-0 text-gray-110 mb-4">
                        <li class="line-clamp-1 mb-1 list-bullet">{{ $product->productType->description }}</li>
                        <li class="line-clamp-1 mb-1 list-bullet">Quality : <b style="color : red;">New Full Box </b></li>
                        <li class="line-clamp-1 mb-1 list-bullet">Warranty : <b style="color : red;">{{$product->warehouse->warranty ?? 0}} Month</b></li>
                    </ul>
                    <div class="flex-center-between mb-1">
                        @if ($product->discount > 0)
                            <div class="prodcut-price d-flex align-items-center position-relative">
                                <ins class="font-size-20 text-red text-decoration-none">
                                    <b>${{number_format($product->price - ($product->price*($product->discount/100)))}}</b>
                                </ins>
                                <div class="font-size-12 tex-gray-6 position-absolute bottom-100">
                                    <del>${{number_format($product->price)}}</del>
                                </div>

                            </div>
                        @else
                            <div class="prodcut-price">
                                <div class="text-gray-100"><b>${{number_format($product->price ?? 0)}}</b></div>
                            </div>
                        @endif
                        <div class="d-none d-xl-block prodcut-add-cart">
                            <input type="hidden" value="1" name= "quantity" id="quantity">
                            <a onclick="addCart({{$product->id_product}})" href="javascript:" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </li>
@endif

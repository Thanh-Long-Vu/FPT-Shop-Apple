@if(!empty($productTypeWatch))
    @foreach ($productTypeWatch as $item)
        @if(!empty($item->products->first()->warehouse))
            <li class="col-md-6 col-lg-4 col-wd-3 product-item remove-divider">
                <div class="product-item__outer h-100 w-100 w-100 prodcut-box-shadow">
                    <div class="product-item__inner bg-white p-3">
                        <div class="product-item__body pb-xl-2">
                            <div class="mb-2"><a
                                    href="{{ route('products.show', ['product'=> $item->products->first()->id_product ?? 0]) }}"
                                    class="font-size-12 text-gray-5">Category : {{$item->category->name}}</a></div>
                            <h5 class="mb-1 product-item__title">
                                <a href="{{ route('products.show', ['product'=> $item->products->first()->id_product ?? 0]) }}"
                                    class="text-blue font-weight-bold">
                                    {{$item->name}}-
                                    <b style="color: {{$colors[(int)$item->products->first()->warehouse->color]['color'] ?? "grey"}}; "class="mx-1"
                                    >
                                        {{$colors[(int)$item->products->first()->warehouse->color]['name'] ?? ""}}
                                    </b> -
                                    <b class="mx-1">
                                        {{$memory[(int)$item->products->first()->warehouse->memory]['text'] ?? ""}}
                                    </b>
                                </a></h5>
                            <div class="mb-2">
                                <a href="{{ route('products.show', ['product'=> $item->products->first()->id_product ?? 0]) }}"
                                   class="d-block text-center"><img class="img-fluid"
                                                                    src="../{{$item->products->first()->thumbnail}}" alt="Image Description"></a>
                            </div>
                            <div class="flex-center-between mb-1">
                                @if ($item->products->first()->discount > 0)
                                    <div class="prodcut-price d-flex align-items-center position-relative">
                                        <ins class="font-size-20 text-red text-decoration-none"><b>${{number_format($item->products->first()->price - ($item->products->first()->price*($item->products->first()->discount/100)))}}</b></ins>
                                        <del class="font-size-12 tex-gray-6 position-absolute bottom-100">${{number_format($item->products->first()->price)}}</del>
                                    </div>
                                @else
                                    <div class="prodcut-price">
                                        <div class="text-gray-100"><b>${{number_format($item->products->first()->price)}}</b></div>
                                    </div>
                                @endif
                                    <input class="js-result form-control h-auto border-0 rounded p-0 shadow-none" type="hidden" value="1" name= "quantity" id="quantity">
                                    <div class="d-none d-xl-block prodcut-add-cart">
                                        <a onclick="addCart({{$item->products->first()->id_product}})" href="javascript:"
                                           class="btn-add-cart btn-primary transition-3d-hover"><i
                                                class="ec ec-add-to-cart"></i>
                                        </a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        @endif
    @endforeach
@endif

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
                                {{-- @if (!empty($order)) --}}
                                @foreach ($order as $item)
                                <tr class="cart_item">
                                    <td>{{$item->product->productType->name}}&nbsp;<strong class="product-quantity">× {{$item->quantity}}</strong></td>
                                    <td>${{number_format($item->product->price)}}</td>
                                </tr>
                                @endforeach
                                {{-- @endif --}}
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Subtotal</th>
                                    <td>{{$totalprice}}</td>
                                </tr>
                                <tr>
                                    <th>Total Sale</th>
                                    <td><b>{{$sale}}%</b></td>
                                </tr>
                                <tr>
                                    <th>Shipping</th>
                                    <td><b>Free Ship</b></td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td><strong>${{number_format($dataTransaction->total_price)}}</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                        <!-- End Product Content -->
                        <div class="border-top border-width-3 border-color-1 pt-3 mb-3">
                            <!-- Basics Accordion -->
                            <div id="basicsAccordion1">
                                @if ($dataTransaction->payment_method_id == 1)
                                    <!-- Card -->
                                    <div class="border-bottom border-color-1 border-dotted-bottom">
                                        <div class="p-3" id="basicsHeadingThree">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" id="thirdstylishRadio1" name="stylishRadio" disabled checked>
                                                <label class="custom-control-label form-label" for="thirdstylishRadio1" data-toggle="collapse" data-target="#basicsCollapseThree" aria-expanded="false" aria-controls="basicsCollapseThree">
                                                    Cash on delivery
                                                </label>
                                            </div>
                                        </div>
                                        {{-- <div id="basicsCollapseThree" class="collapse border-top border-color-1 border-dotted-top bg-dark-lighter" aria-labelledby="basicsHeadingThree" data-parent="#basicsAccordion1">
                                            <div class="p-4">
                                                Pay with cash upon delivery.
                                            </div>
                                        </div> --}}
                                    </div>
                                    <!-- End Card -->
                                @elseif($dataTransaction->payment_method_id == 2)
                                    <!-- Card -->
                                    <div class="border-bottom border-color-1 border-dotted-bottom">
                                        <div class="p-3" id="basicsHeadingOne">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" id="stylishRadio1" name="stylishRadio" checked="" disabled>
                                                <label class="custom-control-label form-label" for="stylishRadio1" data-toggle="collapse" data-target="#basicsCollapseOnee" aria-expanded="true" aria-controls="basicsCollapseOnee">
                                                    Direct bank transfer
                                                </label>
                                            </div>
                                        </div>
                                        {{-- <div id="basicsCollapseOnee" class="collapse show border-top border-color-1 border-dotted-top bg-dark-lighter" aria-labelledby="basicsHeadingOne" data-parent="#basicsAccordion1">
                                            <div class="p-4">
                                                Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.
                                            </div>
                                        </div> --}}
                                    </div>
                                    <!-- End Card -->
                                @elseif($dataTransaction->payment_method_id == 3)
                                    <!-- Card -->
                                    <div class="border-bottom border-color-1 border-dotted-bottom">
                                        <div class="p-3" id="basicsHeadingFour">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" id="FourstylishRadio1" name="stylishRadio"disabled checked>
                                                <label class="custom-control-label form-label" for="FourstylishRadio1" data-toggle="collapse" data-target="#basicsCollapseFour" aria-expanded="false" aria-controls="basicsCollapseFour">
                                                    Installment via Bank
                                                </label>
                                            </div>
                                        </div>
                                        {{-- <div id="basicsCollapseFour" class="collapse border-top border-color-1 border-dotted-top bg-dark-lighter" aria-labelledby="basicsHeadingFour" data-parent="#basicsAccordion1">
                                            <div class="p-4">
                                                Installment via Bank ; you can pay with your credit card if you are qualified by the bank.
                                            </div>
                                        </div> --}}
                                    </div>
                                    <!-- End Card -->
                                @endif
                            </div>
                            <!-- End Basics Accordion -->
                        </div>
                        @if ($dataTransaction->method_receive == 0)
                        <span class="btn btn-primary-dark-w btn-block btn-pill font-size-20 mb-3 py-3"disable>Receive goods on delivery</span>
                        @else
                        <span class="btn btn-primary-dark-w btn-block btn-pill font-size-20 mb-3 py-3"disable>In-Store Delivery</span>
                        @endif
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
                                Name
                            </label>
                            <input type="text" class="form-control"  value="{{$dataTransaction->addtional_data[0]["value"]}}" name="name" aria-label="" required="" data-msg="Please enter your frist name." data-error-class="u-has-error" data-success-class="u-has-success" autocomplete="off" disabled>
                        </div>
                        <!-- End Input -->
                    </div>

                    <div class="col-md-6">
                        <!-- Input -->
                        <div class="js-form-message mb-6">
                            <label class="form-label">
                                Email address
                            </label>
                            <input type="email" class="form-control" value="{{$dataTransaction->addtional_data[1]["value"]}}" name="emailAddress" placeholder="jackwayley@gmail.com" aria-label="jackwayley@gmail.com" required="" data-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success" disabled>
                        </div>
                        <!-- End Input -->
                    </div>

                    <div class="col-md-6">
                        <!-- Input -->
                        <div class="js-form-message mb-6">
                            <label class="form-label">
                                Phone
                            </label>
                            <input type="text" class="form-control" value="{{$dataTransaction->addtional_data[2]["value"]}}" placeholder="+" aria-label="" data-msg="Please enter your last name." data-error-class="u-has-error" data-success-class="u-has-success" disabled>
                        </div>
                        <!-- End Input -->
                    </div>
                    <div class="col-md-6">
                        <!-- Input -->
                        <div class="js-form-message mb-6">
                            <label class="form-label">
                                Status of Transaction
                            </label>
                            @if ($dataTransaction->status == 3)
                            <input type="text" class="btn px-4 btn-primary-dark-w py-2 rounded-lg" value="Ordered" placeholder="+" aria-label="" disabled>
                            @elseif($dataTransaction->status == 0)
                            <input type="text" class="btn px-4 btn-info py-2 rounded-lg" value="In-Processing" placeholder="+" aria-label="" disabled>
                            @elseif($dataTransaction->status == 1)
                            <input type="text" class="btn px-4 btn-success py-2 rounded-lg" value="Successful delivery" placeholder="+" aria-label=""  disabled>
                            @elseif($dataTransaction->status == 2)
                            <input type="text" class="btn px-4 btn-danger py-2 rounded-lg" value="Delivery failed" placeholder="+" aria-label="" disabled>
                            @elseif($dataTransaction->status == 4)
                            <input type="text" class="btn px-4 btn-success py-2 rounded-lg" value="Reviewed" placeholder="+" aria-label="" disabled>
                            @endif
                        </div>
                        <!-- End Input -->
                    </div>

                    <div class="w-100"></div>
                </div>
                <!-- End Billing Form -->
                <!-- Input -->
                <div class="js-form-message mb-6">
                    <label class="form-label">
                        Order notes (optional)
                    </label>

                    <div class="input-group">
                        <textarea class="form-control p-5" rows="4" name="text" disabled>{{$dataTransaction->note}}</textarea>
                    </div>
                </div>
                <!-- End Input -->
            </div>
        </div>
    </div>
</form>

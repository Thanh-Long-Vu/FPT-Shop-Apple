<?php
    $show = false;
    $sumRating = count($ratingForProduct ?? []);
?>

@if(isset($ratingForProduct) && isset($point))
    <div class="row mb-8">
        <div class="col-md-6">
            <div class="mb-3">
                <h3 class="font-size-18 mb-6">Based on {{$sumRating}} reviews</h3>
                <h2 class="font-size-30 font-weight-bold text-lh-1 mb-0">{{$point}}</h2>
                <div class="text-lh-1">overall</div>
            </div>

            <!-- Ratings -->
            <ul class="list-unstyled">
            <?php
                for( $i = 1;  $i < 6; $i++ ){
                    $point = 6 - $i;
                    $sumRatingByNumberStar = count($ratingForProduct->where('number','=',$point)->all());
                ?>
                    <li class="py-1">
                        <a class="row align-items-center mx-gutters-2 font-size-1" href="javascript:;">
                            <div class="col-auto mb-2 mb-md-0">
                                @include('userPage.pages.category.ratingItem', compact('point', 'show'))
                            </div>
                            <div class="col-auto mb-2 mb-md-0">
                                <div class="progress ml-xl-5" style="height: 10px; width: 200px;">
                                    <div class="progress-bar" role="progressbar" style="width: {{$sumRating ? $sumRatingByNumberStar / $sumRating * 100 : 0}}%;" aria-valuenow="1" aria-valuemin="0" aria-valuemax="{{$sumRating}}"></div>
                                </div>
                            </div>
                            <div class="col-auto text-right">
                                <span class="text-gray-90">{{$sumRatingByNumberStar}}</span>
                            </div>
                        </a>
                    </li>
                <?php } ?>
            </ul>
            <!-- End Ratings -->
        </div>
        {{--    <div class="col-md-6">--}}
        {{--        <h3 class="font-size-18 mb-5">Add a review</h3>--}}
        {{--        <!-- Form -->--}}
        {{--        <form class="js-validate" novalidate="novalidate">--}}
        {{--            <div class="row align-items-center mb-4">--}}
        {{--                <div class="col-md-4 col-lg-3">--}}
        {{--                    <label for="rating" class="form-label mb-0">Your Review</label>--}}
        {{--                </div>--}}
        {{--                <div class="col-md-8 col-lg-9">--}}
        {{--                    <a href="#" class="d-block">--}}
        {{--                        <div class="text-warning text-ls-n2 font-size-16">--}}
        {{--                            <small class="far fa-star text-muted"></small>--}}
        {{--                            <small class="far fa-star text-muted"></small>--}}
        {{--                            <small class="far fa-star text-muted"></small>--}}
        {{--                            <small class="far fa-star text-muted"></small>--}}
        {{--                            <small class="far fa-star text-muted"></small>--}}
        {{--                        </div>--}}
        {{--                    </a>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--            <div class="js-form-message form-group mb-3 row">--}}
        {{--                <div class="col-md-4 col-lg-3">--}}
        {{--                    <label for="descriptionTextarea" class="form-label">Your Review</label>--}}
        {{--                </div>--}}
        {{--                <div class="col-md-8 col-lg-9">--}}
        {{--                    <textarea class="form-control" rows="3" id="descriptionTextarea" data-msg="Please enter your message." data-error-class="u-has-error" data-success-class="u-has-success"></textarea>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--            <div class="js-form-message form-group mb-3 row">--}}
        {{--                <div class="col-md-4 col-lg-3">--}}
        {{--                    <label for="inputName" class="form-label">Name <span class="text-danger">*</span></label>--}}
        {{--                </div>--}}
        {{--                <div class="col-md-8 col-lg-9">--}}
        {{--                    <input type="text" class="form-control" name="name" id="inputName" aria-label="Alex Hecker" required="" data-msg="Please enter your name." data-error-class="u-has-error" data-success-class="u-has-success">--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--            <div class="js-form-message form-group mb-3 row">--}}
        {{--                <div class="col-md-4 col-lg-3">--}}
        {{--                    <label for="emailAddress" class="form-label">Email <span class="text-danger">*</span></label>--}}
        {{--                </div>--}}
        {{--                <div class="col-md-8 col-lg-9">--}}
        {{--                    <input type="email" class="form-control" name="emailAddress" id="emailAddress" aria-label="alexhecker@pixeel.com" required="" data-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success">--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--            <div class="row">--}}
        {{--                <div class="offset-md-4 offset-lg-3 col-auto">--}}
        {{--                    <button type="submit" class="btn btn-primary-dark btn-wide transition-3d-hover">Add Review</button>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </form>--}}
        {{--        <!-- End Form -->--}}
        {{--    </div>--}}
        <div class="col-md-6">
            @foreach($ratingForProduct as $ratingVal)
                <?php
                    $point = $ratingVal->number ?? 0;
                ?>
                <div class="border-bottom border-color-1 pb-4 mb-4">
                    <!-- Review Rating -->
                    <div class="d-flex justify-content-between align-items-center text-secondary font-size-1 mb-2">
                        @include('userPage.pages.category.ratingItem', compact('point', 'show'))
                    </div>
                    <!-- End Review Rating -->

                    <p class="text-gray-90">{{$ratingVal->content ?? ""}}</p>

                    <!-- Reviewer -->
                    <div class="mb-2">
                        <strong>{{$ratingVal->user->name ?? ""}}</strong>
                        <span class="font-size-13 text-gray-23">- {{date_format($ratingVal->updated_at ?? new Date(),"F d, Y")}}</span>
                    </div>
                    <!-- End Reviewer -->
                </div>
            @endforeach
        </div>
    </div>
@endif




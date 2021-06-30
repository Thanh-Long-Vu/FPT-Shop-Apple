@if (!empty($slider))
@foreach ($slider as $item)
<div class="js-slide">
    <div class="row pt-7 py-md-0">
        <div class="d-none d-wd-block offset-1"></div>
        <div class="col-xl col col-md-6 mt-md-8 mt-lg-10">
            <div class="ml-xl-4">
                <h6 class="font-size-15 font-weight-bold mb-2 text-cyan"
                    data-scs-animation-in="fadeInUp">
                    SHOP TO GET WHAT YOU LOVE
                </h6>
                <h1 class="font-size-46 text-lh-50 font-weight-light mb-8"
                    data-scs-animation-in="fadeInUp" data-scs-animation-delay="200">
                    TIMEPIECES THAT MAKE A STATEMENT UP TO <stong class="font-weight-bold">40% OFF
                    </stong>
                </h1>
            </div>
        </div>
        <div class="col-xl-7 col-6 d-flex align-items-end ml-auto ml-md-0"
            data-scs-animation-in="fadeInRight" data-scs-animation-delay="500">
            <img class="img-fluid ml-auto mr-10 mr-wd-auto" width="468" height="417" src="../{{$item->image_url}}"
                alt="Image Description">
        </div>
    </div>
</div>
@endforeach
@endif
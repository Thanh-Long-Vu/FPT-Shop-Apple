<div id="sliderSyncingNav" class="js-slick-carousel u-slick mb-2"
     data-infinite="true"
     data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle"
     data-arrow-left-classes="fas fa-arrow-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-lg-2 ml-xl-4"
     data-arrow-right-classes="fas fa-arrow-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-lg-2 mr-xl-4"
     data-nav-for="#sliderSyncingThumb">
    @if (!empty($product->imageProduct))
    @foreach ($product->imageProduct as $item)
    <div class="js-slide">
        <img class="img-fluid" src="../{{$item->img_url}}" alt="Image Description">
    </div>
    @endforeach
    @else
    <div class="js-slide">
        <img class="img-fluid" src="assets/img/720X660/img1.jpg" alt="Image Description">
    </div>
    <div class="js-slide">
        <img class="img-fluid" src="assets/img/720X660/img2.jpg" alt="Image Description">
    </div>
    <div class="js-slide">
        <img class="img-fluid" src="assets/img/720X660/img3.jpg" alt="Image Description">
    </div>
    <div class="js-slide">
        <img class="img-fluid" src="assets/img/720X660/img4.jpg" alt="Image Description">
    </div>
    <div class="js-slide">
        <img class="img-fluid" src="assets/img/720X660/img5.jpg" alt="Image Description">
    </div>
    @endif
</div>
<div id="sliderSyncingThumb" class="js-slick-carousel u-slick u-slick--slider-syncing u-slick--slider-syncing-size u-slick--gutters-1 u-slick--transform-off"
     data-infinite="true"
     data-slides-show="5"
     data-is-thumbs="true"
     data-nav-for="#sliderSyncingNav">
     @if (!empty($product->imageProduct ?? 0))
     @foreach ($product->imageProduct as $item)
    <div class="js-slide" style="cursor: pointer;">
        <img class="img-fluid" src="../{{$item->img_url}}" alt="Image Description">
    </div>
    @endforeach
    @else 
    <div class="js-slide" style="cursor: pointer;">
        <img class="img-fluid" src="assets/img/720X660/img1.jpg" alt="Image Description">
    </div>
    <div class="js-slide" style="cursor: pointer;">
        <img class="img-fluid" src="assets/img/720X660/img2.jpg" alt="Image Description">
    </div>
    <div class="js-slide" style="cursor: pointer;">
        <img class="img-fluid" src="assets/img/720X660/img3.jpg" alt="Image Description">
    </div>
    <div class="js-slide" style="cursor: pointer;">
        <img class="img-fluid" src="assets/img/720X660/img4.jpg" alt="Image Description">
    </div>
    <div class="js-slide" style="cursor: pointer;">
        <img class="img-fluid" src="assets/img/720X660/img5.jpg" alt="Image Description">
    </div>
    @endif
</div>


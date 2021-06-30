<div class="d-none d-xl-block bg-primary">
    <div class="container" style="display: flex;
    justify-content: center;
    align-items: center;">
        <div class="min-height-45">
            <!-- Nav -->
            <nav class="js-mega-menu navbar navbar-expand-md u-header__navbar u-header__navbar--wide u-header__navbar--no-space">
                <!-- Navigation -->
                <div id="navBar" class="collapse navbar-collapse u-header__navbar-collapse">
                    <ul class="navbar-nav u-header__navbar-nav">
                        <!-- Home -->
                        @if(!empty($categories))
                        @foreach ($categories as $category)
                        <li class="nav-item hs-has-mega-menu u-header__nav-item"
                            data-event="hover"
                            data-animation-in="slideInUp"
                            data-animation-out="fadeOut"
                            data-position="left">
                            <a id="homeMegaMenu" class="nav-link u-header__nav-link" href="{{ route('categories.show', ['category'=> $category->id_category]) }}" aria-haspopup="true" aria-expanded="false">{{ $category->name }}</a>
                        </li>
                        @endforeach
                        @endif
                        <li class="nav-item hs-has-mega-menu u-header__nav-item"
                            data-event="hover"
                            data-animation-in="slideInUp"
                            data-animation-out="fadeOut"
                            data-position="left">
                            <a id="homeMegaMenu" class="nav-link u-header__nav-link" href="{{ route('blog.user') }}" aria-haspopup="true" aria-expanded="false">Blog</a>
                        </li>
                        <!-- End Home -->
                    </ul>
                </div>
                <!-- End Navigation -->
            </nav>
            <!-- End Nav -->
        </div>
    </div>
</div>

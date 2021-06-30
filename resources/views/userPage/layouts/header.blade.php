<header id="header" class="u-header u-header-left-aligned-nav">
    <div class="u-header__section">
        <!-- Topbar -->
        @include('userPage.layouts.top-bar')
        <!-- End Topbar -->

        <!-- Logo-Search-header-icons -->
        @include('userPage.layouts.search')
        <!-- End Logo-Search-header-icons -->
        @if(session('message_checkout'))

        <div class="d-none d-xl-block bg-primary">
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{session('message_checkout')}}
                    </strong>
                  </div>
        </div>
        @endif

        @if(session('error'))

        <div class="d-none d-xl-block bg-primary">
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{session('error')}}
                    </strong>
                  </div>
        </div>
        @endif

        <!-- Primary-menu-wide -->
        @include('userPage.layouts.menu')
        <!-- End Primary-menu-wide -->
    </div>
</header>

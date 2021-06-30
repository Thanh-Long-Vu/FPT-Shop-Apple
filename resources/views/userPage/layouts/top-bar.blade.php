<div class="u-header-topbar py-2 d-none d-xl-block">
    <div class="container">
        <div class="d-flex align-items-center">
            <div class="topbar-left">
                <a href="{{route('home')}}" class="text-gray-110 font-size-13 u-header-topbar__nav-link">Welcome to Worldwide Apple Store</a>
            </div>
            <div class="topbar-right ml-auto">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                        <a  class="u-header-topbar__nav-link"><i class="ec ec-map-pointer mr-1"></i> Store Locator</a>
                    </li>
                    <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                    <a href="{{route('track_your_order')}}" class="u-header-topbar__nav-link"><i class="ec ec-transport mr-1"></i> Track Your Order</a>
                    </li>
                    {{-- <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border u-header-topbar__nav-item-no-border u-header-topbar__nav-item-border-single">
                        <div class="d-flex align-items-center">
                            <!-- Language -->
                            <div class="position-relative">
                                <a id="languageDropdownInvoker" class="dropdown-nav-link dropdown-toggle d-flex align-items-center u-header-topbar__nav-link font-weight-normal" href="javascript:;" role="button"
                                   aria-controls="languageDropdown"
                                   aria-haspopup="true"
                                   aria-expanded="false"
                                   data-unfold-event="hover"
                                   data-unfold-target="#languageDropdown"
                                   data-unfold-type="css-animation"
                                   data-unfold-duration="300"
                                   data-unfold-delay="300"
                                   data-unfold-hide-on-scroll="true"
                                   data-unfold-animation-in="slideInUp"
                                   data-unfold-animation-out="fadeOut">
                                    <span class="d-inline-block d-sm-none">US</span>
                                    <span class="d-none d-sm-inline-flex align-items-center"><i class="ec ec-dollar mr-1"></i> Dollar (US)</span>
                                </a>

                                <div id="languageDropdown" class="dropdown-menu dropdown-unfold" aria-labelledby="languageDropdownInvoker">
                                    <a class="dropdown-item active" href="#">English</a>
                                    <a class="dropdown-item" href="#">Deutsch</a>
                                    <a class="dropdown-item" href="#">Español‎</a>
                                </div>
                            </div>
                            <!-- End Language -->
                        </div>
                    </li> --}}
                    <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                        <!-- Account Sidebar Toggle Button -->
                        @if(Auth::check())
                            <?php
                                $name = explode(' ', Auth::user()->name);
                                $last_name = array_pop($name);
                            ?>
                            <a href="javascript:" role="button" title="{{Auth::user()->name}}" class="u-header-topbar__nav-link" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ec ec-user mr-1"></i> Welcome ! {{$last_name}}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{route('myAccount',['id' => Auth::user()->id_user])}}">Profile</a>
                                <a class="dropdown-item" href="{{route('myAccount',['id' => Auth::user()->id_user])}}">My Transaction</a>
                                <a class="dropdown-item"
                                   onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();"
                                >{{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        @else
                        <a id="sidebarNavToggler" href="javascript:;" role="button" class="u-header-topbar__nav-link"
                           aria-controls="sidebarContent"
                           aria-haspopup="true"
                           aria-expanded="false"
                           data-unfold-event="click"
                           data-unfold-hide-on-scroll="false"
                           data-unfold-target="#sidebarContent"
                           data-unfold-type="css-animation"
                           data-unfold-animation-in="fadeInRight"
                           data-unfold-animation-out="fadeOutRight"
                           data-unfold-duration="500">
                            <i class="ec ec-user mr-1"></i> Register <span class="text-gray-50">or</span> Sign in
                        </a>
                        @endif
                        <!-- End Account Sidebar Toggle Button -->
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

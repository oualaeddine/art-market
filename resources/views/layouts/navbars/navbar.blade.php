<nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">
        <div class="navbar-logo">
            <a href="{{route('admin.home')}}">

                <img class="img-fluid" src="/fav-icon.png" alt="Theme-Logo" width="50"  height="50" />
            </a>
            <a class="mobile-menu" id="mobile-collapse" href="#!">
              <i class="feather icon-menu"></i>
            </a>
            <a class="mobile-options waves-effect waves-light">
                <i class="feather icon-more-horizontal"></i>
            </a>
        </div>
        <div class="navbar-container container-fluid">
            <ul class="nav-left">
{{--                  <li class="header-search">--}}
{{--                      <div class="">--}}
{{--                          <a href="{{ url()->previous() }}" class="btn btn-danger text-white rounded-lg">retour</a>--}}
{{--                      </div>--}}
{{--                  </li>--}}
              {{--   <li class="header-search">
                    <div class="main-search morphsearch-search">
                        <div class="input-group">
                            <span class="input-group-text search-close">
                            <i class="feather icon-x input-group-text"></i>
                        </span>
                            <input type="text" class="form-control" placeholder="Enter Keyword">
                            <span class="input-group-text search-btn">
                            <i class="feather icon-search input-group-text"></i>
                        </span>
                        </div>
                    </div>
                </li> --}}
              {{--   <li>
                    <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                    <i class="full-screen feather icon-maximize"></i>
                </a>
                </li> --}}
            </ul>
            <ul class="nav-right">

               {{--  <li class="header-notification">
                    <div class="dropdown-primary dropdown">
                        <div class="displayChatbox dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="feather icon-message-square"></i>
                            <span class="badge bg-c-green">3</span>
                        </div>
                    </div>
                </li> --}}
                <li class="user-profile header-notification">

                    <div class="dropdown-primary dropdown">
                        <div class="dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="/admin.png" class="img-radius" alt="User-Profile-Image">

                             <span>{{auth()->guard('vendor')->check()?auth()->guard('vendor')->user()->email:auth()->user()->email}}</span>
                            <i class="feather icon-chevron-down"></i>
                        </div>
                        <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            @auth('vendor')
                                <li>
                                    <a href="{{route('vendor.user.profile')}}">
                                        <i class="feather icon-user"></i> Profil
                                    </a>
                                </li>
                            @endauth
                         {{--    <li>
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modals-edit-profile">
                                <i class="feather icon-user"></i> Profil
                            </a>
                            </li> --}}
                           {{--  <li>
                                <a href="#!">
                                <i class="feather icon-settings"></i> Settings

                            </a>
                            </li>
                            <li>
                                <a href="#">
                                <i class="feather icon-user"></i> Profile

                            </a>
                            </li>
                            <li>
                                <a href="email-inbox.html">
                                <i class="feather icon-mail"></i> My Messages

                            </a>
                            </li>
                            <li>
                                <a href="auth-lock-screen.html">
                                <i class="feather icon-lock"></i> Lock Screen

                            </a>
                            </li> --}}
                            <li>
                                {{-- <a href="{{route('logout')}}"> --}}
                                    <form action="{{route('logout')}}" method="POST" id="logout-form">
                                        @csrf

                                        <a type="javascript:void(0);" onclick="document.getElementById('logout-form').submit();">
                                            <i class="feather icon-log-out"></i> Se déconnecter
                                            {{--  </a> --}}
                                        </a>
                                    </form>
                                        </li>



                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

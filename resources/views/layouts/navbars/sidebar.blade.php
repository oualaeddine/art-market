<nav class="pcoded-navbar">
    <div class="nav-list">
        <div class="pcoded-inner-navbar main-menu">
            <div class="pcoded-navigation-label">Navigation  </div>
            <ul class="pcoded-item pcoded-left-item">
                @if(isset($menuData[0]))
{{--                    @dump(auth()->user()->roles->first(),auth()->user()->roles->first()->permissions->pluck('name'))--}}
                    @foreach($menuData[0]->menu as $menu)

                         @if(isset($menu->permission) || isset($menu->submenu))

                            @if(!isset($menu->submenu))
                                @can($menu->permission)
                                <li class="{{ in_array(Route::currentRouteName(), $menu->slug) ? 'active' : '' }} {{-- {{ $custom_classes }} --}}">
                                    <a href="{{isset($menu->url)? url($menu->url):'javascript:void(0)'}}"
                                       class="waves-effect waves-dark"
                                       target="{{isset($menu->newTab) ? '_blank':'_self'}}">
                                <span class="pcoded-micon">
                                    <i class="feather {{ $menu->icon }}"></i>
                                </span>
                                        <span class="pcoded-mtext">{{ __($menu->name) }}</span>
                                    </a>
                                </li>
                                 @endcan
                            @else
                                @include('layouts.navbars.submenu', ['menu' => $menu])
                            @endif

                         @endif
                    @endforeach

                @endif

            </ul>
        </div>
    </div>
</nav>


{{-- For submenu --}}
{{-- <ul class="menu-content">
    @if(isset($menu))
        @foreach($menu as $submenu)
            <li class="{{ $submenu->slug === Route::currentRouteName() ? 'active' : '' }}">
                <a href="{{isset($submenu->url) ? url($submenu->url):'javascript:void(0)'}}"
                   class="d-flex align-items-center"
                   target="{{isset($submenu->newTab) && $submenu->newTab === true  ? '_blank':'_self'}}">
                    @if(isset($submenu->icon))
                        <i data-feather="{{$submenu->icon}}"></i>
                    @endif
                    <span class="menu-item">{{ __('locale.'.$submenu->name) }}</span>
                </a>
                @if (isset($submenu->submenu))
                    @include('panels/submenu', ['menu' => $submenu->submenu])
                @endif
            </li>
        @endforeach
    @endif
</ul>
 --}}
@if(isset($menu))
    @canany(array_column($menu->submenu,'permission'))

        <li class="pcoded-hasmenu {{ in_array(\Illuminate\Support\Facades\Route::currentRouteName(), $menu->slug) || (\Illuminate\Support\Str::contains(\Illuminate\Support\Facades\Route::currentRouteName(),$menu->slug)) ? 'active pcoded-trigger' : '' }}">
            <a href="javascript:void(0)" class="waves-effect waves-dark">
        <span class="pcoded-micon">
            <i class="feather {{ $menu->icon }}"></i>
        </span>
                <span class="pcoded-mtext">{{$menu->name}}</span>
            </a>
            <ul class="pcoded-submenu">

                @foreach($menu->submenu as $submenu)
                    @can($submenu->permission)
                        @if(!isset($submenu->submenu))
                            <li class="{{ in_array(Route::currentRouteName(), $submenu->slug) || (\Illuminate\Support\Str::contains(Route::currentRouteName(),$submenu->slug)) ? 'active' : '' }} {{-- {{ $custom_classes }} --}}">

                                <a href="{{isset($submenu->url) ? url($submenu->url):'javascript:void(0)'}}"
                                   class="waves-effect waves-dark">
                                    <span class="pcoded-mtext">{{$submenu->name}}</span>
                                </a>
                            </li>

                        @else

                            @include('layouts.navbars.submenu', ['menu' => $submenu])

                        @endif
                    @endcan
                @endforeach

            </ul>
        </li>
    @endcanany
@endif

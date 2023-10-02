<?php
$dataUser = Auth::user();
$menus = [
    'dashboard'       => [
        'url'        => route("vendor.dashboard"),
        'title'      => __("Dashboard"),
        'icon'       => 'fa fa-home',
        'permission' => 'dashboard_agent_access',
        'position'   => 10
],
    "wishlist"=>[
        'url'   => route("user.wishList.index"),
        'title' => __("Wishlist"),
        'icon'  => 'fa fa-heart-o',
        'position' => 21
    ],
    'profile'         => [
        'url'      => route("user.profile.index"),
        'title'    => __("My Profile"),
        'icon'     => 'fa fa-cogs',
        'position' => 22
    ],
    'password'        => [
        'url'      => route("user.change_password"),
        'title'    => __("Change password"),
        'icon'     => 'fa fa-lock',
        'position' => 100
    ],
    'admin'           => [
        'url'        => 'admin',
        'title'      => __("Admin Dashboard"),
        'icon'       => 'icon ion-ios-ribbon',
        'permission' => 'dashboard_access',
        'position'   => 110
    ],

];

// Modules
$custom_modules = \Modules\ServiceProvider::getActivatedModules();
if(!empty($custom_modules)){
    foreach($custom_modules as $module=>$moduleData){
        $moduleClass = $moduleData['class'];
        if(class_exists($moduleClass))
        {
            $menuConfig = call_user_func([$moduleClass,'getUserMenu']);
            if(!empty($menuConfig)){
                $menus = array_merge($menus,$menuConfig);
            }
            $menuSubMenu = call_user_func([$moduleClass,'getUserSubMenu']);
            if(!empty($menuSubMenu)){
                foreach($menuSubMenu as $k=>$submenu){
                    $submenu['id'] = $submenu['id'] ?? '_'.$k;
                    if(!empty($submenu['parent']) and isset($menus[$submenu['parent']])){
                        $menus[$submenu['parent']]['children'][$submenu['id']] = $submenu;
                        $menus[$submenu['parent']]['children'] = array_values(\Illuminate\Support\Arr::sort($menus[$submenu['parent']]['children'], function ($value) {
                            return $value['position'] ?? 100;
                        }));
                    }
                }
            }
        }
    }
}

// Custom Menu
$custom_modules = \Custom\ServiceProvider::getModules();
if(!empty($custom_modules)){
    foreach($custom_modules as $module){
        $moduleClass = "\\Custom\\".ucfirst($module)."\\ModuleProvider";
        if(class_exists($moduleClass))
        {
            $menuConfig = call_user_func([$moduleClass,'getUserMenu']);
            if(!empty($menuConfig)){
                $menus = array_merge($menus,$menuConfig);
            }
            $menuSubMenu = call_user_func([$moduleClass,'getUserSubMenu']);
            if(!empty($menuSubMenu)){
                foreach($menuSubMenu as $k=>$submenu){
                    $submenu['id'] = $submenu['id'] ?? '_'.$k;
                    if(!empty($submenu['parent']) and isset($menus[$submenu['parent']])){
                        $menus[$submenu['parent']]['children'][$submenu['id']] = $submenu;
                        $menus[$submenu['parent']]['children'] = array_values(\Illuminate\Support\Arr::sort($menus[$submenu['parent']]['children'], function ($value) {
                            return $value['position'] ?? 100;
                        }));
                    }
                }
            }
        }
    }
}
// Plugins Menu
$plugins_modules = \Plugins\ServiceProvider::getModules();

if(!empty($plugins_modules)){
    foreach($plugins_modules as $module){
        $moduleClass = "\\Plugins\\".ucfirst($module)."\\ModuleProvider";
        if(class_exists($moduleClass))
        {
            $menuConfig = call_user_func([$moduleClass,'getUserMenu']);
            if(!empty($menuConfig)){
                $menus = array_merge($menus,$menuConfig);
            }
            $menuSubMenu = call_user_func([$moduleClass,'getUserSubMenu']);
            if(!empty($menuSubMenu)){
                foreach($menuSubMenu as $k=>$submenu){
                    $submenu['id'] = $submenu['id'] ?? '_'.$k;
                    if(!empty($submenu['parent']) and isset($menus[$submenu['parent']])){
                        $menus[$submenu['parent']]['children'][$submenu['id']] = $submenu;
                        $menus[$submenu['parent']]['children'] = array_values(\Illuminate\Support\Arr::sort($menus[$submenu['parent']]['children'], function ($value) {
                            return $value['position'] ?? 100;
                        }));
                    }
                }
            }
        }
    }
}

$currentUrl = url(Illuminate\Support\Facades\Route::current()->uri());
if (!empty($menus))
    $menus = array_values(\Illuminate\Support\Arr::sort($menus, function ($value) {
        return $value['position'] ?? 100;
    }));
    foreach ($menus as $k => $menuItem) {
        if (!empty($menuItem['permission']) and !Auth::user()->hasPermission($menuItem['permission'])) {
            unset($menus[$k]);
            continue;
        }
        $menus[$k]['class'] = $currentUrl == url($menuItem['url']) ? 'treeview active' : 'treeview';
        if (!empty($menuItem['children'])) {
            $menus[$k]['class'] .= ' has-children';
            foreach ($menuItem['children'] as $k2 => $menuItem2) {
                if (!empty($menuItem2['permission']) and !Auth::user()->hasPermission($menuItem2['permission'])) {
                    unset($menus[$k]['children'][$k2]);
                    continue;
                }
                $menus[$k]['children'][$k2]['class'] = $currentUrl == url($menuItem2['url']) ? 'active active_child' : '';
            }
        }
    }
?>
        <ul class="sidebar-menu">
            <li class="header"><img src="{{asset('themes/findhouse')}}/images/header-logo2.png" alt="header-logo2.png"> {{__("FindHouse")}}</li>
            @foreach($menus as $menuItem)
                <li class="{{$menuItem['class']}}">
                    <a href="{{ url($menuItem['url']) }}">
                        @if(!empty($menuItem['icon']))
                            <span class="icon text-center"><i class="{{$menuItem['icon']}}"></i></span>
                        @endif
                        {!! clean($menuItem['title']) !!}

                    </a>
                    @if(!empty($menuItem['children']))
                        {{-- <i class="caret"></i> --}}
                        {{-- <i class="fa fa-angle-down pull-right"></i> --}}
                    @endif
                    @if(!empty($menuItem['children']))
                        <ul class="treeview-menu">
                            @foreach($menuItem['children'] as $menuItem2)
                                <li class="{{$menuItem2['class']}}"><a href="{{ url($menuItem2['url']) }}">
                                        @if(!empty($menuItem2['icon']))
                                            <i class="{{$menuItem2['icon']}}"></i>
                                        @endif
                                        {!! clean($menuItem2['title']) !!}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach

            <li class="logout">
                <form id="logout-form-vendor" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form-vendor').submit();">
                    <span class="icon text-center"><i class="flaticon-logout"></i></span> {{__("Log Out")}}
                </a>
            </li>
            <li class="logout">
                <a href="{{url('/')}}" style="color: #1ABC9C"><span class="icon text-center"><i class="fa fa-long-arrow-left"></i></span> {{__("Back to Homepage")}}</a>
            </li>
        </ul>

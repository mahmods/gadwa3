<div class="page-sidebar-wrapper">
    <!-- END SIDEBAR -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <?php $menus=\App\Repositories\RolesRepository::getAllSidebarMenus(); ?>
            @foreach($menus as $i=>$menu)
            <li class="nav-item">
                <a href="@if($menu->name!='home')javascript:;@else{{route('getBackendHome')}}@endif" class="nav-link nav-toggle">
                    <i class="{{($menu->icon)? $menu->icon :'icon-layers' }}"></i>
                    <span class="title">{{trans('main.menu_'.$menu->name)}}</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <?php
                    $items=\App\Repositories\RolesRepository::getAllSidebarItemsByItemId($menu->menu_id);?>
                    @foreach($items as $i=>$item)
                    @if(in_array(Auth::user()->role_id, explode(',', $item->roles_access)))
                    <li class="nav-item start ">
                        <a href="{{route($item->route)}}" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">{{trans('main.menu_'.$item->name)}}</span>
                        </a>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </li>
            @endforeach

        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
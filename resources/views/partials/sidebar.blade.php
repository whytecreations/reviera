@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">



            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ route('admin.home') }}">
                    <i class="fa fa-dashboard"></i>
                    <span class="title">@lang('quickadmin.qa_dashboard')</span>
                </a>
            </li>

            @can('user_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>@lang('quickadmin.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('role_access')
                    <li>
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span>@lang('quickadmin.roles.title')</span>
                        </a>
                    </li>@endcan

                    @can('user_access')
                    <li>
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-user"></i>
                            <span>@lang('quickadmin.users.title')</span>
                        </a>
                    </li>@endcan

                </ul>
            </li>
            @endcan


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>@lang('quickadmin.flowers.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    @can('flower_category_access')
                    <li>
                        <a href="{{ route('admin.flowercategories.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('quickadmin.flowercategories.title')</span>
                        </a>
                    </li>
                    @endcan

                    @can('flower_access')
                    <li>
                        <a href="{{ route('admin.flowers.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('quickadmin.flowers.title')</span>
                        </a>
                    </li>
                    @endcan

                </ul>
            </li>



            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>@lang('quickadmin.chocolates.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    @can('chocolate_category_access')
                    <li>
                        <a href="{{ route('admin.chocolatecategories.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('quickadmin.chocolatecategories.title')</span>
                        </a>
                    </li>
                    @endcan

                    @can('chocolate_access')
                    <li>
                        <a href="{{ route('admin.chocolates.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('quickadmin.chocolates.title')</span>
                        </a>
                    </li>
                    @endcan

                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>@lang('quickadmin.shippingmethods.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('admin.shippingzones.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('quickadmin.shippingzones.title')</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.shippingmethods.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('quickadmin.shippingmethods.title')</span>
                        </a>
                    </li>

                </ul>
            </li>


            @can('order_access')
            <li>
                <a href="{{ route('admin.orders.index') }}">
                    <i class="fa fa-order"></i>
                    <span>@lang('quickadmin.orders.title')</span>
                </a>
            </li>
            @endcan



            @can('gift_access')
            <li>
                <a href="{{ route('admin.gifts.index') }}">
                    <i class="fa fa-gift"></i>
                    <span>@lang('quickadmin.gifts.title')</span>
                </a>
            </li>
            @endcan


            @can('gift_access')
            <li>
                <a href="{{ route('admin.corporates.index') }}">
                    <i class="fa fa-gift"></i>
                    <span>@lang('quickadmin.corporates.title')</span>
                </a>
            </li>
            @endcan



            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">@lang('quickadmin.qa_change_password')</span>
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.qa_logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
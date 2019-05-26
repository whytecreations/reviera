<header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/admin/home') }}" class="logo"
       style="font-size: 16px;">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">
           @lang('quickadmin.quickadmin_title')</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">
           @lang('quickadmin.quickadmin_title')</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        

        
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
 <li>
                <a target="_blank" href="{{ url('/') }}">
                    <i class="fa fa-external-link"></i>
                    <span class="title"> @lang('quickadmin.qa_visit_site')</span>
                </a>
            </li>
        </ul>
      </div>
    </nav>
</header>




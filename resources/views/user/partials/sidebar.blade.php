<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
    <li class="{{ Request::segment(1) == 'dashboard' ? 'active' : '' }} nav-item"><a class="d-flex align-items-center" href="{{route('dashboard')}}"><i class="fa fa-home"></i><span class="menu-title text-truncate" data-i18n="Dashboard">Dashboard</span></a>
    </li>
    <li class="{{ Request::segment(2) == 'users' ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('user.users.index')}}"><i class="fa fa-user"></i><span class="menu-item text-truncate" data-i18n="User">Users</span></a>
    </li>
     <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i class="fas fa-store"></i>
            <span class="menu-title text-truncate" data-i18n="Products">Products</a>
        <ul class="menu-content">
            <li><a class="d-flex align-items-center" href="{{route('user.categories.index')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Category">Category</span></a>
            </li>

        </ul>
    </li>
    <li class="navigation-header"><span data-i18n="Features">Features</span><i data-feather="more-horizontal"></i>
    </li>



    <li class=" navigation-header"><span data-i18n="Company Settings">Other Settings</span><i data-feather="more-horizontal"></i>
    </li>
    <li class="{{ Request::segment(3) == 'roles' ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('user.roles.index')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Layout Full">Role</span></a>
    </li>
</ul>

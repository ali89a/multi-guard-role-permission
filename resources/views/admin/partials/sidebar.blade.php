<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
    @can('dashboard','admin')
        <li class="{{ Request::segment(2) == 'dashboard' ? 'active' : '' }} nav-item"><a class="d-flex align-items-center"
                href="{{ route('admin.dashboard') }}"><i data-feather="home"></i><span class="menu-title text-truncate"
                    data-i18n="Home">{{ __('sidebar.dashboard') }}</span></a>
        </li>
    @endcan
    @can('plan-list')
        <li class="{{ Request::segment(2) == 'plans' ? 'active' : '' }} nav-item"><a class="d-flex align-items-center"
                href="{{ route('admin.plans.index') }}"><i data-feather="home"></i><span class="menu-title text-truncate"
                    data-i18n="Home">Plan</span></a>
        </li>
    @endcan
    @if( Gate::check('permission-list') || Gate::check('role-list')||Gate::check('admin-list'))
    <li class="{{ Request::segment(2) == 'role' ? 'has-sub sidebar-group-active open' : '' }} nav-item"><a
            class="d-flex align-items-center" href="#"><i data-feather='shield'></i><span
                class="menu-title text-truncate" data-i18n="Page Layouts">Access Control</span><span
                class="badge badge-light-danger badge-pill ml-auto mr-1">3</span></a>
        <ul class="menu-content">
            @can('permission-list')
                <li class="{{ Request::segment(2) == 'permission' ? 'active' : '' }}"><a class="d-flex align-items-center"
                        href="{{ route('admin.permission.index') }}"><i data-feather="circle"></i><span
                            class="menu-item text-truncate" data-i18n="Collapsed Menu">Permission</span></a>
                </li>
            @endcan
            @can('role-list')
            <li class="{{ Request::segment(2) == 'role' ? 'active' : '' }}"><a class="d-flex align-items-center"
                    href="{{ route('admin.role.index') }}"><i data-feather="circle"></i><span
                        class="menu-item text-truncate" data-i18n="Layout Boxed">Role</span></a>
            </li>
            @endcan
            @can('admin-list')
            <li class="{{ Request::segment(2) == 'admin' ? 'active' : '' }}"><a class="d-flex align-items-center"
                    href="{{ route('admin.admin.index') }}"><i data-feather="circle"></i><span
                        class="menu-item text-truncate" data-i18n="Without Menu">Admin</span></a>
            </li>
            @endcan
        </ul>
    </li>
    @endif
</ul>

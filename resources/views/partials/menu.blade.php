<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('setting_general_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.setting-generals.index") }}" class="nav-link {{ request()->is("admin/setting-generals") || request()->is("admin/setting-generals/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.settingGeneral.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('post_event_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.post-events.index") }}" class="nav-link {{ request()->is("admin/post-events") || request()->is("admin/post-events/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.postEvent.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('post_new_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.post-news.index") }}" class="nav-link {{ request()->is("admin/post-news") || request()->is("admin/post-news/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.postNew.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('page_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/setting-server-infos*") ? "menu-open" : "" }} {{ request()->is("admin/setting-top-ranks*") ? "menu-open" : "" }} {{ request()->is("admin/setting-chien-tiches*") ? "menu-open" : "" }} {{ request()->is("admin/setting-downloads*") ? "menu-open" : "" }} {{ request()->is("admin/setting-nap-thes*") ? "menu-open" : "" }} {{ request()->is("admin/setting-huong-dans*") ? "menu-open" : "" }} {{ request()->is("admin/setting-quy-dinhs*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.page.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('setting_home_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.setting-homes.index") }}" class="nav-link {{ request()->is("admin/setting-homes") || request()->is("admin/setting-homes/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.settingHome.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('setting_server_info_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.setting-server-infos.index") }}" class="nav-link {{ request()->is("admin/setting-server-infos") || request()->is("admin/setting-server-infos/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.settingServerInfo.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('setting_top_rank_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.setting-top-ranks.index") }}" class="nav-link {{ request()->is("admin/setting-top-ranks") || request()->is("admin/setting-top-ranks/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.settingTopRank.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('setting_chien_tich_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.setting-chien-tiches.index") }}" class="nav-link {{ request()->is("admin/setting-chien-tiches") || request()->is("admin/setting-chien-tiches/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.settingChienTich.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('setting_download_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.setting-downloads.index") }}" class="nav-link {{ request()->is("admin/setting-downloads") || request()->is("admin/setting-downloads/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.settingDownload.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('setting_nap_the_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.setting-nap-thes.index") }}" class="nav-link {{ request()->is("admin/setting-nap-thes") || request()->is("admin/setting-nap-thes/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.settingNapThe.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('setting_huong_dan_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.setting-huong-dans.index") }}" class="nav-link {{ request()->is("admin/setting-huong-dans") || request()->is("admin/setting-huong-dans/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.settingHuongDan.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('setting_quy_dinh_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.setting-quy-dinhs.index") }}" class="nav-link {{ request()->is("admin/setting-quy-dinhs") || request()->is("admin/setting-quy-dinhs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.settingQuyDinh.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                        <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

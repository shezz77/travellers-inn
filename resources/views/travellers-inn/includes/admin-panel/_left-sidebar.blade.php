<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!-- Search form -->
        <div class="clearfix" style="margin-top: 15px"></div>
        <!--- Profile -->
        <div class="profile-info">
            <div class="col-xs-4">
                <a href="" class="rounded-image profile-image"><img src="{{ \App\Utils\AuthWrapper::loggedInUser()->image ?  asset('images/users/'. \App\Utils\AuthWrapper::loggedInUser()->id .'/' . \App\Utils\AuthWrapper::loggedInUser()->image) : asset('images/default.png') }}"></a>
            </div>
            <div class="col-xs-8">
                <div class="profile-info text-white-1">Welcome <b>{{ \App\Utils\AuthWrapper::loggedInUser()->roles->first()->display_name }}</b></div>
                <div class="profile-buttons">
                    <a class="md-trigger" data-modal="logout-modal" title="Logout from Travellers-inn"><i class="fa fa-power-off text-red-1"></i></a>
                    <a href="{{ route('traveller-inn-home') }}"  title="Travellers-inn Frontend"><i class="glyphicon glyphicon-new-window text-white-1"></i></a>
                </div>
            </div>
        </div>
        <!--- Divider -->
        <div class="clearfix"></div>
        <hr class="divider" />
        <div class="clearfix"></div>
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li class='has_sub'>
                    <a href='javascript:void(0);'>
                        <i class='icon-home-3'></i>
                        <span>Dashboard</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
                    <ul>
                        <li>
                            <a href='{{ route('admin.index') }}' class="{{ Request::is('admin/home') ? 'active' : '' }}"><span>Dashboard</span></a>
                        </li>
                    </ul>
                </li>
                @can('checkPermission', [\App\Utils\AuthWrapper::loggedInUser(), 'role.index'])
                    <li class='has_sub'>
                        <a href='javascript:void(0);'><i class='icon-feather'></i>
                            <span>Roles</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
                        <ul>
                            <li><a href='{{ route('role.index') }}' class="{{ Request::is('role') ? 'active' : '' }}"><span>All Roles</span></a></li>
                        </ul>
                    </li>
                @endcan
                @can('checkPermission', [\App\Utils\AuthWrapper::loggedInUser(), 'resource.index'])
                    <li class='has_sub'>
                        <a href='javascript:void(0);'><i class='glyphicon glyphicon-wrench'></i><span>Resources</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
                        <ul>
                            <li><a href='{{ route('resource.index') }}' class="{{ Request::is('resource') ? 'active' : '' }}"><span>All System Resources</span></a></li>
                        </ul>
                    </li>
                @endcan
                @can('checkPermission', [\App\Utils\AuthWrapper::loggedInUser(), 'user.list'])
                    <li class='has_sub'>
                        <a href='javascript:void(0);'><i class='fa fa-users'></i><span>Users</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
                        <ul>
                            <li><a href="{{ route('user.list') }}" class="{{ Request::is('user/list') ? 'active' : '' }}"><span>All Users</span></a></li>
                        </ul>
                    </li>
                @endcan
                <li class='has_sub'>
                    <a href='javascript:void(0);'><i class='fa fa-pencil'></i><span>Posts</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
                    <ul>
                        @can('checkPermission', [\App\Utils\AuthWrapper::loggedInUser(), 'posts.index'])
                            <li><a href="{{ route('posts.index') }}" class="{{ Request::is('posts') ? 'active' : '' }}"><span>All Posts</span></a></li>
                        @endcan
                        @can('checkPermission', [\App\Utils\AuthWrapper::loggedInUser(), 'post.pending'])
                            <li><a href="{{ route('post.pending') }}" class="{{ Request::is('posts/pending') ? 'active' : '' }}"><span>Pending Posts</span></a></li>
                        @endcan
                        @can('checkPermission', [\App\Utils\AuthWrapper::loggedInUser(), 'reject.list'])
                            <li><a href="{{ route('reject.list') }}" class="{{ Request::is('posts/reject') ? 'active' : '' }}"><span>Rejected Posts</span></a></li>
                        @endcan
                        @can('checkPermission', [\App\Utils\AuthWrapper::loggedInUser(), 'posts.feature'])
                            <li><a href="{{ route('posts.feature') }}" class="{{ Request::is('posts/feature') ? 'active' : '' }}"><span>Featured Posts</span></a></li>
                        @endcan
                    </ul>
                </li>
                @can('checkPermission', [\App\Utils\AuthWrapper::loggedInUser(), 'slider.index'])
                    <li class='has_sub'>
                        <a href='javascript:void(0);'><i class='fa fa-sliders'></i><span>Slider</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
                        <ul>
                            <li><a href="{{ route('slider.index') }}" class="{{ Request::is('slider') ? 'active' : '' }}"><span>All Slider</span></a></li>
                        </ul>
                    </li>
                @endcan
                @can('checkPermission', [\App\Utils\AuthWrapper::loggedInUser(), 'hash-tags.index'])
                    <li class='has_sub'>
                        <a href='javascript:void(0);'><i class='fa fa-tags'></i><span>HashTags</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
                        <ul>
                            <li><a href="{{ route('hash-tags.index') }}" class="{{ Request::is('hash-tags') ? 'active' : '' }}"><span>All Hashtags</span></a></li>
                        </ul>
                    </li>
                @endcan
                @can('checkPermission', [\App\Utils\AuthWrapper::loggedInUser(), 'visitor.show'])
                    <li class='has_sub'>
                        <a href='javascript:void(0);'><i class='fa fa-map-marker'></i><span>User IP Address</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
                        <ul>
                            <li><a href="{{ route('visitor.show') }}" class="{{ Request::is('visitor/index') ? 'active' : '' }}"><span>All User IP Address</span></a></li>
                        </ul>
                    </li>
                @endcan
                @can('checkPermission', [\App\Utils\AuthWrapper::loggedInUser(), 'category.index'])
                    <li class='has_sub'>
                        <a href='javascript:void(0);'><i class='fa fa-list'></i><span>Category Management</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
                        <ul>
                            <li><a href='{{ route('category.index') }}' class="{{ Request::is('category') ? 'active' : '' }}"><span>All Categories</span></a></li>
                        </ul>
                    </li>
                @endcan
            </ul>
            <div class="clearfix"></div>
        </div>
        <br><br><br>
    </div>
</div>
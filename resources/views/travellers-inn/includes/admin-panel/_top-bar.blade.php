<!-- Top Bar Start -->
<div class="topbar">
    <div class="topbar-left">
        <div class="logo" style="text-align: center">
            <a class="logo" href="{{ route('admin.index') }}" style="color: #fff;font-size: 24px;display: block;padding: 8px 0 0 0;font-weight: bold">Travellers Inn</a>
        </div>
        <button class="button-menu-mobile open-left">
            <i class="fa fa-bars"></i>
        </button>
    </div>
    <ul class="nav navbar-nav navbar-right top-navbar">
        @if (Auth::check())
            <li class="dropdown iconify hide-phone"><a href="#" onclick="javascript:toggle_fullscreen()"><i class="icon-resize-full-2"></i></a></li>
            <li class="dropdown topbar-profile">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="rounded-image topbar-profile-image"><img src="{{ \App\Utils\AuthWrapper::loggedInUser()->image ?  asset('images/users/'. \App\Utils\AuthWrapper::loggedInUser()->id .'/' . \App\Utils\AuthWrapper::loggedInUser()->image) : asset('images/default.png') }}"></span> <strong>{{ \App\Utils\AuthWrapper::loggedInUser()->first_name }}</strong> {{ \App\Utils\AuthWrapper::loggedInUser()->last_name }} <i class="fa fa-caret-down"></i></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('admin.user.show',\App\Utils\AuthWrapper::loggedInUser()) }}">My Profile</a></li>
                    <li><a href="{{route('admin.setting')}}">Account Setting</a></li>
                    <li class="divider"></li>
                    <li><a class="md-trigger" data-modal="logout-modal"><i class="icon-logout-1"></i> Logout</a></li>
                </ul>
            </li>
        @endif
    </ul>
</div>
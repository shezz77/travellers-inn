<!-- HEADER -->
<header>
    <nav class="navbar navbar-default navbar-main navbar-fixed-top" role="navigation" id="nav">
        <div class="container">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="logo" href="{{ route('traveller-inn-home') }}">Travellers Inn</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="{{ Request::is('/') ? 'active' : '' }} dropdown singleDrop">
                        <a href="{{ route('traveller-inn-home') }}">Home</a>
                    </li>
                    <li class="{{ Request::is('') ? 'active' : '' }} dropdown singleDrop">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Destinations</a>
                        <ul class="dropdown-menu dropdown-menu-left continent">
                            @foreach(\App\Utils\CategoryWrapper::destinations() as $category)
                                <li class="dropdown dropdown-submenu" >
                                    <a href="{{ route('destination',  $category->id ) }}">{{ $category->title}} <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-right" style=" height:300px;overflow-y: auto ;overflow-x: hidden;">
                                        @foreach($category->getImmediateDescendants() as $child)
                                            <li class="dropdown-submenu country-des">
                                                <a href="{{ route('destination' ,  $child->id ) }}" class="navigation">{{ $child->title}}  <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                                                <ul class="dropdown-menu dropdown-menu-left navigation-des cities" style=" position:relative;left:0;top: 0px">
                                                    @foreach($child->getImmediateDescendants() as $grandChild)
                                                        <li class=" ">
                                                            <a href="{{ route('destination',  $grandChild->id  ) }}">{{ $grandChild->title}}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                      @endforeach
                        </ul>
                    </li>
                    <li class="{{ Request::is('contact-us') ? 'active' : '' }} dropdown singleDrop">
                        <a href="{{ route('contact-us') }}">Contact Us</a>
                    </li>
                    @if (\App\Utils\AuthWrapper::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"
                           style="font-size: 20px">
                            <?php $var = '0'; ?>
                            @foreach(\App\Utils\AuthWrapper::loggedInUser()->notifications as $notification)
                                @if($notification->pivot->status)
                                        <?php $var += 1 ; ?>
                                @endif
                            @endforeach
                            <span class="glyphicon glyphicon-globe" style="color:#000 ; margin: -4px -16px 0 0;"></span><span class="badge badge-notify">{{$var}}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-message" style="width: 250px;">
                            <li class="">
                            @foreach(\App\Utils\AuthWrapper::loggedInUser()->notifications as $notification)
                                @if($notification->pivot->status)
                                    <a id="notification" href="{{route('notification.view', $notification->id)}}"
                                       style="padding: 5px 0 7px 5px;font-size: 13px; color:#969696;" class="notification">
                                        <img src="{{ asset('images/users/'. $notification->user->id .'/' .$notification->user->image ) }}"
                                             name="aboutme" width="30" height="30" class="img-circle">
                                        <strong style="margin: 0 0 0 10px;text-transform: capitalize;color:#969696">{{$notification->user->user_name}}</strong>
                                        <span style="color:#969696">Create a Post</span>
                                        <div class="notifiy" style="color:#969696">{{ $notification->created_at->diffForHumans() }}</div>
{{--                                        <br>{!! substr($notification->post_title, 0, 20)!!}{{ strlen($notification->post_title) > 30 ? '......' : ''}}--}}
                                    </a>
                                @endif
                            @endforeach

                        </ul>

                    </li>
                    @endif
                    @if (\App\Utils\AuthWrapper::check())
                        <li class=" dropdown singleDrop">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="float: left;">{{ \App\Utils\AuthWrapper::loggedInUser()->user_name }}</a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="{{ route('user.profile', \App\Utils\AuthWrapper::loggedInUser()->id) }}" ><i class="fa fa-user" style="margin: 0 6px 0 3px;"></i> Profile</a></li>
                                <li><a href="{{ route('diary.index') }}" ><i class="fa fa-book" style="margin: 0 6px 0 3px;"></i>Diary</a></li>
                                <li><a href="{{ route('posts.create') }}"><i class="fa fa-twitch" style="margin: 0 6px 0 3px;"></i>Create Post</a></li>
                                <li><a href="{{ route('setting-page') }}"><i class="fa fa-cog" aria-hidden="true" style="margin: 0 6px 0 3px;"></i>Setting</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out" style="margin: 0 6px 0 3px"></i>Logout</a></li>
                            </ul>
                        </li>
                        <a href="{{ route('user.profile', \App\Utils\AuthWrapper::loggedInUser()->id) }}" style="margin:0;padding:0;float: left;border:none"><img src="{{ \App\Utils\AuthWrapper::loggedInUser()->image ?  asset('images/users/'. \App\Utils\AuthWrapper::loggedInUser()->id .'/' . \App\Utils\AuthWrapper::loggedInUser()->image) : asset('images/default.png') }}" name="aboutme" width="30" height="30" class="img-circle" style=" margin: 36px 0 0 10px;float: left;"></a>
                    @else
                        <li class="{{ Request::is('register') ? 'active' : '' }} dropdown singleDrop">
                            <a href="{{ route('register') }}">Register</a>
                        </li>
                        <li class="{{ Request::is('login') ? 'active' : '' }} dropdown singleDrop">
                            {{--<a href="{{ route('login') }}">Login</a>--}}
                            <a id='modal-launcher' class="" data-toggle="modal" data-target="#login-modal">Login</a>
                        </li>

                    @endif

                    <li class="dropdown searchBox">
                        <a href="{{  route('search-page')  }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="searchIcon"><i class="fa fa-search" aria-hidden="true"></i></span></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            {{ Form::open(['route' => ['search'], 'method' => 'POST',]) }}
                            <li>

                                <span class="input-group">
                                <input type="text" class="form-control" placeholder="Search..." aria-describedby="basic-addon2" name="search">

                                    <span class="input-group-addon" id="basic-addon2">Search</span>
                                 </span>

                            </li>
                            {{ Form::close() }}
                        </ul>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
</header>
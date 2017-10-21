<!-- FOOTER -->
{{--@include('laravel-feed::feed-links')--}}
<footer>
    <div class="footer clearfix">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-xs-12">
                    <div class="footerContent">
                        <div class="explore">Explore Travellers Inn</div>
                        <ul class="menu">
                            <li class="menu__item is-expanded first expanded"><a href="{{route('content-post', 2)}}" title="" class="menu__link">Travel tips</a><ul class="menu1"><li class="menu__item1 is-leaf first last leaf"><a href="{{ url('feed/tips') }}" title="" class="menu__link"><img src="{{asset('assets/img/icons/rss_icon_black.png')}}" alt="slidebg1" data-bgrepeat="no-repeat" width="15px" height="15px"></a></li>
                                </ul>
                            </li>
                            <li class="menu__item is-expanded expanded"><a href="{{route('content-post', 3)}}" title="" class="menu__link">Travel photos</a><ul class="menu1"><li class="menu__item1 is-leaf first last leaf"><a href="{{ url('feed/images') }}" title="" class="menu__link"><img src="{{asset('assets/img/icons/rss_icon_black.png')}}" alt="slidebg1" data-bgrepeat="no-repeat" width="15px" height="15px"></a></li>
                                </ul>
                            </li>
                            <li class="menu__item is-expanded expanded"><a href="{{route('content-post', 4)}}" title="" class="menu__link">Travel videos</a><ul class="menu1"><li class="menu__item1 is-leaf first last leaf"><a href="{{ ('feed/videos') }}" title="" class="menu__link"><img src="{{asset('assets/img/icons/rss_icon_black.png')}}" alt="slidebg1" data-bgrepeat="no-repeat" width="15px" height="15px"></a></li>
                                </ul>
                            </li>
                            <li class="menu__item is-expanded expanded"><a href="{{route('content-post', 6  )}}" title="" class="menu__link">Travel ebook</a><ul class="menu1"><li class="menu__item1 is-leaf first last leaf"><a href="{{ ('feed/ebooks') }}" title="" class="menu__link"><img src="{{asset('assets/img/icons/rss_icon_black.png')}}" alt="slidebg1" data-bgrepeat="no-repeat" width="15px" height="15px""></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <div class="footerContent">
                        <h5>Contact Us</h5>
                        <p>Hi Fellow Traveller And Welcome To TravellersInn The Social Travel Platform! </p><br>
                        <ul class="list-unstyled">
                            <li><i class="fa fa-home" aria-hidden="true"></i>57 - Lawrence Road, Lawrence Road, Lahore 54000, Pakistan</li>
                            <li><i class="fa fa-phone" aria-hidden="true"></i>042 657524332</li>
                            <li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailTo:info@star-travel.com">travellersinn2017@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <div class="footerContent imgGallery">
                        <h5>Gallery</h5>
                        <div class="row">
                            <div class="col-xs-4">
                                <a class="fancybox-pop" href="{{ asset('assets/img/home/gallery/gallery-1.jpg') }}"><img src="{{ asset('assets/img/home/gallery/thumb-gallery-1.jpg') }}" alt="image"></a>
                            </div>
                            <div class="col-xs-4">
                                <a class="fancybox-pop" href="{{ asset('assets/img/home/gallery/gallery-2.jpg') }}"><img src="{{ asset('assets/img/home/gallery/thumb-gallery-2.jpg') }}" alt="image"></a>
                            </div>
                            <div class="col-xs-4">
                                <a class="fancybox-pop" href="{{ asset('assets/img/home/gallery/gallery-3.jpg') }}"><img src="{{ asset('assets/img/home/gallery/thumb-gallery-3.jpg') }}" alt="image"></a>
                            </div>
                            <div class="col-xs-4">
                                <a class="fancybox-pop" href="{{ asset('assets/img/home/gallery/gallery-4.jpg') }}"><img src="{{ asset('assets/img/home/gallery/thumb-gallery-4.jpg') }}" alt="image"></a>
                            </div>
                            <div class="col-xs-4">
                                <a class="fancybox-pop" href="{{ asset('assets/img/home/gallery/gallery-5.jpg') }}"><img src="{{ asset('assets/img/home/gallery/thumb-gallery-5.jpg') }}" alt="image"></a>
                            </div>
                            <div class="col-xs-4">
                                <a class="fancybox-pop" href="{{ asset('assets/img/home/gallery/gallery-6.jpg') }}"><img src="{{ asset('assets/img/home/gallery/thumb-gallery-6.jpg') }}" alt="image"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <div class="footerContent">
                        <h5>Social Pages</h5>
                        {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do. </p>--}}
                        {{--<div class="input-group">--}}
                            {{--<input type="text" class="form-control" placeholder="Enter your email" aria-describedby="basic-addon21">--}}
                            {{--<span class="input-group-addon" id="basic-addon21"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>--}}
                        {{--</div>--}}
                        <ul class="list-inline">
                            <li><a href="{{ route('social.login', 'facebook') }}"><i class="fa fa-facebook" aria-hidden="true" style="  font: normal normal normal 14px/2 FontAwesome;"></i></a></li>
                            <li><a href="{{ route('social.login', 'twitter') }}"><i class="fa fa-twitter" aria-hidden="true" style="  font: normal normal normal 14px/2 FontAwesome;"></i></a></li>
                            <li><a href="{{ route('social.login', 'google') }}"><i class="fa fa-google-plus" aria-hidden="true" style="  font: normal normal normal 14px/2 FontAwesome;"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true" style="  font: normal normal normal 14px/2 FontAwesome;"></i></a></li>
                            <li><a href="#"><i class="fa fa-vimeo" aria-hidden="true" style="  font: normal normal normal 14px/2 FontAwesome;"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyRight clearfix">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-push-6 col-xs-12">
                    <ul class="list-inline">
                        <li><a href="{{ route('traveller-inn-home') }}">Home</a></li>
                        <li><a href="{{ route('about-us') }}">About Us</a></li>
                        <li><a href="{{ route('contact-us') }}">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-sm-pull-6 col-xs-12">
                    <div class="copyRightText">
                        <p>Copyright © 2017. All Rights Reserved by Travellers Inn.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
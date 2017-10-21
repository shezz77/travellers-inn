
{{--@section('slider')--}}

    {{--<!-- BANNER -->--}}
    {{--<section class="bannercontainer">--}}
        {{--<div class="fullscreenbanner-container">--}}
            {{--<div class="fullscreenbanner">--}}
                {{--<ul>--}}
                    {{--@foreach($slider->posts as $post)--}}
                        {{--<li data-transition="parallaxvertical" data-slotamount="5" data-masterspeed="700" data-title="Slide 1">--}}
                            {{--@foreach($postUploadDatas = $post->postUploadedDatas as $postUploadData)--}}
                                {{--@if($post->contant_id == 2 || $post->contant_id == 3 || $post->contant_id == 6)--}}
                                {{--<img src="{{ asset('images/users/' . $post->user_id .'/posts/'. $post->id .'/'. $postUploadData->post_upload ) }}" alt="slidebg1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">--}}
                                {{--@elseif($post->contant_id == 4)--}}
                                    {{--<img src="{{ $postUploadData->post_upload }}" alt="blog-single-image">--}}
                                {{--@endif--}}
                                    {{--@endforeach--}}
                            {{--<div class="slider-caption container">--}}
                                {{--<div class="tp-caption rs-caption-1 sft start"--}}
                                     {{--data-hoffset="0"--}}
                                     {{--data-y="270"--}}
                                     {{--data-speed="800"--}}
                                     {{--data-start="1000"--}}
                                     {{--data-easing="Back.easeInOut"--}}
                                     {{--data-endspeed="300">--}}
                                    {{--{{$post->post_title}}--}}
                                    {{--<span></span>--}}
                                {{--</div>--}}
                                {{--<div class="tp-caption rs-caption-2 sft"--}}
                                     {{--data-hoffset="0"--}}
                                     {{--data-y="400"--}}
                                     {{--data-speed="1000"--}}
                                     {{--data-start="1500"--}}
                                     {{--data-easing="Power4.easeOut"--}}
                                     {{--data-endspeed="300"--}}
                                     {{--data-endeasing="Power1.easeIn"--}}
                                     {{--data-captionhidden="off">--}}
                                    {{--{!! substr($post->post_description, 0, 40)!!}{{ strlen($post->post_description) > 50 ? '......' : ''}}--}}
                                {{--</div>--}}
                                {{--<div class="tp-caption rs-caption-3 sft"--}}
                                     {{--data-hoffset="0"--}}
                                     {{--data-y="485"--}}
                                     {{--data-speed="800"--}}
                                     {{--data-start="2000"--}}
                                     {{--data-easing="Power4.easeOut"--}}
                                     {{--data-endspeed="300"--}}
                                     {{--data-endeasing="Power1.easeIn"--}}
                                     {{--data-captionhidden="off">--}}
                                    {{--<span class="page-scroll"><a target="_blank" href="{{ route('post.view', $post->id) }}" class="btn buttonCustomPrimary">View Detail</a></span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                    {{--@endforeach--}}
                    {{--<li data-transition="parallaxvertical" data-slotamount="5" data-masterspeed="1000" data-title="Slide 2">--}}
                    {{--<img src="{{asset('assets/img/home/slider/Second.jpg')}}" alt="slidebg1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">--}}
                    {{--<div class="slider-caption container">--}}
                    {{--<div class="tp-caption rs-caption-1 sft start text-center"--}}
                    {{--data-hoffset="0"--}}
                    {{--data-x="center"--}}
                    {{--data-y="270"--}}
                    {{--data-speed="800"--}}
                    {{--data-start="1000"--}}
                    {{--data-easing="Back.easeInOut"--}}
                    {{--data-endspeed="300">--}}
                    {{--Crossing The Limits--}}
                    {{--<span>Travellers Inn</span>--}}
                    {{--</div>--}}
                    {{--<div class="tp-caption rs-caption-2 sft text-center"--}}
                    {{--data-hoffset="0"--}}
                    {{--data-x="center"--}}
                    {{--data-y="400"--}}
                    {{--data-speed="1000"--}}
                    {{--data-start="1500"--}}
                    {{--data-easing="Power4.easeOut"--}}
                    {{--data-endspeed="300"--}}
                    {{--data-endeasing="Power1.easeIn"--}}
                    {{--data-captionhidden="off">--}}
                    {{--Maecenas nec sodales justo. Vivamus auctor pulvinar mattis. Ut at elementum nunc. Quisque condimentum ligula ante, non luctus enim pulvinar sed. Fusce quis congue odio.--}}
                    {{--</div>--}}
                    {{--<div class="tp-caption rs-caption-3 sft text-center"--}}
                    {{--data-hoffset="0"--}}
                    {{--data-x="center"--}}
                    {{--data-y="485"--}}
                    {{--data-speed="800"--}}
                    {{--data-start="2000"--}}
                    {{--data-easing="Power4.easeOut"--}}
                    {{--data-endspeed="300"--}}
                    {{--data-endeasing="Power1.easeIn"--}}
                    {{--data-captionhidden="off">--}}
                    {{--<span class="page-scroll"><a target="_blank" href="http://goo.gl/lXpsqr" class="btn buttonCustomPrimary">View Detail</a></span>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</li>--}}
                    {{--<li data-transition="parallaxvertical" data-slotamount="5" data-masterspeed="700" data-title="Slide 1">--}}
                    {{--<img src="{{asset('assets/img/home/slider/slider-03.jpg')}}" alt="slidebg1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">--}}
                    {{--<div class="slider-caption container">--}}
                    {{--<div class="tp-caption rs-caption-1 sft start"--}}
                    {{--data-hoffset="0"--}}
                    {{--data-y="270"--}}
                    {{--data-speed="800"--}}
                    {{--data-start="1000"--}}
                    {{--data-easing="Back.easeInOut"--}}
                    {{--data-endspeed="300">--}}
                    {{--Enjoy Ultimate Freedom--}}
                    {{--<span>During Traveling</span>--}}
                    {{--</div>--}}
                    {{--<div class="tp-caption rs-caption-2 sft"--}}
                    {{--data-hoffset="0"--}}
                    {{--data-y="400"--}}
                    {{--data-speed="1000"--}}
                    {{--data-start="1500"--}}
                    {{--data-easing="Power4.easeOut"--}}
                    {{--data-endspeed="300"--}}
                    {{--data-endeasing="Power1.easeIn"--}}
                    {{--data-captionhidden="off">--}}
                    {{--Aenean congue nisi elit, vitae viverra leo luctus et. Donec interdum erat id mi scelerisque, vitae ullamcorper lorem gravida. Nunc sed maximus ante. Nulla dictum turpis vitae vehicula auctor.--}}
                    {{--</div>--}}
                    {{--<div class="tp-caption rs-caption-3 sft"--}}
                    {{--data-hoffset="0"--}}
                    {{--data-y="485"--}}
                    {{--data-speed="800"--}}
                    {{--data-start="2000"--}}
                    {{--data-easing="Power4.easeOut"--}}
                    {{--data-endspeed="300"--}}
                    {{--data-endeasing="Power1.easeIn"--}}
                    {{--data-captionhidden="off">--}}
                    {{--<span class="page-scroll"><a target="_blank" href="http://goo.gl/lXpsqr" class="btn buttonCustomPrimary">View Details</a></span>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</li>--}}
                    {{--<li data-transition="parallaxvertical" data-slotamount="5" data-masterspeed="1000" data-title="Slide 2">--}}
                    {{--<img src="{{asset('assets/img/home/slider/fourth.jpg')}}" alt="slidebg1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">--}}
                    {{--<div class="slider-caption container">--}}
                    {{--<div class="tp-caption rs-caption-1 sft start text-center"--}}
                    {{--data-hoffset="0"--}}
                    {{--data-x="center"--}}
                    {{--data-y="270"--}}
                    {{--data-speed="800"--}}
                    {{--data-start="1000"--}}
                    {{--data-easing="Back.easeInOut"--}}
                    {{--data-endspeed="300">--}}
                    {{--Finland In Winter--}}
                    {{--<span>Join Travellers Inn</span>--}}
                    {{--</div>--}}
                    {{--<div class="tp-caption rs-caption-2 sft text-center"--}}
                    {{--data-hoffset="0"--}}
                    {{--data-x="center"--}}
                    {{--data-y="400"--}}
                    {{--data-speed="1000"--}}
                    {{--data-start="1500"--}}
                    {{--data-easing="Power4.easeOut"--}}
                    {{--data-endspeed="300"--}}
                    {{--data-endeasing="Power1.easeIn"--}}
                    {{--data-captionhidden="off">--}}
                    {{--Maecenas et leo nec nunc rutrum tempor. Mauris pharetra porttitor odio eget convallis. Praesent facilisis mattis pretium. Aliquam sagittis efficitur risus, interdum euismod urna. Pellentesque vel augue augue.--}}
                    {{--</div>--}}
                    {{--<div class="tp-caption rs-caption-3 sft text-center"--}}
                    {{--data-hoffset="0"--}}
                    {{--data-x="center"--}}
                    {{--data-y="485"--}}
                    {{--data-speed="800"--}}
                    {{--data-start="2000"--}}
                    {{--data-easing="Power4.easeOut"--}}
                    {{--data-endspeed="300"--}}
                    {{--data-endeasing="Power1.easeIn"--}}
                    {{--data-captionhidden="off">--}}
                    {{--<span class="page-scroll"><a target="_blank" href="http://goo.gl/lXpsqr" class="btn buttonCustomPrimary">View Delails</a></span>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</li>--}}

                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}

{{--@show()--}}



<section class="bannercontainer">
    <div class="fullscreenbanner-container">
        <div class="fullscreenbanner">
            <ul>
                @foreach($sliders as $slider)
                    @if(($slider->posts == null))
                        {{ $post }}
                        <li data-transition="parallaxvertical" data-slotamount="5" data-masterspeed="700" data-title="Slide 1">
                            <img src="{{ asset('assets/img/home/gallery/gallery-2.jpg') }}" alt="image">
                            <div class="slider-caption container">
                                <div class="tp-caption rs-caption-1 sft start"
                                     data-hoffset="0"
                                     data-y="270"
                                     data-speed="800"
                                     data-start="1000"
                                     data-easing="Back.easeInOut"
                                     data-endspeed="300">
                                    {{'Default Title'}}
                                    <span></span>
                                </div>
                                <div class="tp-caption rs-caption-2 sft"
                                     data-hoffset="0"
                                     data-y="400"
                                     data-speed="1000"
                                     data-start="1500"
                                     data-easing="Power4.easeOut"
                                     data-endspeed="300"
                                     data-endeasing="Power1.easeIn"
                                     data-captionhidden="off">
                                        {{'Defual Des'}}
                                </div>
                                <div class="tp-caption rs-caption-3 sft"
                                     data-hoffset="0"
                                     data-y="485"
                                     data-speed="800"
                                     data-start="2000"
                                     data-easing="Power4.easeOut"
                                     data-endspeed="300"
                                     data-endeasing="Power1.easeIn"
                                     data-captionhidden="off">
                                </div>
                            </div>
                        </li>

                        @else

                        @foreach($slider->posts as $post)
                        {{--{{ $post }}--}}
                        <li data-transition="parallaxvertical" data-slotamount="5" data-masterspeed="700" data-title="Slide 1">
                            @foreach($postUploadDatas = $post->postUploadedDatas as $postUploadData)
                                @if($post->contant_id == 2 || $post->contant_id == 3 || $post->contant_id == 6)
                                    <img src="{{ asset('images/users/' . $post->user_id .'/posts/'. $post->id .'/'. $postUploadData->post_upload ) }}" alt="slidebg1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
                                @elseif($post->contant_id == 4)
                                    <img src="{{ $postUploadData->post_upload }}" alt="blog-single-image">
                                @endif
                            @endforeach
                            <div class="slider-caption container">
                                <div class="tp-caption rs-caption-1 sft start"
                                     data-hoffset="0"
                                     data-y="270"
                                     data-speed="800"
                                     data-start="1000"
                                     data-easing="Back.easeInOut"
                                     data-endspeed="300">
                                    {{$post->post_title}}
                                    <span></span>
                                </div>
                                <div class="tp-caption rs-caption-2 sft"
                                     data-hoffset="0"
                                     data-y="400"
                                     data-speed="1000"
                                     data-start="1500"
                                     data-easing="Power4.easeOut"
                                     data-endspeed="300"
                                     data-endeasing="Power1.easeIn"
                                     data-captionhidden="off">
                                    {!! substr($post->post_description, 0, 40)!!}{{ strlen($post->post_description) > 50 ? '......' : ''}}
                                </div>
                                <div class="tp-caption rs-caption-3 sft"
                                     data-hoffset="0"
                                     data-y="485"
                                     data-speed="800"
                                     data-start="2000"
                                     data-easing="Power4.easeOut"
                                     data-endspeed="300"
                                     data-endeasing="Power1.easeIn"
                                     data-captionhidden="off">
                                    <span class="page-scroll"><a target="_blank" href="{{ route('posts.show', $post->id) }}" class="btn buttonCustomPrimary">View Detail</a></span>
                                </div>
                            </div>
                        </li>

                    @endforeach
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</section>


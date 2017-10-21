@extends('travellers-inn.layouts.frontend-main')
@section('plugin-stylesheet')
    <link href="{{ asset('css/banner.css') }}" rel="stylesheet">
@endsection
@section('title', 'Contact us - ')

@section('slider')
@endsection

@section('page-title-div-text' , 'Contact Travellers Inn')
@include('travellers-inn.includes.frontend._page-title')
@section('content')
    <!-- WHITE SECTION-->
    <section class="mainContentSection">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-xs-12">
                    <div class="contactInfo">
                        <h2>get in touch</h2>
                        <p>Hi Fellow Traveller And Welcome To TravellersInn  The Social Travel Platform !</p>
                        <div class="media">
                            <a class="media-left" href="#">
                                <i class="fa fa-map-marker" aria-hidden="true" style="  font: normal normal normal 25px/3 FontAwesome"></i>
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">address</h4>
                                <p>57 - Lawrence Road, Lawrence Road, Lahore 54000, Pakistan</p>
                            </div>
                        </div>
                        <div class="media">
                            <a class="media-left" href="#">
                                <i class="fa fa-phone" aria-hidden="true" style="  font: normal normal normal 25px/3 FontAwesome"></i>
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Phone number</h4>
                                <p>042 657524332</p>
                            </div>
                        </div>
                        <div class="media">
                            <a class="media-left" href="#">
                                <i class="fa fa-envelope" aria-hidden="true" style="  font: normal normal normal 24px/3 FontAwesome"></i>
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">email us</h4>
                                <p><a href="mailTo:travellersinn2017@gmail.com">info@travellersinn.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 col-xs-12">
                    <div class="contactForm">
                        <form action="{{ route('contact-us') }}" method="POST" id="contact-form" role="form" class="form">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="email" name="contact_email"  class="form-control" id="" placeholder="Your Email" style="color: #000;" minlength="5" maxlength="255" data-parsley-errors-container="#email-error" required>
                            </div>
                            <p id="email-error" style="color: #B94A48; margin-top: 10px; margin-bottom: 10px"></p>
                            <div class="form-group">
                                <input type="text" name="contact_subject" class="form-control" id="" placeholder="Your Subject" style="color: #000;" minlength="5" maxlength="255" data-parsley-errors-container="#subject-error" required>
                            </div>
                            <p id="subject-error" style="color: #B94A48; margin-top: 10px;  margin-bottom: 10px"></p>
                            <div class="form-group">
                                <textarea class="form-control" name="contact_message"  id="" placeholder="Your Message" style="color: #000;" minlength="5" maxlength="1000" data-parsley-errors-container="#massage-error" required></textarea>
                            </div>
                            <p id="massage-error" style="color: #B94A48; margin-top: 10px;  margin-bottom: 10px"></p>
                            <button type="submit" class="btn buttonCustomPrimary">send message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MAP AREA SECTION -->
    <section class="mapArea">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6800.098108218522!2d74.32531485622503!3d31.550268347920355!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x147d8560712839dc!2sVirtual+University+of+Pakistan!5e0!3m2!1sen!2s!4v1501138983353" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </section>
@endsection

@section('plugin-script')

    <script>
        $('#contact-form').parsley();
    </script>


@endsection
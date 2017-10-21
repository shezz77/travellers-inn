<!--Modal Logout-->
<div class="md-modal md-3d-slit" id="create-slider-modal">
    <div class="md-content">
        <h3><strong>Create Slider</strong> </h3>

        <div style="padding: 5px 22px 48px;">

            <div class="">
                <form action="{{ route('slider.store') }}" id="slider-form" class="slider-form" method="POST">
                    @include('travellers-inn.admin.slider.partials.form')
                    <br>
                    <button type="button" class="btn btn-darkblue-1 md-close" style="float: right;margin-left: 10px;padding: 7px;">Cancel</button>
                    <button type="submit" class="btn btn-darkblue-1" style="float: right;background-color: #68C39F !important">Create Slider</button>

                    {{--<input type="submit" class="btn btn-darkblue-1" value="Create Slider">--}}
                </form>
            </div>

        </div>
    </div>
</div>
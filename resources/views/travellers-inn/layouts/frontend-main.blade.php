<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />


@include('travellers-inn.includes.frontend._head')

<body class="changeHeader">

<div class="main-wrapper">

    @include('travellers-inn.includes.frontend._header')


    {{--@include('travellers-inn.includes.frontend._banner')--}}

    {{--@include('travellers-inn.includes.frontend._page-title')--}}

    <div class="col-md-12">
        @include('travellers-inn.includes.frontend._messages')
    </div>

    @yield('content')

    @include('travellers-inn.includes.frontend._footer')

</div>

{{--@include('travellers-inn.includes.frontend._inquiry-model')--}}

@include('travellers-inn.includes.frontend._scripts')

</body>
</html>

@include('travellers-inn.includes.frontend._login-modal')
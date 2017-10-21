<head>

    <title>@yield('title')Travellers Inn</title>
    {{--<meta property="og:url"           content="http://localhost:8080/travellers-inn/public/posts" />--}}
    {{--<meta property="og:type"          content="website" />--}}
    {{--<meta property="og:title"         content="Travellers-Inn" />--}}
    {{--<meta property="og:description"   content="Your description" />--}}
    {{--<meta property="og:image"         content="http://www.your-domain.com/path/image.jpg" />--}}
    <!-- PLUGINS CSS STYLE -->
    @yield('plugin-stylesheet')

    @include('laravel-feed::feed-links')
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- GOOGLE FONT -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- CUSTOM CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/colors/default.css') }}" id="option_color">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}"/>
    <link rel="stylesheet" href="{{ asset('css/parsley.css') }}" type="text/css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <!--<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>-->
    <!--<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>-->
    <![endif]-->
    @yield('stylesheet')
</head>
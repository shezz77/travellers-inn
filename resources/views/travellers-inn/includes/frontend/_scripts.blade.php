<!-- JAVASCRIPTS -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
{{--Plugins--}}

<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
{{--<script src="{{ asset('js/share.js') }}"></script>--}}
<script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.js') }}"></script>
<script src="{{ asset('assets/plugins/isotope/jquery.fancybox.pack.js') }}"></script>
<script src="{{ asset('assets/options/optionswitcher.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

<script src="{{ asset('js/parsley.min.js') }}" type="text/javascript"></script>
@yield('plugin-script')
<script src="{{ asset('js/home/custom.js') }}" type="text/javascript"></script>

{{--Custom Scripts--}}
@yield('script')

{{--google analytics scripts--}}
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-102986991-1', 'auto');
    ga('send', 'pageview');

</script>
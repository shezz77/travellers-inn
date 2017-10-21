
jQuery(document).ready(function() {
    OptionSwitcher.initOptionSwitcher();
});
jQuery(document).ready(function() {
    $(".ed-datepicker input.form-control").focus(function() {
        $(".sbOptions").css("display", "none");
    });
    $('.ed-datepicker').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true,
        orientation: 'top auto',
        todayBtn: 'linked',
        todayHighlight: true
    });
    $('.dropdown').hover(function() {
        $(this).addClass('open');
    }, function() {
        $(this).removeClass('open');
    });
    jQuery('.fullscreenbanner').revolution({
        delay: 5000,
        startwidth: 1170,
        startheight: 745,
        fullWidth: "on",
        fullScreen: "off",
        hideCaptionAtLimit: "",
        dottedOverlay: "twoxtwo",
        navigationStyle: "preview4",
        fullScreenOffsetContainer: "",
        hideTimerBar: "on"
    });
    var header = $(".changeHeader .navbar-fixed-top");
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if ((scroll >= 1) && ($(".navbar-default").hasClass("navbar-main"))) {
            header.addClass("lightHeader");
        } else if ($(".navbar-default").hasClass("static-light")) {
            header.addClass("lightHeader");
        } else {
            header.removeClass("lightHeader");
        };
    });
    $('.select-drop').selectbox();
    $('.datepicker').datepicker({
        startDate: "dateToday",
        autoclose: true
    });
    $(document).ready(function($) {
        $('.counter').counterUp({
            delay: 10,
            time: 2000
        });
    });
    jQuery(document).ready(function() {
        var minimum = 20;
        var maximum = 300;
        $("#price-range").slider({
            range: true,
            min: minimum,
            max: maximum,
            values: [minimum, maximum],
            slide: function(event, ui) {
                $("#price-amount-1").val("$" + ui.values[0]);
                $("#price-amount-2").val("$" + ui.values[1]);
            }
        });
        $("#price-amount-1").val("$" + $("#price-range").slider("values", 0));
        $("#price-amount-2").val("$" + $("#price-range").slider("values", 1));
    });
    var allIcons = $(".singlePackage .panel-heading i.fa");
    $('.singlePackage .panel-heading').click(function() {
        allIcons.removeClass('fa-minus').addClass('fa-plus');
        $(this).find('i.fa').removeClass('fa-plus').addClass('fa-minus');
    });
    var allIconsOne = $(".accordionWrappar .panel-heading i.fa");
    $('.accordionWrappar .panel-heading').click(function() {
        allIconsOne.removeClass('fa-minus').addClass('fa-plus');
        $(this).find('i.fa').removeClass('fa-plus').addClass('fa-minus');
    });
    var allIconsExtra = $(".solidBgTitle .panel-heading i.fa");
    $('.solidBgTitle .panel-heading').click(function() {
        allIconsExtra.removeClass('fa-minus').addClass('fa-plus');
        $(this).find('i.fa').removeClass('fa-plus').addClass('fa-minus');
    });
    var allIconsTwo = $(".accordionSolidTitle .panel-heading i.fa");
    $('.accordionSolidTitle .panel-heading').click(function() {
        allIconsTwo.removeClass('fa-arrow-circle-up').addClass('fa-arrow-circle-down');
        $(this).find('i.fa').removeClass('fa-arrow-circle-down').addClass('fa-arrow-circle-up');
    });
    var allIconsThree = $(".accordionSolidBar .panel-heading i.fa");
    $('.accordionSolidBar .panel-heading').click(function() {
        allIconsThree.removeClass('fa-chevron-circle-up').addClass('fa-chevron-circle-down');
        $(this).find('i.fa').removeClass('fa-chevron-circle-down').addClass('fa-chevron-circle-up');
    });
    $(document).ready(function() {
        $('.accordionWrappar .panel-collapse, .accordionSolidTitle .panel-collapse, .accordionSolidBar .panel-collapse').on('show.bs.collapse', function() {
            $(this).siblings('.panel-heading').addClass('active');
            $(this).addClass('active');
        });
        $('.accordionWrappar .panel-collapse, .accordionSolidTitle .panel-collapse, .accordionSolidBar .panel-collapse').on('hide.bs.collapse', function() {
            $(this).siblings('.panel-heading').removeClass('active');
            $(this).removeClass('active');
        });
    });
    $('#simple_timer').syotimer({
        year: 2017,
        month: 5,
        day: 9,
        hour: 20,
        minute: 30,
    });
});
(function(i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r;
    i[r] = i[r] || function() {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
    a = s.createElement(o), m = s.getElementsByTagName(o)[0];
    a.async = 1;
    a.src = g;
    m.parentNode.insertBefore(a, m)
})
(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
ga('create', 'UA-71155940-4', 'auto');
ga('send', 'pageview');
(function(w, i, d, g, e, t, s) {
    w[d] = w[d] || [];
    t = i.createElement(g);
    t.async = 1;
    t.src = e;
    s = i.getElementsByTagName(g)[0];
    s.parentNode.insertBefore(t, s);
})
(window, document, '_gscq', 'script', '//widgets.getsitecontrol.com/46851/script.js');





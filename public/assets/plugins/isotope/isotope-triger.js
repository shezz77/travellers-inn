jQuery(document).ready(function($) {
    var myTheme = window.myTheme || {},
        $win = $(window);
    myTheme.Isotope = function() {
        var isotopeContainer = $('.isotopeContainer');
        if (!isotopeContainer.length || !jQuery().isotope) return;
        $win.load(function() {
            isotopeContainer.isotope({
                itemSelector: '.isotopeSelector'
            });
            $('.isotopeFilters').on('click', 'a', function(e) {
                $('.isotopeFilters').find('.active').removeClass('active');
                $(this).parent().addClass('active');
                var filterValue = $(this).attr('data-filter');
                isotopeContainer.isotope({
                    filter: filterValue
                });
                e.preventDefault();
            });
        });
        var isotopeContainer2 = $('.isotopeContainer2');
        if (!isotopeContainer2.length || !jQuery().isotope) return;
        $win.load(function() {
            isotopeContainer2.isotope({
                itemSelector: '.isotopeSelector'
            });
            $('.isotopeFilters2').on('click', 'a', function(e) {
                $('.isotopeFilters2').find('.active').removeClass('active');
                $(this).parent().addClass('active');
                var filterValue = $(this).attr('data-filter');
                isotopeContainer2.isotope({
                    filter: filterValue
                });
                e.preventDefault();
            });
        });


        var isotopeContainer3 = $('.isotopeContainer3');
        if (!isotopeContainer3.length || !jQuery().isotope) return;
        $win.load(function() {
            isotopeContainer3.isotope({
                itemSelector: '.isotopeSelector'
            });
            $('.isotopeFilters3').on('click', 'a', function(e) {
                $('.isotopeFilters3').find('.active').removeClass('active');
                $(this).parent().addClass('active');
                var filterValue = $(this).attr('data-filter');
                isotopeContainer3.isotope({
                    filter: filterValue
                });
                e.preventDefault();
            });
        });
        var isotopeContainer4 = $('.isotopeContainer4');

        if (!isotopeContainer4.length || !jQuery().isotope) return;

        $win.load(function() {
            isotopeContainer4.isotope({
                itemSelector: '.isotopeSelector'
            });

            $('.isotopeFilters4').on('click', 'a', function(e) {
                $('.isotopeFilters4').find('.active').removeClass('active');
                $(this).parent().addClass('active');
                var filterValue = $(this).attr('data-filter');
                isotopeContainer4.isotope({
                    filter: filterValue
                });
                e.preventDefault();
            });
        });
    };
    myTheme.Fancybox = function() {
        $(".fancybox-pop").fancybox({
            maxWidth: 900,
            maxHeight: 700,
            fitToView: true,
            width: '100%',
            height: '100%',
            autoSize: true,
            closeClick: false,
            openEffect: 'elastic',
            closeEffect: 'none'
        });
    };
    myTheme.Isotope();
    myTheme.Fancybox();
});
/* ========================================================================
 * blog.js
 * Page/renders: page-blog-*.html
 * Plugins used: owl carousel, magnific, shuffle
 * ======================================================================== */

'use strict';

(function (factory) {
    if (typeof define === 'function' && define.amd) {
        define([
            'magnific',
            'owl-carousel',
            'shuffle'
        ], factory);
    } else {
        factory();
    }
}(function () { 
    
    $(function () {
        // Owl carousel
        // ================================
        $('#gallery-post').owlCarousel({
            lazyLoad: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true,
            autoPlay: true,
            stopOnHover: true,
            navigation: true,
            pagination: false
        });

        // Magnific popup
        // ================================
        $('.popup-vimeo').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });

        // Shuffle
        // ================================
        if ($('#shuffle-grid').length > 0) {
            // Shuffle
            // ================================
            var $grid   = $('#shuffle-grid'),
                $sizer  = $grid.find('shuffle-sizer');
            
            // instatiate shuffle
            $grid.shuffle({
                itemSelector: '.post',
                sizer: $sizer
            });
        }
    });

}));
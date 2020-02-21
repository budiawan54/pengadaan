/* ========================================================================
 * home-v2.js
 * Page/renders: frontend/index-v2.html
 * Plugins used: owl.carousel, stellar
 * ======================================================================== */

'use strict';

(function (factory) {
    if (typeof define === 'function' && define.amd) {
        define([
            'owl.carousel',
            'stellar'
        ], factory);
    } else {
        factory();
    }
}(function () {

    $(function () {
        // Carousel
        // ================================
        $('#customer-reviews').owlCarousel({
            singleItem: true,
            autoPlay: true,
            autoHeight : true
        });

        // Stellar
        // ================================
        $.stellar({
            horizontalScrolling: false
        });
    });
    
}));
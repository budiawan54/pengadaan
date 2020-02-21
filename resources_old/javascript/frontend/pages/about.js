/* ========================================================================
 * about.js
 * Page/renders: forntend/page-about.html
 * Plugins used: owl-carousel
 * ======================================================================== */

'use strict';

(function (factory) {
    if (typeof define === 'function' && define.amd) {
        define([
            'owl-carousel'
        ], factory);
    } else {
        factory();
    }
}(function () {

    $(function () {
        // Carousel
        // ================================
        $('#lovely-client').owlCarousel({
            autoPlay: true,
            autoHeight : true,
            pagination : false
        });
    });

}));
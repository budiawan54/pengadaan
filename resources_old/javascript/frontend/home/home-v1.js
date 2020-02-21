/* ========================================================================
 * home-v1.js
 * Page/renders: frontend/index.html
 * Plugins used: owl carousel, layer slider
 * ======================================================================== */

'use strict';

(function (factory) {
    if (typeof define === 'function' && define.amd) {
        define([
            'owl-carousel',
            'layerslider'
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
        $('#lovely-client').owlCarousel({
            autoPlay: true,
            autoHeight : true,
            pagination : false
        });

        // Layerslider
        // ================================
        if($('#layerslider').length !== 0) {
            $('#layerslider').layerSlider({
                responsive: false,
                responsiveUnder: 1280,
                layersContainer: 1280,
                skin: 'fullwidth',
                hoverPrevNext: false,
                skinsPath: '../plugins/layerslider/skins/'
            });
        }
    });
    
}));
/* ========================================================================
 * shop-item-detail.js
 * Page/renders: frontend/shop-item-detail.html
 * Plugins used: layer-slider
 * ======================================================================== */

'use strict';

(function (factory) {
    if (typeof define === 'function' && define.amd) {
        define([
            'layer-slider'
        ], factory);
    } else {
        factory();
    }
}(function () { 
    
    $(function () {
        // Layer slider
        // ================================
        $('#layerslider').layerSlider({
            autoStart: false,
            skin: 'fullwidth',
            hoverPrevNext: false,
            navStartStop: false,
            showCircleTimer: false,
            //thumbnailNavigation: 'always',
            skinsPath: '../plugins/layerslider/skins/'
        });

        // Touch spin
        // ================================
        $('form[name="add-to-cart"] input[name="quantity"]').TouchSpin({
            initval: 1,
            verticalbuttons: true,
            verticalupclass: 'glyphicon glyphicon-plus',
            verticaldownclass: 'glyphicon glyphicon-minus'
        });
    });

}));
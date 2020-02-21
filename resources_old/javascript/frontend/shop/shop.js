/* ========================================================================
 * shop-v1.js
 * Page/renders: frontend/shop-*.html
 * Plugins used: jquery-ui
 * ======================================================================== */

'use strict';

(function (factory) {
    if (typeof define === 'function' && define.amd) {
        define([
            'jquery-ui'
        ], factory);
    } else {
        factory();
    }
}(function () { 
    
    $(function () {
        // Range slider
        // ================================
        $('#price-range-slider').each(function () {
            $(this).slider({
                range: true,
                min: 0,
                max: 200,
                values: [0, 200],
                step: 10,
                slide: function (event, ui) {
                    $('#price-range-form input[name="price-start"]').val(ui.values[0]);
                    $('#price-range-form input[name="price-end"]').val(ui.values[1]);
                }
            });
        });
    });

}));
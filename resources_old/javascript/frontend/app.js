/* ========================================================================
 * App.js v1.3.0
 * Copyright 2014 pampersdry
 * ======================================================================== */

'use strict';

(function (factory) {
    if (typeof define === 'function' && define.amd) {
        define([
            'core'
        ], factory);
    } else {
        factory();
    }
}(function () {

    var APP = {
        // Core init
        // NOTE: init at html element
        // ================================
        init: function () {
            $('html').Core({
                loader: true
            });
        }
    };

    $(function () {
        // Init template core
        APP.init();
    });
    
}));
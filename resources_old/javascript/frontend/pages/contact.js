/* ========================================================================
 * contact.js
 * Page/renders: gh_frontend/page-contact.html
 * Plugins used: gmaps
 * ======================================================================== */

/* global GMaps */

'use strict';

(function (factory) {
    if (typeof define === 'function' && define.amd) {
        define([
            'gmaps'
        ], factory);
    } else {
        factory();
    }
}(function () {
    
    $(function () {
        // gmaps - marker
        // ================================
        var marker = new GMaps({
            el: '#gmaps-marker',
            lat: -12.043333,
            lng: -77.028333
        });
        marker.addMarker({
            lat: -12.042,
            lng: -77.028333,
            title: 'Marker with InfoWindow',
            infoWindow: {
                content: '<p>HTML Content</p>'
            }
        });
    });
    
}));
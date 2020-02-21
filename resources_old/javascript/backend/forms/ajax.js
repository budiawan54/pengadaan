/* ========================================================================
 * ajax.js
 * Page/renders: forms-ajax.html
 * 
 * NOTE: in this demo i'll use bootstrap alert component to display the 
 * done/fail message. You can always use any other notification components 
 * like modal or gritter to display the message to the users ;)
 * ======================================================================== */

/* global Ladda */

'use strict';

(function (factory) {
    if (typeof define === 'function' && define.amd) {
        define([
            'parsley',
            'ladda'
        ], factory);
    } else {
        factory();
    }
}(function () {

    // Core function
    // ================================
    var formAjax = function (event) {
        var $form   = $(this),
            $btn    = $form.find('button[type="submit"]'),
            data    = $form.serialize(),
            type    = $form.attr('method'),
            url     = $form.attr('action');

        if ($form.parsley().validate()) {
            var jxhr = $.ajax({
                type: type,
                url: url,
                dataType: 'json',
                data: data
            }),
            ladda = Ladda.create($btn[0]).start();

            jxhr.done(function (data) {
                ladda.stop();

                var bsalert = '';
                    bsalert += '<div class="alert alert-success animation animating flipInX">';
                    bsalert += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                    bsalert += '<h4 class="semibold mb5">Success!</h4>';
                    bsalert += '<p class="nm">'+data.text+'</p>';
                    bsalert += '</div>';

                $form.find('.message-container').html(bsalert);
            });

            jxhr.fail(function (data) {
                ladda.stop();

                var bsalert = '', 
                    message;

                // construct message base on status code
                switch (data.status) {
                    case 404:
                        message = 'The requested file is not found!';
                    break;
                    case 500:
                        message = 'Internal server / script error!';
                    break;
                }
                // construct bootstrap alert with some css animation
                bsalert += '<div class="alert alert-danger animation animating flipInX">';
                bsalert += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                bsalert += '<h4 class="semibold mb5">'+data.status+' error!</h4>';
                bsalert += '<p class="nm">'+message+'</p>';
                bsalert += '</div>';

                // append to affected form
                $form.find('.message-container').html(bsalert);
            });
        }

        event.preventDefault();
    };

    $(function () {
        // Init form
        // ================================
        $('form[name="basic"]').on('submit', formAjax);
        $('form[name="validation"]').on('submit', formAjax);
        $('form[name="404"]').on('submit', formAjax);
        $('form[name="500"]').on('submit', formAjax);
    });

}));
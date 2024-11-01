/**
 * WhatsApp Customer Chat widget object
 * @type {Object}
 */
const wccWidget = {

    // Get the popup selector
    popup: jQuery( '.wcc-widget-popup' ),

    /**
     * Show and hide the widget
     */
    trigger: function() {

        var popupStatus = this.popup.attr( 'data-wcc-widget-status' );

        if ( popupStatus == '0' ) {
            this.popup.attr( 'data-wcc-widget-status', '1' );
            this.popup.addClass( 'wcc-widget-popup--open' );
        } else {
            this.popup.attr( 'data-wcc-widget-status', '0' );
            this.popup.removeClass( 'wcc-widget-popup--open' );
        }
        
    },

    /**
     * Auto popup 
     */
    autoPopup: function( seconds = 5 ) {

        if ( this.popup.attr( 'data-wcc-widget-status' ) == '0' ) {
            if ( sessionStorage.wccAutoPopup != 1 ) {
                setTimeout( function() {
                    wccWidget.popup.attr( 'data-wcc-widget-status', '1' );
                    wccWidget.popup.addClass( 'wcc-widget-popup--open' );
                    sessionStorage.wccAutoPopup = 1;
                }, seconds * 1000 );
            }
        }

    },

}

/**
 * Shake the element;
 */
function wcc_shaker( selector ) {
    // add the shaker class to the selector
    jQuery( selector ).addClass( 'wcc-shake-animation' );
    // remove the shaker class
    setTimeout( function() {
        jQuery( selector ).removeClass( 'wcc-shake-animation' );
    }, 400 );
}



;(function( $ ) {
    "use strict";


    /**
    * Open and close the widget
    */
    jQuery( document ).on('click', '[data-wcc-widget-trigger]', function() {

        wccWidget.trigger();    

    });


    /**
     * Send message on click.
     */
    jQuery( document ).on('click', '.wcc-widget-support-person', function(event) {
        

        var gdprStatus      = wccObject.gdprStatus;

        // if GDRP is activated and not checked
        if ( gdprStatus == '1' ) {
            if ( jQuery('#wcc-gdpr-compliance-checkbox').prop("checked") == false ) {
                wcc_shaker( '.wcc-gdpr-compliance' );
                event.preventDefault();
                return;
            }
        }


    });

    /**
     * Auto popup the widget.
     */
    if ( wccObject.autoPopupStatus == '1' ) {

        wccWidget.autoPopup();
    } 

})(jQuery)
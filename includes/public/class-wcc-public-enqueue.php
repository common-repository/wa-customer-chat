<?php

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

/**
 * This class is responsible for load all the scripts, styles and libraries for frontend.
 * @author WeCreativez
 */
class WCC_Public_Enqueue extends WCC_Common {

    public function __construct() {

        parent::__construct();

        add_action( 'wp_enqueue_scripts', array( $this, 'public_enqueue_scripts' ), 40 );

    }


    public function public_enqueue_scripts() {

        wp_enqueue_style( 'wecreativez-core-fonts' );

        wp_enqueue_style( 'wcc-public-style', WCC_URL . 'assets/css/wcc-public-style.css', array(), WCC_VERSION );
        wp_enqueue_script( 'wcc-public-script', WCC_URL . 'assets/js/wcc-public-script.js', array(), WCC_VERSION, true );
        wp_localize_script( 'wcc-public-script', 'wccObject', array(
            'autoPopupStatus'   => intval( $this->basic_settings['auto_popup'] ), 
            'gdprStatus'        => intval( $this->gdpr_settings['gdpr_status'] ),
        ) );

        $inline_style = '';

        $inline_style .= '.wcc-widget a {
            color: '. esc_html( $this->appearance_settings['text_color'] ) .';
        }';

        $inline_style .= '  .wcc-widget input.wcc-btn, 
                            .wcc-widget button.wcc-btn, 
                            .wcc-widget a.wcc-btn, 
                            .wcc-widget .wcc-btn,
                            .wcc-widget-trigger,
                            .wcc-widget-popup__header,
                            .wcc-widget-support-message';
        $inline_style .= '{
            background-color: '. esc_html( $this->appearance_settings['bg_color'] ) .';
            color: '. esc_html( $this->appearance_settings['text_color'] ) .';
        }';

        $inline_style .= '  .wcc-widget-navigation, .wcc-widget-support-message > div';
        $inline_style .= '{
            color: '. esc_html( $this->appearance_settings['text_color'] ) .';
        }';

        $inline_style .= '.wcc-gdpr-compliance a {
            color: '. esc_html( $this->appearance_settings['bg_color'] ) .' !important;
        }';


        if ( ! wp_is_mobile() ) {
            if ( 'bl' == $this->basic_settings['on_desktop_position'] ) {
                $inline_style .= '.wcc-widget {
                    bottom: 16px;
                    left: 16px;
                    align-items: flex-start;
                    flex-direction: column;
                }';
            } else {
                $inline_style .= '.wcc-widget {
                    bottom: 16px;
                    right: 16px;
                    align-items: flex-end;
                }';
            }
        } else {
            if ( 'bl' == $this->basic_settings['on_mobile_position'] ) {
                $inline_style .= '.wcc-widget {
                    bottom: 16px;
                    left: 16px;
                    align-items: flex-start;
                    flex-direction: column;
                }';
            } else {
                $inline_style .= '.wcc-widget {
                    bottom: 16px;
                    right: 16px;
                    align-items: flex-end;
                }';
            }
        }

        $inline_style .= $this->basic_settings['custom_css'];

        wp_add_inline_style( 'wcc-public-style', $inline_style );

    }


} // End of the class WCC_Public_Enqueue

$wcc_public_enqueue = new WCC_Public_Enqueue;
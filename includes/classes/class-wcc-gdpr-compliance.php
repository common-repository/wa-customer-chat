<?php

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

/**
 * 
 * WCC GDPR Compliance class makes the plugin GDPR Compliance enable.
 * 
 */
class WCC_GDPR_Compliance extends WCC_Common {

    /**
     * Plugin settings array.
     * @var array
     */
    public $settings = array();


    public function __construct() {

        parent::__construct();

        $this->settings = get_option( 'wcc_pro_gdpr_settings' );

        if ( $this->settings['gdpr_status'] != '1' ) {
            return;
        }

        add_action( 'wcc_gdpr_compliance', array( $this, 'display_gdpr_compliance' ) );

        add_action( 'wp_enqueue_scripts', array( $this, 'dynamic_css' ), 50 );


    }
    /**
     * Add dynamic CSS.
     * @return  void
     */
    public function dynamic_css() {

        $inline_style = '.wcc-gdpr-compliance {
            padding: 5px 15px;
            font-size: 15px;
            vertical-align: middle;
        }';

        wp_add_inline_style( 'wcc-public-style', $inline_style );

    }


    /**
     * Get the GDPR message. 
     * @return  html
     */
    public function get_message() {

        $page_id        = $this->settings['gdpr_privacy_page'];
        $policy_title   = get_the_title( $page_id );
        $policy_link    = get_the_permalink( $page_id );

        $policy_page = '<a href="' . esc_url( $policy_link ) . '" target="_blank">' . esc_html( $policy_title ) . '</a>';

        $message = str_replace( '{{link}}', $policy_page, do_shortcode( $this->settings['gdpr_msg'] ) );

        return $message;

    }


    /**
     * Load GDPR form.
     * @return html
     */
    public function display_gdpr_compliance() {

        require_once WCC_ABSPATH . 'views/gdpr-compliance.php';

    }


}

$wcc_gdpr_compliance = new WCC_GDPR_Compliance;
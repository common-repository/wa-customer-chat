<?php

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

/**
 * This class is responsible for load all the scripts, styles and libraries.
 * @author WeCreativez
 */
class WCC_Admin_Enqueue {

    public function __construct() {

        add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ), 40 );

    }

    /**
     * Load all the required backend scripts
     * @return void
     * @since 1.3
     */
    public function admin_enqueue_scripts( $hook ) {

        if ( true !== $this->is_my_admin_page( $hook ) ) {
            return;
        }

        // Load WordPress media script
        wp_enqueue_media();

        // enqueue WeCreativez Core fontasweome fonts
        wp_enqueue_style( 'wecreativez-core-fonts' );

        // enqueue WeCreativez Core  tippy tooltip
        wp_enqueue_script( 'wecreativez-core-tooltip' );

        // enqueue WeCreativez Core select2
        wp_enqueue_style( 'wecreativez-core-select2' );
        wp_enqueue_script( 'wecreativez-core-select2' );

        // enqueue WeCreativez Core select2
        wp_enqueue_style( 'wecreativez-core-datatable' );
        wp_enqueue_script( 'wecreativez-core-datatable' );

        // enqueue WeCreativez Core style and script
        wp_enqueue_style( 'wecreativez-core-style' );
        wp_enqueue_script( 'wecreativez-core-script' );

        wp_enqueue_script('thickbox');
        wp_enqueue_style('thickbox');

        // Plugin admin scripts and styles
        wp_enqueue_style( 'wcc-admin-style', WCC_URL . 'assets/css/wcc-admin-style.css', array(), WCC_VERSION );
        wp_enqueue_script( 'wcc-admin-script', WCC_URL . 'assets/js/wcc-admin-script.js', array(), WCC_VERSION, true );


    }


    /**
    * Check current admin page is plugin admin page or not.
    * @param  string  $hook
    * @return boolean
    */
    public function is_my_admin_page( $hook ) {

        if ( $hook == 'toplevel_page_wa-customer-chat'
        ||   $hook == 'whatsapp-care_page_wa-customer-chat_gdpr-compliance'
        ||   $hook == 'whatsapp-care_page_wa-customer-chat_plugin-support' ) {
            return true;
        }

        return false;
    }

} // End of class WCC_Admin_Enqueue

$wcc_admin_enqueue = new WCC_Admin_Enqueue;
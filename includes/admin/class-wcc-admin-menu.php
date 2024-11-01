<?php

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

/**
 * This class is responsible for plugin admin menu.
 * @author WeCreativez
 */
class WCC_Admin_Menu {

    public function __construct() {

        add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );

        add_action( "wp_ajax_wcc_add_support_person", array( $this, 'admin_add_support_person_page' ) );
        add_action( "wp_ajax_nopriv_wcc_add_support_person",array( $this, 'admin_add_support_person_page' ) );

        add_action( "wp_ajax_wcc_edit_support_person", array( $this, 'admin_edit_support_person_page' ) );
        add_action( "wp_ajax_nopriv_wcc_edit_support_person", array( $this, 'admin_edit_support_person_page' ) );

    }

    public function add_admin_menu() {

        add_menu_page( 
            esc_html__( 'WhatsApp Care', 'wa-customer-chat' ), 
            esc_html__( 'WhatsApp Care', 'wa-customer-chat' ), 
            'manage_options', 
            'wa-customer-chat', 
            array( $this, 'admin_setting_page' ), 
            'dashicons-format-chat', 
            NULL
        );

        add_submenu_page( 
            'wa-customer-chat',
            esc_html__( 'GDPR Compliance', 'wa-customer-chat' ), 
            esc_html__( 'GDPR Compliance', 'wa-customer-chat' ), 
            'manage_options', 
            'wa-customer-chat_gdpr-compliance', 
            array( $this, 'admin_gdpr_compliance_page' )
        );

        add_submenu_page( 
            'wa-customer-chat',
            esc_html__( 'Plugin Support', 'wa-customer-chat' ), 
            esc_html__( 'Plugin Support', 'wa-customer-chat' ), 
            'manage_options', 
            'wa-customer-chat_plugin-support', 
            array( $this, 'admin_plugin_support_page' )
        );

    }


    public function admin_setting_page() {

        // Get WeCreativez admin feild settings
        $field = new Wecreativez_Core_Field;

        $appearance_settings    = get_option( 'wcc_pro_appearance_settings', array() );
        $basic_settings         = get_option( 'wcc_pro_basic_settings', array() );
        $request_callback       = get_option( 'wcc_pro_request_callback_settings', array() );
        $product_query          = get_option( 'wcc_pro_product_query', array() );
        $support_persons        = get_option( 'wcc_pro_support_persons', array() );
        $support_settings       = get_option( 'wcc_pro_support_settings', array() );

        // Get current tab
        $tab = isset( $_GET['tab'] ) ? $_GET['tab'] : '';

        require_once WCC_ABSPATH . 'views/admin/admin-setting-page.php';

    }


    public function admin_gdpr_compliance_page() {

        // Get WeCreativez admin feild settings
        $field = new Wecreativez_Core_Field;

        $gdpr_settings = get_option( 'wcc_pro_gdpr_settings', array() );

        require_once WCC_ABSPATH . 'views/admin/admin-gdpr-settings.php';

    }


    public function admin_add_support_person_page() {

        // Get WeCreativez admin feild settings
        $field = new Wecreativez_Core_Field;

        require_once WCC_ABSPATH . 'views/admin/admin-add-support-person.php';

        wp_die();

    }


    public function admin_edit_support_person_page() {

        // Get WeCreativez admin feild settings
        $field = new Wecreativez_Core_Field;

        $person_id       = $_GET['wcc_support_person_id'];
        $support_persons = get_option( 'wcc_pro_support_persons', array() );

        require_once WCC_ABSPATH . 'views/admin/admin-edit-support-person.php';

        wp_die();

    }


    public function admin_plugin_support_page() {

        require_once WCC_ABSPATH . 'views/admin/admin-plugin-support.php';

    }


} // End of class WCC_Admin_Menu


$wcc_admin_menu = new WCC_Admin_Menu;
<?php

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

/**
 * This class is used to save all the plugin admin settings.
 * @author WeCreativez
 */
class WCC_Admin_Save_Settings {

    public function __construct() {

        add_action( 'admin_init', array( $this, 'register_plugin_settings' ), 20 );        

        add_action( 'admin_init', array( $this, 'save_add_support_person' ) );
        add_action( 'admin_init', array( $this, 'save_edit_support_person' ) );
        add_action( 'admin_init', array( $this, 'save_delete_support_person' ) );

        add_action( 'admin_init', array( $this, 'save_admin_review_action' ) );

        add_action( 'admin_init', array( $this, 'generate_debug_report' ) );
   
    }


    public function register_plugin_settings() {

        register_setting( 'wcc-admin-appearance-settings', 'wcc_pro_appearance_settings', array( $this, 'sanitize_appearance_settings' ) );
        register_setting( 'wcc-admin-basic-settings', 'wcc_pro_basic_settings', array( $this, 'sanitize_basic_settings' ) );
        register_setting( 'wcc-admin-support-settings', 'wcc_pro_support_settings', array( $this, 'sanitize_support_settings' ) );
        register_setting( 'wcc-admin-gdrp-settings', 'wcc_pro_gdpr_settings', array( $this, 'sanitize_gdpr_settings' ) );

    }


    public function sanitize_appearance_settings( $input ) {

        $input = array(
            'bg_color'      => sanitize_textarea_field( $input['bg_color'] ),
            'text_color'    => sanitize_textarea_field( $input['text_color'] ),
        );

        return $input;

    }


    public function sanitize_basic_settings( $input ) {

        $input = array(
            'on_mobile_status'    => sanitize_text_field( $input['on_mobile_status'] ),
            'on_mobile_position'  => sanitize_text_field( $input['on_mobile_position'] ),
            'on_desktop_status'   => sanitize_text_field( $input['on_desktop_status'] ),
            'on_desktop_position' => sanitize_text_field( $input['on_desktop_position'] ),
            'auto_popup'          => sanitize_text_field( $input['auto_popup'] ),
            'custom_css'          => sanitize_textarea_field( $input['custom_css'] ),
        );

        return $input;

    }


    public function sanitize_support_settings( $input ) {

        $input = array(
            'support_message'           => wp_kses_post( $input['support_message'] ),
            'placeholder_text'          => sanitize_text_field( $input['placeholder_text'] ),
        );

        return $input;

    }


    public function sanitize_gdpr_settings( $input ) {

        $input  = array(
            'gdpr_status'           => isset( $input['gdpr_status'] ) ? '1' : '0',
            'gdpr_msg'              => sanitize_text_field( $input['gdpr_msg'] ),
            'gdpr_privacy_page'     => sanitize_text_field( $input['gdpr_privacy_page'] ),
        );

        return $input;

    }


    public function save_add_support_person() {

        if ( ! isset( $_POST['wcc_add_support_person_submit'] ) ) {
            return;
        }

        // person data from form
        $post_data = stripslashes_deep( $_POST['wcc_add_support_person'] );

        // Get support persons from database
        $persons = get_option( 'wcc_pro_support_persons', array() );

        $persons[] = array(
            'contact_number'    => sanitize_text_field( $post_data['contact_number'] ), 
            'name'              => sanitize_text_field( $post_data['name'] ), 
            'title'             => sanitize_text_field( $post_data['title'] ), 
            'image'             => esc_url_raw( $post_data['image'] ), 
        );

        // Update support person data
        update_option( 'wcc_pro_support_persons', $persons );

    }


    public function save_edit_support_person() {

        if ( ! isset( $_POST['wcc_edit_support_person_submit'] ) ) {
            return;
        }

        // person data from form
        $post_data = stripslashes_deep( $_POST['wcc_edit_support_person'] );

        // Get support persons from database
        $persons = get_option( 'wcc_pro_support_persons', array() );

        // Get persion ID
        $person_id = $post_data['person_id'];

        $persons[$person_id] = array(
            'contact_number'    => sanitize_text_field( $post_data['contact_number'] ), 
            'name'              => sanitize_text_field( $post_data['name'] ), 
            'title'             => sanitize_text_field( $post_data['title'] ), 
            'image'             => esc_url_raw( $post_data['image'] ), 
        );

        // Update support person data
        update_option( 'wcc_pro_support_persons', $persons );

    }


    public function save_delete_support_person() {

        if ( ! isset( $_GET['wcc_delete_support_person'] ) ) {
            return;
        }        

        if ( ! is_admin() ) {
            return;
        }

        // Get support persons from database
        $persons = get_option( 'wcc_pro_support_persons', array() );

        // Remove the current support person
        unset( $persons[$_GET['wcc_delete_support_person']] );

        // Update support person data
        update_option( 'wcc_pro_support_persons', $persons );

        wp_redirect( admin_url( 'admin.php?page=wa-customer-chat&tab=support_persons&deleted=1' ) );

    }


    public function save_admin_review_action() {

        if ( ! isset( $_GET['wcc_admin_review'] ) ) {
            return;
        }

        update_option( 'wcc_admin_review_box_dismiss', '1' );

        wp_redirect( admin_url( 'admin.php?page=wa-customer-chat' ) );

    }


    public function generate_debug_report() {

        if ( ! isset( $_GET['wcc_generate_debug_report'] ) ) {
            return;
        }

        if ( ! is_admin() ) {
            return;
        }

        $upload_dir = wp_upload_dir();

        if ( ! file_exists( $upload_dir['basedir'] . '/wcc-debug-report' ) ) {
            mkdir( $upload_dir['basedir'] . '/wcc-debug-report', 0777, true );
        }

        ob_start();
        
        $report = new Wecreativez_Report;
        
        require_once WCC_ABSPATH . 'views/admin/email/email-debug-report.php';
        
        $report = ob_get_clean();


        file_put_contents( $upload_dir['basedir'] . '/wcc-debug-report/report.html', $report );

        wp_redirect( admin_url( 'admin.php?page=wa-customer-chat&tab=plugin_support&debug_report_generated=1' ) );

    }


} // End of the class WCC_Admin_Save_Settings

$wcc_admin_save_settings = new WCC_Admin_Save_Settings;
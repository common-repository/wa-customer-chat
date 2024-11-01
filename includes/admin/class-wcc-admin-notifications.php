<?php

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

/**
 * This class is responsible for the all admin notifications
 * @author WeCreativez 
 */
class WCC_Admin_Notifications {

    public function __construct() {

        add_action( 'wcc_admin_notifications', array( $this, 'save_settings_notification' ), 20 );
        add_action( 'wcc_admin_notifications', array( $this, 'plugin_review' ), 30 );

    }


    public function save_settings_notification() {

        if ( isset( $_POST['wcc_add_support_person_submit'] )
        ||   isset( $_POST['wcc_edit_support_person_submit'] )
        ||   isset( $_GET['deleted'] ) ) {

            require_once WCC_ABSPATH . 'views/admin/notifications/save-settings.php';

        }
            
    }

    public function plugin_review() {

        if ( get_option( 'wcc_admin_review_box_dismiss' ) != '1' ) {
            
            require_once WCC_ABSPATH . 'views/admin/notifications/plugin-review.php';

        }


    }


} // End of the class WCC_Admin_Notifications

$wcc_admin_notifications = new WCC_Admin_Notifications;
<?php

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

class WCC_Init {

    public function init() {

        // Deprecated Functions, Classes, Shortcodes etc
        require_once WCC_ABSPATH . 'includes/wcc-deprecated.php';

        // Functions
        require_once WCC_ABSPATH . 'includes/wcc-functions.php';

        // Common Classes
        require_once WCC_ABSPATH . 'includes/class-wcc-common.php';

        if ( is_admin() ) {
            
            // Admin classes
            require_once WCC_ABSPATH . 'includes/admin/class-wcc-admin-menu.php';
            require_once WCC_ABSPATH . 'includes/admin/class-wcc-admin-enqueue.php';
            require_once WCC_ABSPATH . 'includes/admin/class-wcc-admin-save-settings.php';
            require_once WCC_ABSPATH . 'includes/admin/class-wcc-admin-notifications.php';

        }

        require_once WCC_ABSPATH . 'includes/public/class-wcc-public-ajax.php';
        require_once WCC_ABSPATH . 'includes/public/class-wcc-public-enqueue.php';
        require_once WCC_ABSPATH . 'includes/classes/class-wcc-gdpr-compliance.php';
        require_once WCC_ABSPATH . 'includes/classes/class-wcc-support-person.php';
        require_once WCC_ABSPATH . 'includes/classes/class-wcc-widget.php';

    }

} // end of class WCC_Init

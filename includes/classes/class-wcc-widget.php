<?php

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

class WCC_Widget extends WCC_Common {

    public function __construct() {

        parent::__construct();

        add_action( 'wp_footer', array( $this, 'display_widget' ) );

    }


    public function display_widget() {

        if ( wp_is_mobile() && '0' == $this->basic_settings['on_mobile_status'] ) {
            return;
        }

        if ( ! wp_is_mobile() && '0' == $this->basic_settings['on_desktop_status'] ) {
            return;
        }

        require_once WCC_ABSPATH . 'views/widget.php';

    }

} // End of the class WCC_Widget.

$wcc_widget = new WCC_Widget;
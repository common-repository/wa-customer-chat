<?php

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;


/**
 * 
 * WCC Request Callback class.
 * @since 1.0
 * 
 */
class WCC_Request_Callback extends WCC_Common {

    /**
     * Request callbact setting array
     * @var array
     */
    public $settings = array();

    public function __construct() {
        
        parent::__construct();

        $this->settings = get_option( 'wcc_pro_request_callback_settings', array() );

        if ( $this->settings['status'] != '1' ) {
            return;
        }

        add_action( "wp_ajax_wcc_request_callback_ajax", array( $this, 'request_callback_ajax' ) );
        add_action( "wp_ajax_nopriv_wcc_request_callback_ajax", array( $this, 'request_callback_ajax' ) );

    }


    public function request_callback_ajax() {

        $post_id    = sanitize_text_field( $_POST['post_id'] );
        $name       = sanitize_text_field( $_POST['wcc_request_callback_name'] );
        $number     = sanitize_text_field( $_POST['wcc_request_callback_number'] );
        $message    = sanitize_text_field( $_POST['wcc_request_callback_message'] );

        $email_body = str_replace( 
            array(
                '{{name}}',
                '{{number}}',
                '{{message}}',
                '{{link}}',
                '{{title}}',
            ), 
            array(
                $name,
                $number,
                $message,
                get_the_permalink( $post_id ),
                get_the_title( $post_id ),
            ), 
            wp_kses_post( $this->settings['email_body'] )
        );


        $to         = $this->settings['email_to'];
        $subject    = $this->settings['email_subject'];
        $body       = do_shortcode( $email_body );
        $headers[]  = 'Content-Type: text/html; charset=UTF-8';
        $headers[]  = 'From: '. get_bloginfo( 'name' ) .' <'. $this->settings['email_to'] .'>';
         
        $mail_stats = wp_mail( $to, $subject, $body, $headers );

        if ( $mail_stats ) {
            require_once WCC_ABSPATH . 'views/request-callback-thank-you.php';
        } else {
            if ( current_user_can( 'manage_options' ) ) {
                esc_html_e( 'Email Failed. Please check your Wordpress email settings or mail() function.', 'wa-customer-chat' );
            }
        }

        wp_die();
    }



} // End of the class WCC_Request_Callback

$wcc_request_callback = new WCC_Request_Callback;
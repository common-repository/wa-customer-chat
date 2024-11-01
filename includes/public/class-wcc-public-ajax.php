<?php

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;


/**
 * This class is responsible for all the frontend ajax.
 * @author WeCreativez
 */
class WCC_Public_Ajax extends WCC_Common {

    public function __construct() {

        parent::__construct();

        add_action( "wp_ajax_wcc_load_multi_persons_view", array( $this, 'load_multi_persons_view' ) );
        add_action( "wp_ajax_nopriv_wcc_load_multi_persons_view", array( $this, 'load_multi_persons_view' ) );

        add_action( "wp_ajax_wcc_load_selected_person_view", array( $this, 'load_selected_person_view' ) );
        add_action( "wp_ajax_nopriv_wcc_load_selected_person_view", array( $this, 'load_selected_person_view' ) );

        add_action( "wp_ajax_wcc_load_request_callback_view", array( $this, 'load_request_callback_view' ) );
        add_action( "wp_ajax_nopriv_wcc_load_request_callback_view", array( $this, 'load_request_callback_view' ) );

    }


    public function load_multi_persons_view() {

        require_once WCC_ABSPATH . 'views/multi-persons.php';
        
        wp_die();

    }


    public function load_selected_person_view() {

        $person = new WCC_Support_Person( $_POST['person_id'] );

        require_once WCC_ABSPATH . 'views/selected-person.php';
        
        wp_die();

    }


    public function load_request_callback_view() {

        require_once WCC_ABSPATH . 'views/request-callback-form.php';


        wp_die();

    }




} // End of classs WCC_Public_Ajax

$wcc_public_ajax = new WCC_Public_Ajax;
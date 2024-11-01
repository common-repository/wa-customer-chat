<?php

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

/**
 * 
 * WCC Support Person class contain all the information of support person individually.
 * 
 */
class WCC_Support_Person extends WCC_Common {

    public $person;

    public function __construct( $person_id ) {

        parent::__construct();
        
        $support_persons    = get_option( 'wcc_pro_support_persons', array() );
        $this->person       = $support_persons[$person_id];

    }

    public function get_id() {
        
        return $person_id;

    }

    public function get_name() {

        return $this->person['name'];
    
    }

    public function get_title() {

        return $this->person['title'];

    }

    public function get_image() {

        if ( $this->person['image'] ) {
            return $this->person['image'];
        } else {
            return WCC_URL . 'assets/images/default-avatar.png';
        }

    }

    public function get_number() {

        return $this->person['contact_number'];

    }

    public function get_input_placeholder() {

        return str_replace( '{{person_name}}', $this->get_name(), $this->support_settings['placeholder_text'] );
    
    }


} // End of the class WCC_Support_Person

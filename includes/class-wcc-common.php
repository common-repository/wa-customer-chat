<?php

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;


/**
 * This call is use to extends with other classes.
 * @author WeCreativez
 */
class WCC_Common {

    protected $appearance_settings = array();

    protected $support_persons = array();

    protected $support_settings = array();

    protected $basic_settings = array();

    protected $gdpr_settings = array();

    public function __construct() {

        $this->appearance_settings          = get_option( 'wcc_pro_appearance_settings', array() );
        $this->support_persons              = get_option( 'wcc_pro_support_persons', array() );
        $this->support_settings             = get_option( 'wcc_pro_support_settings', array() );
        $this->basic_settings               = get_option( 'wcc_pro_basic_settings', array() );
        $this->gdpr_settings                = get_option( 'wcc_pro_gdpr_settings', array() );

    }


} // End of the class WCC_Common

$wcc_common = new WCC_Common;
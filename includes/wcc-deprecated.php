<?php

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

/**
 * Get the current product link
 * @since 1.0
 * @deprecated 1.3 Use {{link}}
 * 
 * @see WCC_Product_Query::get_link();
 * 
 */     
function wcc_deprecated_shortcode_product_query_link() {

    return get_the_permalink( get_the_ID() );

}
add_shortcode( 'wcc_pro_product_query_link', 'wcc_deprecated_shortcode_product_query_link' );


/**
 * Get the current product title/name
 * @since 1.0
 * @deprecated 1.3 Use {{title}}
 * 
 * @see WCC_Product_Query::get_link();
 * 
 */
function wcc_deprecated_shortcode_product_query_title() {

    return get_the_title( get_the_ID() );

}
add_shortcode( 'wcc_pro_product_query_title', 'wcc_deprecated_shortcode_product_query_title' );


/**
 * Get GDPR Privacy page
 * @since 1.0
 * @deprecated 1.3 Use {{link}}
 * 
 * @see WCC_GDPR_Compliance::get_message();
 * 
 */
function wcc_deprecated_shortcode_privacy_policy_url() {

    $gdpr_settings = get_option( 'wcc_pro_gdpr_settings', array() );

    $page_id = $gdpr_settings['gdpr_privacy_page'];

    return "<a href='" . get_the_permalink( $page_id ). "' target='_blank'>". get_the_title( $page_id ) ."</a>";

}
add_shortcode( 'wcc_pro_gdpr_link', 'wcc_deprecated_shortcode_privacy_policy_url' );


/**
 * Get the request callback name.
 * @since 1.0
 * @deprecated 1.3 Use
 * 
 * @see
 */
function wcc_deprecated_shortcode_rc_name() {
    
    return sanitize_text_field( $_POST['wcc_request_callback_name'] );

}
add_shortcode( 'wcc_pro_rc_name', 'wcc_deprecated_shortcode_rc_name' );


/**
 * Get the request callback number.
 * @since 1.0
 * @deprecated 1.3 Use
 * 
 * @see
 */
function wcc_deprecated_shortcode_rc_number() {
    
    return sanitize_text_field( $_POST['wcc_request_callback_number'] );

}
add_shortcode( 'wcc_pro_rc_number', 'wcc_deprecated_shortcode_rc_number' );


/**
 * Get the request callback message.
 * @since 1.0
 * @deprecated 1.3 Use
 * 
 * @see
 */
function wcc_deprecated_shortcode_rc_message() {
    
    return sanitize_textarea_field( $_POST['wcc_request_callback_message'] );

}
add_shortcode( 'wcc_pro_rc_message', 'wcc_deprecated_shortcode_rc_message' );
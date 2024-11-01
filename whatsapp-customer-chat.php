<?php
/**
 * Plugin Name: WhatsApp Customer Chat
 * Description: WhatsApp Customer Chat plugin provides better and easy way to communicate visitors and customers directly to your support person.
 * Plugin URI: http://wacustomerchat.com/
 * Author: WeCreativez
 * Author URI: http://wecreativez.com
 * Version: 1.0
 * License: GPL2
 * Text Domain: wa-customer-chat
 * Domain Path: languages
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

// Define plugin ABSPATH
if ( ! defined( 'WCC_ABSPATH' ) ) {
    define( 'WCC_ABSPATH', plugin_dir_path( __FILE__ ) );
}

// Define plugin URL
if ( ! defined( 'WCC_URL' ) ) {
    define( 'WCC_URL', plugin_dir_url( __FILE__ ) );
}

// Define plugin version
if ( ! defined( 'WCC_VERSION' ) ) {
    define( 'WCC_VERSION', '1.0' );
}

/* Plugin Framework Version Check */
if ( ! function_exists( 'wecreativez_maybe_plugin_fw_loader' ) 
    && file_exists( plugin_dir_path( __FILE__ ) . 'plugin-core/init.php' ) ) {
        require_once( plugin_dir_path( __FILE__ ) . 'plugin-core/init.php' );
}
wecreativez_maybe_plugin_fw_loader( plugin_dir_path( __FILE__ ) );

/**
 * Load Plugin Framework
 *
 * @since  1.3
 * @access public
 * @return void
 * @author WeCreativez
 */
 function wcc_wc_plugin_fw_loader() {
    if ( ! defined( 'WECREATIVEZ_CORE_PLUGIN' ) ) {
        global $plugin_wc_data;
        if ( !empty( $plugin_wc_data ) ) {
            $plugin_wc_file = array_shift( $plugin_wc_data );
            require_once( $plugin_wc_file );
        }
    }
}
// Load Plugin Framework
add_action( 'plugins_loaded', 'wcc_wc_plugin_fw_loader', 15 );

// Plugin activation hook
function wcc_plugin_activation() {

    require_once WCC_ABSPATH . 'includes/class-wcc-activation.php';
    WCC_Activation::activate();

}
register_activation_hook( __FILE__, 'wcc_plugin_activation' );


// Hook plugin with plugins_loaded
if ( ! class_exists( 'WCC_Init' ) ) {
    
    require_once WCC_ABSPATH . 'includes/class-wcc-init.php';

    function wcc_plugin_load() {
        $wcc_init = new WCC_Init;
        $wcc_init->init();
        return $wcc_main;
    }

    add_action( 'plugins_loaded', 'wcc_plugin_load' );

}


/**
 * Load plugin textdomain.
 * @since 1.2
 */
if ( ! function_exists( 'wcc_load_textdomain' ) ) {

    function wcc_load_textdomain() {
        load_plugin_textdomain( 'wa-customer-chat', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
    }

    add_action( 'init', 'wcc_load_textdomain' );

}

/**
 * Adding a Settings link to plugin 
 * @since 1.3
 */
function wcc_add_plugin_page_settings_link( $links ) {
    $links[] = '<a href="' .
        admin_url( 'admin.php?page=wa-customer-chat' ) .
        '">' . esc_html__( 'Settings' ) . '</a>';
    return $links;
}
add_filter( 'plugin_action_links_'.plugin_basename(__FILE__), 'wcc_add_plugin_page_settings_link' );
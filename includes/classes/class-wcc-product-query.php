<?php

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

/**
 * 
 * The WCC product query class is for adding query button on WooCommerce product.
 *   
 */
class WCC_Product_Query extends WCC_Common {

    /**
     * Plugin settings array.
     * @var array
     */
    public $setting = array();

    public function __construct() {

        parent::__construct();      

        $this->setting = get_option( 'wcc_pro_product_query', array() );

        if ( $this->setting['status'] != '1' ) {
            return;
        }

        if ( $this->setting['position'] === 'woocommerce_after_add_to_cart_button' ) {
            add_action( 'woocommerce_after_add_to_cart_button', array( $this, 'display_product_query' ) );
        } elseif ( $this->setting['position'] === 'woocommerce_share' ) {
            add_action( 'woocommerce_share', array( $this, 'display_product_query' ) );
        } elseif ( $this->setting['position'] === 'woocommerce_before_add_to_cart_button' ) {
            add_action( 'woocommerce_before_add_to_cart_button', array( $this, 'display_product_query' ) );
        } else {
            add_action( 'woocommerce_after_add_to_cart_button', array( $this, 'display_product_query' ) );
        }

        add_action( 'wp_enqueue_scripts', array( $this, 'dynamic_css' ), 50 );

    }


    /**
     * Add dynamic CSS.
     * @return  void
     */
    public function dynamic_css() {

        $inline_style = '.wcc-product-query-button {
            background-color: '. esc_html( $this->setting['button_bg_color'] ) .' !important;
            color: '. esc_html( $this->setting['button_text_color'] ) .' !important;
        }';

        wp_add_inline_style( 'wcc-public-style', $inline_style );

    }


    /**
     * Load query button on product page.
     * @return html
     * 
     */
    public function display_product_query() {

        require_once WCC_ABSPATH . 'views/product-query-button.php';
    
    }


    /**
     * Get the WhatsApp contact link for product query.
     * @return link
     * 
     * Mobile WhatsApp Link: https://api.whatsapp.com/send?phone=<whatsapp_number>&text=<message>
     * Desktop WhatsApp Link: https://web.whatsapp.com/send?phone=<whatsapp_number>&text=<message>
     * 
     */
    public function get_link() {

        $link = '';

        $current_page_link  = get_the_permalink( get_the_ID() );
        $current_page_title = get_the_title( get_the_ID() );

        $message = str_replace( 
            array(
                '{{link}}',
                '{{title}}',
            ),
            array(
                $current_page_link,
                $current_page_title,
            ), 
            $this->setting['message']
        );   

        if ( wp_is_mobile() ) {
            $link .= 'https://api.whatsapp.com/send?';
        } else {
            $link .= 'https://web.whatsapp.com/send?';
        }

        $link .= 'phone=' . $this->setting['contact_number'] . '&';
        $link .= 'text=' . do_shortcode( $message );

        return $link;

    }

}

$wcc_product_query = new WCC_Product_Query;
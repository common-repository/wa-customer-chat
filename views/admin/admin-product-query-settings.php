<form action="options.php" method="post">
  
    <?php settings_fields( 'wcc-admin-product-query-settings' ); ?>

    <table class="form-table">
        
        <tbody>
            
            <?php

                // Checkbox
                $field->add( 'checkbox',
                    array(
                        'label'         => esc_html__( 'Product Query', 'wa-customer-chat' ),
                        'name'          => 'wcc_pro_product_query[status]',
                        'value'         => intval( $product_query['status'] ),
                        'checkbox_text' => esc_html__( 'Enable/ Disable', 'wa-customer-chat' ),
                    )
                );

                // Color
                $field->add( 'color',
                    array(
                        'label'         => esc_html__( 'Button Background Color', 'wa-customer-chat' ),
                        'name'          => 'wcc_pro_product_query[button_bg_color]',
                        'value'         => esc_html( $product_query['button_bg_color'] ),
                        'tooltip'       => esc_html__( 'Select button background color.', 'wa-customer-chat' ),
                    )
                );

                // Color
                $field->add( 'color',
                    array(
                        'label'         => esc_html__( 'Button Text Color', 'wa-customer-chat' ),
                        'name'          => 'wcc_pro_product_query[button_text_color]',
                        'value'         => esc_html( $product_query['button_text_color'] ),
                        'tooltip'       => esc_html__( 'Select button text color.', 'wa-customer-chat' ),
                    )
                );

                // Text
                $field->add( 'text',
                    array(
                        'label'         => esc_html__( 'Button Text', 'wa-customer-chat' ),
                        'name'          => 'wcc_pro_product_query[button_text]',
                        'value'         => esc_html( $product_query['button_text'] ),
                        'tooltip'       => esc_html__( 'Enter the product query button text.', 'wa-customer-chat' ),
                    )
                );

                // Text
                $field->add( 'text',
                    array(
                        'label'         => esc_html__( 'Contact Person Number', 'wa-customer-chat' ),
                        'name'          => 'wcc_pro_product_query[contact_number]',
                        'value'         => esc_html( $product_query['contact_number'] ),
                        'tooltip'       => esc_html__( 'Enter mobile phone number with the international country code, without + character. Example:  911234567890 for (+91) 1234567890', 'wa-customer-chat' ),
                    )
                );

                // Select
                $field->add( 'select',
                    array(
                        'label'         => esc_html__( 'Button Location', 'wa-customer-chat' ),
                        'name'          => 'wcc_pro_product_query[position]',
                        'selected'      => esc_html( $product_query['position'] ),
                        'option'        => array(
                            'woocommerce_after_add_to_cart_button'  => esc_html__( 'After Add To Cart Button', 'wa-customer-chat' ),
                            'woocommerce_before_add_to_cart_button' => esc_html__( 'Before Add To Cart Button', 'wa-customer-chat' ),
                            'woocommerce_share'                     => esc_html__( 'WooCommerce Share', 'wa-customer-chat' ),
                        ),
                        'tooltip'       => esc_html__( 'Select the button location on WooCommerce product page.', 'wa-customer-chat' ),
                    )
                );

                // Textarea
                $field->add( 'textarea',
                    array(
                        'label'         => esc_html__( 'Pre-populate Message', 'wa-customer-chat' ),
                        'name'          => 'wcc_pro_product_query[message]',
                        'value'         => esc_html( $product_query['message'] ),
                        'desc'          => wp_kses_post( sprintf( __( 'Use %s for product link and %s for product name.', 'wa-customer-chat' ), '<code>{{link}}</code>', '<code>{{title}}</code>' ) ),
                    )
                );


            ?>

        </tbody>

    </table>

    <?php submit_button(); ?>

</form>
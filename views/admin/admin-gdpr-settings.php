<div class="wrap">
    
    <h1><?php esc_html_e( 'GDPR Compliance', 'wa-customer-chat' ); ?></h1>

    <?php do_action( 'wcc_admin_notifications' ); ?>
    <?php settings_errors(); ?>

    <hr>

    <form action="options.php" method="post">
      
        <?php settings_fields( 'wcc-admin-gdrp-settings' ) ?>

        <table class="form-table">
            
            <tbody>
                
                <?php

                    // GDPR Compliance
                    $field->add( 'checkbox',
                        array(
                            'label'         => esc_html__( 'GDPR Compliance', 'wa-customer-chat' ),
                            'name'          => 'wcc_pro_gdpr_settings[gdpr_status]',
                            'value'         => intval( $gdpr_settings['gdpr_status'] ),
                            'checkbox_text' => esc_html__( 'Enable/ Disable', 'wa-customer-chat' ),
                        )
                    );

                    // GDPR Message
                    $field->add( 'textarea',
                        array(
                            'label'         => esc_html__( 'GDPR Message', 'wa-customer-chat' ),
                            'name'          => 'wcc_pro_gdpr_settings[gdpr_msg]',
                            'value'         => esc_html( $gdpr_settings['gdpr_msg'] ),
                            'desc'          => wp_kses_post( sprintf( __( 'Use %s to add privacy page link', 'wa-customer-chat' ), '<code>{{link}}</code>' ) ),
                        )
                    );

                ?>

                <tr>
                    <th scope="row">
                        <label><?php esc_html_e( 'Privacy page', 'wp-customer-chat-pro' ) ?></label>
                        <span class="dashicons dashicons-info wecreativez-admin-tooltip" data-tippy-content="<?php esc_html_e( 'Select your privacy page.', 'wp-customer-chat-pro' ) ?>"></span>
                    </th>
                    <td>
                        <?php 
                            wecreativez_dropdown_pages( 
                                array( 
                                    'name'      => 'wcc_pro_gdpr_settings[gdpr_privacy_page]',
                                    'selected'  => $gdpr_settings['gdpr_privacy_page'], 
                                ) 
                            ) 
                        ?>              
                    </td>
                </tr>

            </tbody>

        </table>

        <?php submit_button(); ?>

    </form>

</div>


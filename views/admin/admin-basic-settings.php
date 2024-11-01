<form action="options.php" method="post">
  
    <?php settings_fields( 'wcc-admin-basic-settings' ) ?>

    <table class="form-table">
        
        <tbody>
            
            <tr>
                <th scope="row">
                    <label><?php esc_html_e('Display On Mobile', 'wa-customer-chat') ?></label>
                    <span class="dashicons dashicons-info wecreativez-admin-tooltip" data-tippy-content="<?php esc_html_e( 'Select widget position on mobile.', 'wa-customer-chat' ) ?>"></span>
                </th>
                <td>
                    <select name="wcc_pro_basic_settings[on_mobile_status]">
                        <option value="1" <?php selected( '1', $basic_settings['on_mobile_status'], true ) ?>><?php esc_html_e( 'Yes', 'wa-customer-chat' ) ?></option>
                        <option value="0" <?php selected( '0', $basic_settings['on_mobile_status'], true ) ?>><?php esc_html_e( 'No', 'wa-customer-chat' ) ?></option>
                    </select>
                    <select name="wcc_pro_basic_settings[on_mobile_position]">
                        <option value="bl" <?php selected( 'bl', $basic_settings['on_mobile_position'], true ) ?>><?php esc_html_e( 'Bottom Left', 'wa-customer-chat' ) ?></option>
                        <option value="br" <?php selected( 'br', $basic_settings['on_mobile_position'], true ) ?>><?php esc_html_e( 'Bottom Right', 'wa-customer-chat' ) ?></option>
                    </select>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label><?php esc_html_e('Display On Desktop', 'wa-customer-chat') ?></label>
                    <span class="dashicons dashicons-info wecreativez-admin-tooltip" data-tippy-content="<?php esc_html_e( 'Select widget position on desktop/ laptop.', 'wa-customer-chat' ) ?>"></span>
                </th>
                <td>
                    <select name="wcc_pro_basic_settings[on_desktop_status]">
                        <option value="1" <?php selected( '1', $basic_settings['on_desktop_status'], true ) ?>><?php esc_html_e( 'Yes', 'wa-customer-chat' ) ?></option>
                        <option value="0" <?php selected( '0', $basic_settings['on_desktop_status'], true ) ?>><?php esc_html_e( 'No', 'wa-customer-chat' ) ?></option>
                    </select>
                    <select name="wcc_pro_basic_settings[on_desktop_position]">
                        <option value="bl" <?php selected( 'bl', $basic_settings['on_desktop_position'], true ) ?>><?php esc_html_e( 'Bottom Left', 'wa-customer-chat' ) ?></option>
                        <option value="br" <?php selected( 'br', $basic_settings['on_desktop_position'], true ) ?>><?php esc_html_e( 'Bottom Right', 'wa-customer-chat' ) ?></option>
                    </select>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="wcc_pro_basic_settings[auto_popup]"><?php esc_html_e( 'Auto Popup', 'wa-customer-chat' ); ?></label>
                    <span class="dashicons dashicons-info wecreativez-admin-tooltip" data-tippy-content="<?php esc_html_e( 'Auto popup widget.', 'wa-customer-chat' ) ?>"></span>
                </th>
                <td>
                    <select name="wcc_pro_basic_settings[auto_popup]" id="" class="">
                        <option value="1" <?php selected( '1', $basic_settings['auto_popup'], true ); ?>><?php esc_html_e( 'Yes', 'wa-customer-chat' ); ?></option>
                        <option value="0" <?php selected( '0', $basic_settings['auto_popup'], true ); ?>><?php esc_html_e( 'No', 'wa-customer-chat' ); ?></option>
                    </select>
                </td>
            </tr>

            <?php

                // Custom CSS
                $field->add( 'textarea',
                    array(
                        'label'         => esc_html__( 'Custom CSS', 'wa-customer-chat' ),
                        'name'          => 'wcc_pro_basic_settings[custom_css]',
                        'value'         => esc_html( $basic_settings['custom_css'] ),
                        'tooltip'       => esc_html__( 'Add your custom CSS here.', 'wa-customer-chat' ),
                    )
                );

            ?>

        </tbody>

    </table>

    <?php submit_button(); ?>

</form>
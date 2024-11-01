<form action="options.php" method="post">
  
    <?php settings_fields( 'wcc-admin-appearance-settings' ); ?>

    <table class="form-table">
        
        <tbody>
            
            <?php

                // Background Color
                $field->add( 'color',
                    array(
                        'label'         => esc_html__( 'Background Color', 'textdomain' ),
                        'name'          => 'wcc_pro_appearance_settings[bg_color]',
                        'value'         => esc_html( $appearance_settings['bg_color'] ),
                        'desc'          => esc_html__( 'Default value: #0B1839', 'textdomain' ),
                        'tooltip'       => esc_html__( 'Select widget background color.', 'textdomain' ),
                    )
                );

                // Text Color
                $field->add( 'color',
                    array(
                        'label'         => esc_html__( 'Text Color', 'textdomain' ),
                        'name'          => 'wcc_pro_appearance_settings[text_color]',
                        'value'         => esc_html( $appearance_settings['text_color'] ),
                        'desc'          => esc_html__( 'Default value: #FFFFFF', 'textdomain' ),
                        'tooltip'       => esc_html__( 'Select widget text color.', 'textdomain' ),
                    )
                );

            ?>

        </tbody>

    </table>

    <?php submit_button(); ?>

</form>
<table class="form-table">
  
    <tbody>
        
        <?php foreach ( $support_persons as $person_id => $person ) : ?>

            <tr>
                <th scope="row">
                    <label><?php echo esc_html( $person['name'] ) ?></label>
                </th>
                <td>
                    <a href="#" class="button button-primary wcc-edit-support-person" data-wcc-support-person-id="<?php echo intval( $person_id ) ?>"><?php esc_html_e( 'Edit', 'wa-customer-chat' ) ?></a>
                    <a href="<?php echo '?wcc_delete_support_person='.intval( $person_id ) ?>" class="wecreativez-btn-delete wcc-delete-support-person"><?php esc_html_e( 'Delete', 'wa-customer-chat' ) ?></a>
                </td>
            </tr>

        <?php endforeach ?>

        <?php if ( count( $support_persons ) < 4  ) : ?>
        <tr>
            <th scope="row">
                <label></label>
            </th>
            <td>
                <a href="#" class="button button-primary wcc-add-support-person">
                    <?php esc_html_e( 'Add Support Person', 'wa-customer-chat' ) ?>
                </a>
            </td>
        </tr>
        <?php endif; ?>

    </tbody>

</table>

<form action="options.php" method="post">

    <?php settings_fields( 'wcc-admin-support-settings' ) ?>
    
    <table class="form-table">
        
        <tbody>
            
            <?php

                // Support Message
                $field->add( 'wp_editor',
                    array(
                        'label'             => esc_html__( 'Support Message', 'wa-customer-chat' ),
                        'id'                => 'wcc-support-settings-support-message',
                        'name'              => 'wcc_pro_support_settings[support_message]',
                        'value'             => wp_kses_post( $support_settings['support_message'] ),
                        'tooltip'           => esc_html__( 'Enter few words about your support.', 'wa-customer-chat' ),
                        'wp_editor_height'  => '130',
                    )
                );

                // Input Placeholder Text
                $field->add( 'text',
                    array(
                        'label'         => esc_html__( 'Input Placeholder Text', 'wa-customer-chat' ),
                        'name'          => 'wcc_pro_support_settings[placeholder_text]',
                        'value'         => esc_html( $support_settings['placeholder_text'] ),
                        'desc'          => wp_kses_post( sprintf( __( 'Use %s for person name.', 'wa-customer-chat' ), '<code>{{person_name}}</code>' ) ),
                        'tooltip'       => esc_html__( 'Enter the input placeholder text.', 'wa-customer-chat' ),
                    )
                );

            ?>

        </tbody>

    </table>

    <?php submit_button() ?>

</form>
<form action="#" method="post">

    <input type="hidden" name="wcc_edit_support_person[person_id]" value="<?php echo intval( $person_id ) ?>">

    <table class="form-table">
        
        <tbody>

            <?php

                // Contact Number
                $field->add( 'number',
                    array(
                        'label'         => esc_html__( 'Contact Number', 'wa-customer-chat' ),
                        'name'          => 'wcc_edit_support_person[contact_number]',
                        'step'          => '1',
                        'field_size'    => 'regular-text',
                        'value'         => esc_html( $support_persons[$person_id]['contact_number'] ),
                        'desc'          => esc_html__( 'Enter mobile phone number with the international country code, without + character. Example:  911234567890 for (+91) 1234567890', 'wa-customer-chat' ),
                    )
                );

                // Name
                $field->add( 'text',
                    array(
                        'label'         => esc_html__( 'Name', 'wa-customer-chat' ),
                        'name'          => 'wcc_edit_support_person[name]',
                        'value'         => esc_html( $support_persons[$person_id]['name'] ),
                        'desc'          => esc_html__( 'Enter the name of the support person.', 'wa-customer-chat' ),
                    )
                );

                // Title/ Designation
                $field->add( 'text',
                    array(
                        'label'         => esc_html__( 'Title/ Designation', 'wa-customer-chat' ),
                        'name'          => 'wcc_edit_support_person[title]',
                        'value'         => esc_html( $support_persons[$person_id]['title'] ),
                        'desc'          => esc_html__( 'Enter the title/ designation of the support person.', 'wa-customer-chat' ),
                    )
                );

                // Image
                $field->add( 'file',
                    array(
                        'label'         => esc_html__( 'Image', 'wa-customer-chat' ),
                        'id'            => 'wcc-add-support-person-image-button',
                        'name'          => 'wcc_edit_support_person[image]',
                        'value'         => esc_url( $support_persons[$person_id]['image'] ),
                        'desc'          => esc_html__( 'Upload support person image', 'wa-customer-chat' ),
                    )
                );

            ?>

        </tbody>
    
    </table>

    <?php submit_button( null, 'primary', 'wcc_edit_support_person_submit' ) ?>

</form>
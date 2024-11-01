<form action="#" method="post">

    <table class="form-table">
        
        <tbody>

            <?php

                // Contact Number
                $field->add( 'number',
                    array(
                        'label'         => esc_html__( 'Contact Number', 'wa-customer-chat' ),
                        'name'          => 'wcc_add_support_person[contact_number]',
                        'step'          => '1',
                        'field_size'    => 'regular-text',
                        'desc'          => esc_html__( 'Enter mobile phone number with the international country code, without + character. Example:  911234567890 for (+91) 1234567890', 'wa-customer-chat' ),
                    )
                );

                // Name
                $field->add( 'text',
                    array(
                        'label'         => esc_html__( 'Name', 'wa-customer-chat' ),
                        'name'          => 'wcc_add_support_person[name]',
                        'desc'          => esc_html__( 'Enter the name of the support person.', 'wa-customer-chat' ),
                    )
                );

                // Title/ Designation
                $field->add( 'text',
                    array(
                        'label'         => esc_html__( 'Title/ Designation', 'wa-customer-chat' ),
                        'name'          => 'wcc_add_support_person[title]',
                        'desc'          => esc_html__( 'Enter the title/ designation of the support person.', 'wa-customer-chat' ),
                    )
                );

                // Image
                $field->add( 'file',
                    array(
                        'label'         => esc_html__( 'Image', 'wa-customer-chat' ),
                        'id'            => 'wcc-add-support-person-image-button',
                        'name'          => 'wcc_add_support_person[image]',
                        'desc'          => esc_html__( 'Upload support person image', 'wa-customer-chat' ),
                    )
                );

            ?>

        </tbody>
    
    </table>

    <?php submit_button( null, 'primary', 'wcc_add_support_person_submit' ) ?>

</form>
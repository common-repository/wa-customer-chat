<div class="notice notice-warning is-dismissible" >
    <h3><?php esc_html_e( 'Leave A Review?', 'wa-customer-chat' ) ?></h3>
    <p>
        <?php
            printf(
                esc_html__( "We hope you've enjoyed using %s Would you consider leaving us a review on %s", 'wp-customer-chat-pro' ),
                '<strong>WhatsApp Customer Chat!</strong>',
                '<a href="https://codecanyon.net/downloads/" target="_blank">codecanyon.net?</a>'
            );
        ?>
    </p>

    <p>
        <a href="https://codecanyon.net/downloads/" class="button button-primary" target="_blank">
            <i class="wc-fa wc-fa-external-link"></i> <?php esc_html_e( "Sure! I'd love to!", 'wa-customer-chat' ) ?>
        </a>

        <a href="?wcc_admin_review=1" class="button button-secondary">
            <i class="wc-fa wc-fa-smile-o"></i> <?php esc_html_e( "I've already left a review", 'wa-customer-chat' ) ?>
        </a>

        <a href="?wcc_admin_review=1" class="button button-secondary">
            <i class="wc-fa wc-fa-times"></i> <?php esc_html_e( 'Never show again', 'wa-customer-chat' ) ?>
        </a>
    </p>

</div>
<div class="wcc-widget-navigation">
    <div class="wcc-widget-navigation--close" data-wcc-widget-trigger>
        <i class="wc-fa wc-fa-times"></i>
    </div>
</div>

<div class="wcc-widget-support">

    <?php if ( $this->support_persons ) : ?>
        <?php 
            foreach ( $this->support_persons as $person_id => $person ) :

                $person = new WCC_Support_Person( $person_id );

                if ( wp_is_mobile() ) {
                   
                    $url = "https://api.whatsapp.com/send?phone=" . $person->get_number();

                } else {

                    $url = "https://web.whatsapp.com/send?phone=" . $person->get_number();

                }

        ?>

            <a class="wcc-widget-support-person" href="<?php echo esc_url( $url ); ?>" target="_blank">
                <div class="wcc-widget-support-person__wrapper">
                    <img src="<?php echo esc_url( $person->get_image() ) ?>" alt="//">
                </div>
                <div class="wcc-widget-support-person__name"><?php echo esc_html( $person->get_name() ) ?></div>
                <div class="wcc-widget-support-person__title"><?php echo esc_html( $person->get_title() ) ?></div>
            </a>

        <?php endforeach; ?>
    <?php else: ?>

    <?php endif; ?>


</div>

<?php do_action( 'wcc_gdpr_compliance' ); ?>

<div class="wcc-widget-support-message">
    <div><?php echo wp_kses_post( $this->support_settings['support_message'] ); ?></div>
</div>
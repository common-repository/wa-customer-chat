<div class="flex-grid flex-grid-2">
    <div class="col">

        <div class="wecreativez-card">
            <h2><?php esc_html_e( 'Need Customization? Hire an Expert.', 'wa-customer-chat' ) ?></h2>
            <p><?php esc_html_e( 'We know it’s not easy to find a reliable WordPress expert at a price you can afford. We have a hand-picked team of professional, reliable, experienced and FRIENDLY experts.', 'wa-customer-chat' ) ?></p>
            <a href="<?php echo esc_url( '//wecreativez.com/hire-us/' ) ?>" class="button button-primary" target="_blank"><?php esc_html_e( 'Hire Now', 'wa-customer-chat' ) ?></a>
        </div>

    </div>
    <div class="col">

        <div class="wecreativez-card">
            <h2><?php esc_html_e( 'Customer Support.', 'wa-customer-chat' ) ?></h2>
            <p><?php esc_html_e( 'If you need instant support then choose following options. Our support will reply as soon as possible after you send us a message.' ) ?></p>
            <p><i class="wc-fa wc-fa-envelope"></i> <a href="mailto:sonukaushalssk@gmail.com">sonukaushalssk@gmail.com</a></p>
        </div>

    </div>
</div>

<div class="flex-grid flex-grid-2">
    <div class="col">
        
        <div class="wecreativez-card">
            <h2><?php esc_html_e( 'Share Debug Report With Our Support Team.', 'wa-customer-chat' ) ?></h2>
            <p><?php esc_html_e( 'Generate, download, and share the debug report with our experts. Report contains site URL, WP version, list of activated plugins and plugin options setting.', 'wa-customer-chat' ) ?></p>
            <p><i class="wc-fa wc-fa-envelope"></i> <a href="mailto:sonukaushalssk@gmail.com">sonukaushalssk@gmail.com</a></p>
            <p>
                <?php if ( ! isset( $_GET['debug_report_generated'] ) ) : ?>
                    <a href="?wcc_generate_debug_report=1" class="button button-primary"><?php esc_html_e( 'Generate Now', 'wa-customer-chat' ) ?></a>
                <?php else: ?>
                    <a href="<?php echo content_url( 'uploads/wcc-debug-report/report.html' ) ?>" class="button button-primary" download><?php esc_html_e( 'Download Report', 'wa-customer-chat' ) ?></a> <i class="wc-fa wc-fa-check"></i>
                <?php endif; ?>
            </p>
       </div>
        
    </div>
    <div class="col">

                

    </div>
</div>




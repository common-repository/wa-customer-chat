<div class="wrap">
    
    <h1><?php esc_html_e( 'WhatsApp Customer Chat', 'wc-whatsapp-care' ); ?></h1>

    <?php do_action( 'wcc_admin_notifications' ) ?>
    <?php settings_errors(); ?>

    <hr>

    <h2 class="nav-tab-wrapper">

        <!-- Appearance Tab -->
        <a href="?page=wa-customer-chat" class="nav-tab <?php echo ( ! $tab ) ? 'nav-tab-active' : ''; ?>">
            <i class="wc-fa wc-fa-paint-brush"></i> <?php esc_html_e( 'Appearance', 'wa-customer-chat')?>
        </a><!-- Appearance Tab -->


        <!-- Basic Settings Tab -->
        <a href="?page=wa-customer-chat&tab=basic_settings" class="nav-tab <?php echo ( $tab == 'basic_settings' ) ? 'nav-tab-active' : ''; ?>">
            <i class="wc-fa wc-fa-gear"></i> <?php esc_html_e( 'Basic Settings', 'wa-customer-chat' )?>
        </a><!-- Basic Settings Tab -->

        <!-- Support Persons -->
        <a href="?page=wa-customer-chat&tab=support_persons" class="nav-tab <?php echo ( $tab == 'support_persons' ) ? 'nav-tab-active' : ''; ?>">
            <i class="wc-fa wc-fa-users"></i> <?php esc_html_e( 'Support Persons', 'wa-customer-chat' )?>
        </a><!-- Support Persons -->

        <!-- Plugin Support Tab -->
        <a href="?page=wa-customer-chat&tab=plugin_support" class="nav-tab <?php echo ( $tab == 'plugin_support' ) ? 'nav-tab-active' : ''; ?>">
            <i class="wc-fa wc-fa-question"></i> <?php esc_html_e( 'Plugin Support', 'wa-customer-chat' ) ?>
        </a><!-- Plugin Support Tab -->

    </h2>
    

    <?php

        if ( $_GET['page'] == 'wa-customer-chat' && ! $tab ) {
            require_once WCC_ABSPATH . 'views/admin/admin-appearance-settings.php';
        }

        if ( $_GET['page'] == 'wa-customer-chat' && $tab == 'basic_settings' ) {
            require_once WCC_ABSPATH . 'views/admin/admin-basic-settings.php';
        }

        if ( $_GET['page'] == 'wa-customer-chat' && $tab == 'support_persons' ) {
            require_once WCC_ABSPATH . 'views/admin/admin-support-persons-settings.php';
        }

        if ( $_GET['page'] == 'wa-customer-chat' && $tab == 'gdpr' ) {
            require_once WCC_ABSPATH . 'views/admin/admin-gdpr-settings.php';
        }

        if ( $_GET['page'] == 'wa-customer-chat' && $tab == 'plugin_support' ) {
            require_once WCC_ABSPATH . 'views/admin/admin-plugin-support.php';
        }
        
    ?>

</div>
<div class="wcc-widget">
    
    <div class="wcc-widget-popup" data-wcc-widget-status="0">
        
        <div class="wcc-widget-popup__header">
            <img src="<?php echo apply_filters( 'wcc_widget_header_pattern', esc_url( WCC_URL . 'assets/images/header-pattern.png' ) ) ?>" alt="//">
        </div>

        <div class="wcc-widget-ajax">
        
            <?php require_once WCC_ABSPATH . 'views/multi-persons.php'; ?>
            
        </div>

    </div>
    
    <div class="wcc-widget-popup__footer">
        <div class="wcc-widget-trigger" data-wcc-widget-trigger>
            <i class="wc-fa wc-fa-whatsapp"></i>
        </div>
    </div>

</div>
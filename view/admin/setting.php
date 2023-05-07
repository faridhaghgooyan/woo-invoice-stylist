<div id="woo-invoice-stylist-page" class="wrap">
    <!-- Page Title -->
    <h1>
        <?php _e('Woo Invoice Stylist','woo-invoice-stylist'); ?>
    </h1>

    <!-- Tabs -->
    <h2 class="nav-tab-wrapper">
        <a href="#general" class="nav-tab nav-tab-active">
            <?php _e('General','woo-invoice-stylist'); ?>
        </a>
        <a href="#identity" class="nav-tab">
            <?php _e('Identity','woo-invoice-stylist'); ?>
        </a>
        <a href="#styles" class="nav-tab">
            <?php _e('Styles','woo-invoice-stylist'); ?>
        </a>
        <a href="#about" class="nav-tab">
            <?php _e('About','woo-invoice-stylist'); ?>
        </a>
    </h2>

    <!-- Tab Contents -->
    <form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="action" value="woo_invoice_stylist_action">
        <!-- General Setting -->
        <?php \inc\ViewLoader::LoadView('admin','parts/setting/setting-general'); ?>

        <!-- Identity Setting -->
        <?php \inc\ViewLoader::LoadView('admin','parts/setting/setting-identity'); ?>

        <!-- Styles Setting -->
        <?php \inc\ViewLoader::LoadView('admin','parts/setting/setting-styles'); ?>

        <!-- About -->
        <?php \inc\ViewLoader::LoadView('admin','parts/setting/setting-about'); ?>

        <hr>
        <!-- Form Actions -->
        <button><?php _e('Save','woo-invoice-stylist'); ?></button>
    </form>
</div>

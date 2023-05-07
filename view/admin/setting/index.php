<?php

?>
<div id="woo-invoice-stylist-page" class="wrap">
    <h1>
        <?php _e('Setting','woo-invoice-stylist'); ?>
    </h1>
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
    </h2>
    <form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="action" value="woo_invoice_stylist_action">
        <!-- General Setting -->
        <?php wc_get_template('setting-general.php'); ?>
        <div id="general" class="woo-invoice-stylist-tab">
            <label>
                <small class="field-title">
                    <?php _e('Invoice Title','woo-invoice-stylist'); ?>
                </small>
                <input type="text" required
                       name="title"
                       placeholder="<?php _e('Invoice Title','woo-invoice-stylist'); ?>"
                       value="<?php echo \inc\Setting::GetSetting('title') ?>">
            </label>
            <label>
                <small class="field-title">
                    <?php _e('Invoice Tel','woo-invoice-stylist'); ?>
                </small>
                <input type="text" required
                       name="tel"
                       placeholder="<?php _e('Invoice Tel','woo-invoice-stylist'); ?>"
                       value="<?php echo \inc\Setting::GetSetting('tel') ?>">
            </label>
            <label>
                <small class="field-title">
                    <?php _e('Website','woo-invoice-stylist'); ?>
                </small>
                <input type="text" required 
                       name="website"
                       placeholder="<?php _e('Website','woo-invoice-stylist'); ?>"
                       value="<?php echo \inc\Setting::GetSetting('website') ?>">
            </label>
            <label>
                <small class="field-title">
                    <?php _e('Invoice Mobile','woo-invoice-stylist'); ?>
                </small>
                <input type="text" required
                       name="mobile"
                       placeholder="<?php _e('Invoice Mobile','woo-invoice-stylist'); ?>"
                       value="<?php echo \inc\Setting::GetSetting('mobile') ?>">
            </label>
            <label>
                <small class="field-title">
                    <?php _e('Invoice Fax','woo-invoice-stylist'); ?>
                </small>
                <input type="text" required
                       name="fax"
                       placeholder="<?php _e('Invoice Fax','woo-invoice-stylist'); ?>"
                       value="<?php echo \inc\Setting::GetSetting('fax') ?>">
            </label>
            <label>
                <small class="field-title">
                    <?php _e('Invoice Address','woo-invoice-stylist'); ?>
                </small>
                <textarea name="address" required
                          placeholder="<?php _e('Invoice Address','woo-invoice-stylist'); ?>"
                          rows="3"><?php echo \inc\Setting::GetSetting('address') ?></textarea>
            </label>

        </div>
        <!-- Identity Setting -->
        <div id="identity" class="woo-invoice-stylist-tab" style="display:none">
            <label>
                <small class="field-title">
                    <?php _e('Invoice Logo','woo-invoice-stylist'); ?>
                </small>
                <input type="file" name="logo">
                <img src="<?php echo \inc\Setting::GetSetting('logo') ?>" height="50">
            </label>
            <label>
                <small class="field-title">
                    <?php _e('Invoice Signature','woo-invoice-stylist'); ?>
                </small>
                <input type="file" name="signature">
                <img src="<?php echo \inc\Setting::GetSetting('signature') ?>" height="50">
            </label>
        </div>
        <!-- Styles Setting -->
        <div id="styles" class="woo-invoice-stylist-tab" style="display:none">
            <?php \inc\ViewLoader::LoadView('admin','setting/style-shots'); ?>
        </div>
        <button><?php _e('Save','woo-invoice-stylist'); ?></button>
        <button><?php _e('Reset Setting','woo-invoice-stylist'); ?></button>
    </form>
</div>

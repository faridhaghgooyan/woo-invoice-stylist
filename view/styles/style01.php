
<section id="woo-invoice-stylist-style1" class="invoice-style">
    <div class="header" style="background-image: url(http://localhost/wp-content/uploads/2023/04/style1-back-rtl.jpg)">
        <!--Invoice Store Info-->
        <div class="identity">
            <img src="<?php echo \inc\Setting::GetSetting('logo') ?>" class="invoice-logo" alt="">
            <div class="invoice-store-info">
                <h4 class="invoice-itle">
                    <?php echo \inc\Setting::GetSetting('title') ?>
                </h4>
                <span class="website">
                    <?php echo \inc\Setting::GetSetting('website') ?>
                </span>
            </div>
        </div>
        <!--Invoice ID & Date-->
        <div class="invoice-id-and-date">
            <div class="id">
                <?php _e('Invoice ID','woo-invoice-stylist'); ?>
                :
                <?php echo $order->get_id() ?>
            </div>
            <div class="date">
                <?php _e('Invoice Date','woo-invoice-stylist'); ?>
                :
                <?php //echo $order->get_date_modified() ?>
                <?php echo wc_format_datetime( $order->get_date_created() , 'j F, Y' ) ?>
            </div>
        </div>
    </div>
    <div class="body">

        <!--Customer Name and Phone-->
        <div class="invoice-customer-name-and-phone">
            <h6 class="customer-name">
                <?php _e('Invoice Customer Name','woo-invoice-stylist'); ?>
                :
                <?php echo $order->get_formatted_billing_full_name() ?>
            </h6>
            <h6 class="customer-phone">
                <?php _e('Invoice Customer Phone','woo-invoice-stylist'); ?>
                :
                <?php echo $order->get_billing_phone() ?>
            </h6>
        </div>
        <!--Invoice Items-->
        <table cellpadding="0" cellspacing="0">
            <thead>
            <tr>
                <th><?php _e('Description','woo-invoice-stylist'); ?></th>
                <th><?php _e('Quantity','woo-invoice-stylist'); ?></th>
                <th>
                    <?php _e('Line Price','woo-invoice-stylist'); ?>
                    - تومان
                </th>
                <th>
                    <?php _e('Total Price','woo-invoice-stylist'); ?>
                    - تومان
                </th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($order->get_items() as $item_id => $item) : ?>
            <tr>
                <td><?php echo $item->get_name() ?></td>
                <td><?php echo $item->get_quantity() ?></td>
                <td><?php echo $item->get_total() / $item->get_quantity()  ?></td>
                <td><?php echo $item->get_total()  ?></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="2">
                    <?php echo \inc\Setting::GetSetting('title') ?>
                    <?php echo \inc\Setting::GetSetting('tel') ?>
                </td>
                <td><?php _e('Total Amount','woo-invoice-stylist'); ?></td>
                <td>
                    <?php echo number_format($order->get_total()) ?>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
    <div class="footer">
        <!--Store Signature-->
        <div class="store-signature">
            <?php _e('Store Signature','woo-invoice-stylist'); ?>
            <img src="<?php echo \inc\Setting::GetSetting('signature') ?>" />
        </div>
        <div class="user-signature">
            <?php _e('User Signature','woo-invoice-stylist'); ?>
        </div>
        <!--Use Signature-->
    </div>
    <!--Invoice Actions-->
    <div class="invoice-actions">
        <button class="print-action" onclick="WooInvoiceStylistPrint(event)">
            <?php _e('Print','woo-invoice-stylist'); ?>
        </button>
        <button class="save-pdf-action" onclick="WooInvoiceStylistSavePDF(event)">
            <?php _e('Save As PDF','woo-invoice-stylist'); ?>
        </button>
    </div>
</section>
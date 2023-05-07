<!--Woo Invoice Stylist Start | Style 01-->
<section id="woo-invoice-stylist" class="style01">
    <!--Invoice Header Start-->
    <div class="invoice-header">
        <img src="<?php echo \inc\Setting::GetSetting('logo') ?>" alt="Store Logo" class="logo">
        <div class="store-info">
            <h5 class="store-name">
                <?php echo \inc\Setting::GetSetting('title') ?>
            </h5>

            <p class="store-address">
                <?php echo \inc\Setting::GetSetting('address') ?>
            </p>
            <p class="store-website">
                <?php echo \inc\Setting::GetSetting('website') ?>
            </p>
            <p class="store-phone">
                <?php echo \inc\Setting::GetSetting('tel') ?>
            </p>
            <p class="store-fax">
                <?php echo \inc\Setting::GetSetting('fax') ?>
            </p>
        </div>
        <div class="invoice-date-and-id">
            <span class="invoice-title">
                <?php _e('invoice','woo-invoice-stylist'); ?>
            </span>
            <span class="date">
                <?php echo $data->order->dates->created ?>
            </span>
            <span class="id">
                # <?php echo $data->order->invoice_id ?>
            </span>
        </div>
    </div>
    <!--Invoice Header End-->

    <!--Invoice Body Start-->
    <div class="invoice-body">
        <!--Customer Info-->
        <div class="billing-info">
            <h5 class="billing-title">
                <?php _e('bill to','woo-invoice-stylist'); ?>
            </h5>
            <ul class="info-list">
                <?php
                    foreach ( $data->order->billing as $key => $item ) {
                        $label = ucwords(str_replace('_', ' ', $key));
                        echo "<li class='info-item'> <span class='label-name'>{$label}:</span>  {$item}  </li>";
                    }
                ?>
            </ul>
        </div>
        <div class="shipping-info">
            <h5 class="shipping-title">
                <?php _e('ship to','woo-invoice-stylist'); ?>
            </h5>
            <ul class="info-list">
                <?php
                foreach ( $data->order->shipping as $key => $item ) {
                    $label = ucwords(str_replace('_', ' ', $key));
                    echo "<li class='info-item'> <span class='label-name'>{$label}:</span> {$item}  </li>";
                }
                ?>
            </ul>
        </div>
        <!--Order Info-->
        <table class="order-items has-background">
            <thead>
            <tr>
                <th>description</th>
                <th>qty</th>
                <th>unit price</th>
                <th>total</th>
            </tr>
            </thead>
            <?php foreach ($data->order->items as $item_id => $item) {
                echo "
                <tr>
                    <td>{$item->name}</td>
                    <td>{$item->quantity}</td>
                    <td>
                        {$data->order->currency_symbol} 
                        {$item->subtotal}
                    </td>
                    <td>
                        {$data->order->currency_symbol} 
                        {$item->total}
                    </td>
                </tr>
                ";
            }?>
            <tbody>
            </tbody>
        </table>
        <!--Order Summary-->
        <div class="order-summary-wrapper">
            <ul class="order-summary">
                <li class="summary-item">
                    <div class="item-title">SUBTOTAL</div>
                    <div class="item-value">
                        <?php echo $data->order->currency_symbol ?>
                        <?php echo $data->order->costs->subtotal ?>
                    </div>
                </li>
                <li class="summary-item">
                    <div class="item-title">DISCOUNT</div>
                    <div class="item-value">
                        <?php echo $data->order->currency_symbol ?>
                        <?php echo $data->order->costs->discount ?>
                    </div>
                </li>
                <li class="summary-item">
                    <div class="item-title">TOTAL TAX</div>
                    <div class="item-value">
                        <?php echo $data->order->currency_symbol ?>
                        <?php echo $data->order->costs->tax ?>
                    </div>
                </li>
                <li class="summary-item">
                    <div class="item-title">SHIPPING</div>
                    <div class="item-value">
                        <?php echo $data->order->currency_symbol ?>
                        <?php echo $data->order->costs->shipping ?>
                    </div>
                </li>
                <li class="summary-item">
                    <div class="item-title">Balance Due</div>
                    <div class="item-value">
                        <?php echo $data->order->currency_symbol ?>
                        <?php echo $data->order->costs->total ?>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!--Invoice Body End-->

    <!--Invoice Footer Start-->
    <div class="invoice-footer"></div>
    <!--Invoice Footer End-->

</section>
<!--Woo Invoice Stylist End | Style 01-->
<section id="woo-invoice-stylist-actions">
    <button onclick="WooInvoiceStylist.Print(event)"><?php _e('Print','woo-invoice-stylist'); ?></button>
    <button onclick="WooInvoiceStylist.SaveAsPDF(event)"><?php _e('Save As PDF','woo-invoice-stylist'); ?></button>
</section>
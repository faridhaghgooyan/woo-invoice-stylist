<!--Woo Invoice Stylist Start | Style 02-->
<section id="invoice-stylist" class="style02">
    <!--Invoice Header Start-->
    <div class="invoice-header d-flex justify-content-between align-items-center">
        <div class="featured-image-wrapper w-50">
            <img src="<?php echo $data->setting->logo ?>" alt="Store Logo" class="logo w-50">
        </div>
        <h3 class="invoice-keyword w-50 font-size-xl text-right m-0">
            <?php _e('invoice','invoice-stylist'); ?>
        </h3>
    </div>
    <!--Invoice Header End-->
    <div class="invoice-info d-flex justify-content-between">
        <div class="invoice-to d-flex">
            <h5 class="invoice-ti-title font-size-m font-bold uppercase m-0">
                <?php _e('invoice to:','invoice-stylist'); ?>
            </h5>
            <ul class="info-list list-style-none">
                <?php
                foreach ( $data->order->billing as $key => $item ) {
                    $label = ucwords(str_replace('_', ' ', $key));
                    if( $key === 'full_name' ){
                        echo "<li class='info-item color-primary font-size-l'> {$item}  </li>";
                        continue;
                    }
                    echo "<li class='info-item font-size-s'> {$item}  </li>";
                }
                ?>
            </ul>
        </div>
        <div class="invoice-no-date text-right">
            <div class="invoice-no">
                <h5 class="title font-size-m font-bold uppercase m-0">
                    <?php _e('invoice no','invoice-stylist'); ?>
                </h5>
                <span class="content font-light color-primary">
                        #<?php echo $data->order->invoice_id ?>
                    </span>
            </div>
            <div class="invoice-date">
                <h5 class="title font-size-m font-bold uppercase m-0">
                    <?php _e('date','invoice-stylist'); ?>
                </h5>
                <span class="content font-light color-primary">
                    <?php echo $data->order->dates->created ?>
                </span>
            </div>
        </div>
    </div>

    <!--Invoice Body Start-->
    <div class="invoice-body">
        <!--Order Info-->
        <table class="order-items has-background my-1">
            <thead>
            <tr class="color-black">
                <th>No</th>
                <th>item description</th>
                <th>qty</th>
                <th>price</th>
                <th>total</th>
            </tr>
            </thead>
            <?php foreach ($data->order->items as $item_id => $item) {
                echo "
                <tr class='text-center'>
                    <td>{$item->id}</td>
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
        <div class="order-summary-wrapper d-flex justify-content-between">
            <div class="w-60">
                <h5 class="font-size-m font-bold uppercase m-0">
                    <?php _e('payment method:','invoice-stylist'); ?>
                </h5>
                <h5 class="font-size-s font-bold uppercase m-0">
                    <?php echo $data->order->gateway ?>
                </h5>
                <h5 class="font-size-xs font-light m-0">
                    mrhaghgooyan@gmail.com
                </h5>
            </div>
            <div class="w-40">
                <ul class="order-summary list-style-none font-size-s m-0">
                    <li class="summary-item d-flex justify-content-between font-bold">
                        <div class="item-title">SUBTOTAL</div>
                        <div class="item-value">
                            <?php echo $data->order->currency_symbol ?>
                            <?php echo $data->order->costs->subtotal ?>
                        </div>
                    </li>
                    <li class="summary-item d-flex justify-content-between font-bold">
                        <div class="item-title">DISCOUNT</div>
                        <div class="item-value">
                            <?php echo $data->order->currency_symbol ?>
                            <?php echo $data->order->costs->discount ?>
                        </div>
                    </li>
                    <li class="summary-item d-flex justify-content-between font-bold">
                        <div class="item-title">TOTAL TAX</div>
                        <div class="item-value">
                            <?php echo $data->order->currency_symbol ?>
                            <?php echo $data->order->costs->tax ?>
                        </div>
                    </li>
                    <li class="summary-item d-flex justify-content-between font-bold">
                        <div class="item-title">SHIPPING</div>
                        <div class="item-value">
                            <?php echo $data->order->currency_symbol ?>
                            <?php echo $data->order->costs->shipping ?>
                        </div>
                    </li>
                    <li class="summary-item d-flex justify-content-between font-bold border-top color-primary">
                        <div class="item-title">Balance Due</div>
                        <div class="item-value">
                            <?php echo $data->order->currency_symbol ?>
                            <?php echo $data->order->costs->total ?>
                        </div>
                    </li>
                </ul>
                <div class="text-center my-3">
                    <img src="<?php echo $data->setting->signature ?>" alt="Store Signature" class="signature w-75 mx-auto">
                    <h5 class="font-size-l border-top">
                        <?php echo $data->setting->title ?>
                    </h5>
                </div>
            </div>

        </div>
    </div>
    <!--Invoice Body End-->

    <!--Invoice Footer Start-->
    <div class="invoice-footer">
        <p class="store-phone m-0">
            <b>Phone: </b>
            <?php echo $data->setting->tel ?>
        </p>
        <p class="store-website m-0">
            <b>Website: </b>
            <?php echo $data->setting->website ?>
        </p>
    </div>
    <!--Invoice Footer End-->

</section>
<!--Woo Invoice Stylist End | Style 01-->
<section id="invoice-stylist-actions">
    <button onclick="WooInvoiceStylist.Print(event)"><?php _e('Print','invoice-stylist'); ?></button>
    <button onclick="WooInvoiceStylist.SaveAsPDF(event)"><?php _e('Save As PDF','invoice-stylist'); ?></button>
</section>
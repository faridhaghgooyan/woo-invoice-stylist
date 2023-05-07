<div id="identity" class="woo-invoice-stylist-tab" style="display:none">
    <?php
    foreach (\inc\Config::InvoiceFields('identity') as $field)
        \inc\Config::InvoiceFieldHTML( $field );
    ?>
</div>

<div id="general" class="woo-invoice-stylist-tab">
    <div class="general-box">
        <div class="box-content">
            <h5>Billing Available Options</h5>
            <label for="">
                <input type="checkbox" name="billing_fields[country]"
                    <?php \inc\Config::CheckInvoiceOption('billing_fields','country') ?>>
                Country
            </label>
            <label for="">
                <input type="checkbox" name="billing_fields[state]"
                    <?php \inc\Config::CheckInvoiceOption('billing_fields','state') ?>>
                State
            </label>
            <label for="">
                <input type="checkbox" name="billing_fields[city]"
                    <?php \inc\Config::CheckInvoiceOption('billing_fields','city') ?>>
                City
            </label>
            <label for="">
                <input type="checkbox" name="billing_fields[address_1]"
                    <?php \inc\Config::CheckInvoiceOption('billing_fields','address_1') ?>>
                Address 1
            </label>
            <label for="">
                <input type="checkbox" name="billing_fields[address_2]"
                    <?php \inc\Config::CheckInvoiceOption('billing_fields','address_2') ?>>
                Address 2
            </label>
            <label for="">
                <input type="checkbox" name="billing_fields[full_address]"
                    <?php \inc\Config::CheckInvoiceOption('billing_fields','full_address') ?>>
                Full Address
            </label>
            <label for="">
                <input type="checkbox" name="billing_fields[post_code]"
                    <?php \inc\Config::CheckInvoiceOption('billing_fields','post_code') ?>>
                Post Code
            </label>
            <label for="">
                <input type="checkbox" name="billing_fields[first_name]"
                    <?php \inc\Config::CheckInvoiceOption('billing_fields','first_name') ?>>
                First Name
            </label>
            <label for="">
                <input type="checkbox" name="billing_fields[last_name]"
                    <?php \inc\Config::CheckInvoiceOption('billing_fields','last_name') ?>>
                Last Name
            </label>
            <label for="">
                <input type="checkbox" name="billing_fields[full_name]"
                    <?php \inc\Config::CheckInvoiceOption('billing_fields','full_name') ?>>
                Full Name
            </label>
            <label for="">
                <input type="checkbox" name="billing_fields[email]"
                    <?php \inc\Config::CheckInvoiceOption('billing_fields','email') ?>>
                Email
            </label>
        </div>
    </div>
    <div class="general-box">
        <div class="box-content">
            <h5>Shipping Available Options</h5>
            <label for="">
                <input type="checkbox" name="shipping_fields[country]"
                    <?php \inc\Config::CheckInvoiceOption('shipping_fields','country') ?>>
                Country
            </label>
            <label for="">
                <input type="checkbox" name="shipping_fields[state]"
                    <?php \inc\Config::CheckInvoiceOption('shipping_fields','state') ?>>
                State
            </label>
            <label for="">
                <input type="checkbox" name="shipping_fields[city]"
                    <?php \inc\Config::CheckInvoiceOption('shipping_fields','city') ?>>
                City
            </label>
            <label for="">
                <input type="checkbox" name="shipping_fields[address_1]"
                    <?php \inc\Config::CheckInvoiceOption('shipping_fields','address_1') ?>>
                Address 1
            </label>
            <label for="">
                <input type="checkbox" name="shipping_fields[address_2]"
                    <?php \inc\Config::CheckInvoiceOption('shipping_fields','address_2') ?>>
                Address 2
            </label>
            <label for="">
                <input type="checkbox" name="shipping_fields[full_address]"
                    <?php \inc\Config::CheckInvoiceOption('shipping_fields','full_address') ?>>
                Full Address
            </label>
            <label for="">
                <input type="checkbox" name="shipping_fields[post_code]"
                    <?php \inc\Config::CheckInvoiceOption('shipping_fields','post_code') ?>>
                Post Code
            </label>
            <label for="">
                <input type="checkbox" name="shipping_fields[first_name]"
                    <?php \inc\Config::CheckInvoiceOption('shipping_fields','first_name') ?>>
                First Name
            </label>
            <label for="">
                <input type="checkbox" name="shipping_fields[last_name]"
                    <?php \inc\Config::CheckInvoiceOption('shipping_fields','last_name') ?>>
                Last Name
            </label>
            <label for="">
                <input type="checkbox" name="shipping_fields[full_name]"
                    <?php \inc\Config::CheckInvoiceOption('shipping_fields','full_name') ?>>
                Full Name
            </label>
            <label for="">
                <input type="checkbox" name="shipping_fields[method]"
                    <?php \inc\Config::CheckInvoiceOption('shipping_fields','method') ?>>
                Method
            </label>
        </div>
    </div>
    <hr>
    <div class="general-box">
        <div class="box-content">
            <h5>Base Color</h5>
            <label for="">
                <input type="color" name="base_color"
                       value="<?php echo \inc\Config::LoadConfig()['setting']['base_color'] ?>">
                Color
            </label>
        </div>
    </div>
</div>
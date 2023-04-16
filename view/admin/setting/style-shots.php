<?php
foreach (\inc\WooInvoiceStylist::$styles as $style){
    $checked = $style === \inc\Setting::GetSetting('style') ? 'checked' : '';
    $screen_shot = plugin_dir_url(dirname(__FILE__,3)) . 'assets/images/style-shots/' . $style . '.png';
    echo "
        <div class='style-shot'>
            <div class='content'>
                <img src='$screen_shot' alt='$style'>
                <input $checked type='radio' name='style' value='$style'>
                <h5 class='style-name'>$style</h5>
            </div>
        </div>
    ";
}
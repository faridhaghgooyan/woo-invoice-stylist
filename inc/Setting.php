<?php

namespace inc;

class Setting extends WooInvoiceStylist
{
    public static function GetSetting( $key = null )
    {
        $defaults = [
            'style'          =>  'style01',
            'logo'           =>  plugin_dir_url(dirname(__FILE__)) . 'assets/images/logo.png',
            'signature'      =>  plugin_dir_url(dirname(__FILE__)) . 'assets/images/signature.png',
            'title'          => __('Woo Invoice Stylist','woo-invoice-stylist'),
            'website'        => 'www.mrhaghgooyan.com',
            'tel'            => '+49.15783500000',
            'mobile'         => '+49.15783500000',
            'fax'            => '+49.15783500000',
            'address'        => 'Nuremberg, Germany',
        ];
        $setting_file = plugin_dir_path(dirname(__FILE__)) . 'setting.json';
        $user_setting = json_decode(file_get_contents($setting_file),true);
        if ( !$key ) return (object)array_merge($defaults,$user_setting);
        return array_merge($defaults,$user_setting)[$key];
    }
    public static function UpdateSetting() : void
    {
        $setting_file = plugin_dir_path(dirname(__FILE__)) . 'setting.json';
        $current_setting = json_decode( file_get_contents( $setting_file ) );

        $current_setting->setting = [
            'base_color'     => $_POST['base_color'],
            'style'          => $_POST['style'],
            'title'          => $_POST['title'],
            'website'        => $_POST['website'],
            'tel'            => $_POST['tel'],
            'mobile'         => $_POST['mobile'],
            'fax'            => $_POST['fax'],
            'address'        => $_POST['address'],
            'logo'           => self::UpdateLogo($_FILES),
            'signature'      => self::UpdateSignature($_FILES),
        ];

        if ($_POST['billing_fields']){
            $current_setting->billing_fields = array_keys($_POST['billing_fields']);
        }
        if ($_POST['shipping_fields']){
            $current_setting->shipping_fields = array_keys($_POST['shipping_fields']);
        }

        file_put_contents( $setting_file, json_encode( $current_setting ) );
        // Redirect back to the previous page
        $redirect_url = wp_get_referer();
        wp_redirect( $redirect_url );
        exit;
    }
    private static function UpdateLogo($files) : string
    {
        $default = plugin_dir_url(dirname(__FILE__)) . 'assets/images/logo.png';
        if ( isset( $files['logo'] ) && ! empty( $files['logo']['name'] ) ){
            $default = WooInvoiceStylist::UploadMedia( $files['logo']) ?? $default;
        }
        return $default;
    }
    private static function UpdateSignature($files) : string
    {
        $default = plugin_dir_url(dirname(__FILE__)) . 'assets/images/signature.png';
        if ( isset( $files['signature'] ) && ! empty( $files['signature']['name'] ) ){
            $default = WooInvoiceStylist::UploadMedia( $files['signature'] ) ?? $default;
        }
        return $default;
    }
}
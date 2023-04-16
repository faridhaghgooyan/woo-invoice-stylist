<?php

namespace inc;
use inc\{
    AdminNavigation,
    Assets,
    Setting
};
class WooInvoiceStylist
{
    public static string $app_name = 'woo-invoice-stylist';
    public static array $styles = [
        'style01',
    ];
    public static function init() : void
    {
        add_action('admin_menu', array(AdminNavigation::class,'AddMenuItem'));
        add_action('admin_enqueue_scripts', array(Assets::class,'LoadAssets'));
        add_action('wp_enqueue_scripts', array(Assets::class,'LoadAssets'));
        add_action( 'woocommerce_account_view-order_endpoint', array(self::class,'LoadInvoiceTemplate') );
        add_action( 'admin_post_woo_invoice_stylist_action', array(Setting::class,'UpdateSetting') );
        add_action( 'admin_post_nopriv_woo_invoice_stylist_action', array(Setting::class,'UpdateSetting') );
        add_action( 'plugins_loaded', array(self::class,'RegisterTranslator') );
    }
    public static function RegisterTranslator() : void
    {
        $plugin_dir = basename( dirname( __FILE__,2 ) ) . '/languages/';
        load_plugin_textdomain( self::$app_name, false, $plugin_dir );
    }
    public static function LoadInvoiceTemplate( $order_id ): void
    {
        $template_root = plugin_dir_path( dirname(__FILE__) ) . 'view/styles/';
        $order = wc_get_order( $order_id );
        $order->get_items();
        $setting = new Setting();
        // Get Template
        wc_get_template(
            'style01.php',
            [
                'order'              => wc_get_order( $order_id ),
                'setting'  => $setting
            ],
            '',
            $template_root
        );
    }
    protected static function UploadMedia( $file )
    {
        $id = str_replace(['(',')','_','?','!'],'',pathinfo($file['name'],PATHINFO_FILENAME));
        if ($id != 'logo'){

        }

        $attachment_id = media_handle_upload( $id, 0 );
        if ( is_wp_error( $attachment_id ) ) {
            $error_message = $attachment_id->get_error_message();
            return null;
        } else {
            // The logo was uploaded successfully
            return wp_get_attachment_url( $attachment_id );
        }
    }
}
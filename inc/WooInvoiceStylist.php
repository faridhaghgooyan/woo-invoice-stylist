<?php
declare(strict_types=1);
namespace inc;
use inc\{
    Config,
    AdminNavigation,
    Assets,
    Order,
    Translator,
    Template,
    Setting
};
class WooInvoiceStylist
{
    public static string $app_name = 'woo-invoice-stylist';
    public static array $styles = [
        'style01' => 'woo classic',
        'style02' => 'modernized',
    ];
    public static object $config;
    public static function init() : void
    {
        self::$config = (object)Config::LoadConfig();
        add_action('admin_menu', array(AdminNavigation::class,'AddMenuItem'));
        add_action('admin_enqueue_scripts', array(Assets::class,'LoadAdminAssets'));
        add_action('wp_enqueue_scripts', array(Assets::class,'LoadAssets'));
        add_filter( 'woocommerce_locate_template', array(Template::class,'LoadTemplate') , 10, 3 );
        add_action( 'admin_post_woo_invoice_stylist_action', array(Setting::class,'UpdateSetting') );
        add_action( 'admin_post_nopriv_woo_invoice_stylist_action', array(Setting::class,'UpdateSetting') );
        add_action( 'plugins_loaded', array(Translator::class,'RegisterTranslator') );
    }
    protected static function UploadMedia( $file , $old_path = '' ) : string
    {
        $upload_overrides = array( 'test_form' => false );
        $movefile = wp_handle_upload( $file, $upload_overrides );

        if ( $movefile && !isset($movefile['error']) ) {
            // File was successfully uploaded
            $file_url = $movefile['url'];
            return $file_url;
        } else {
            // Error uploading the file
            return $old_path;
        }
    }
}
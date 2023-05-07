<?php

namespace inc;
use inc\{
    Config
};

class Assets extends WooInvoiceStylist
{
    public static function LoadAdminAssets() : void
    {
        $root = plugin_dir_url( dirname( __FILE__ ) ) . 'assets/';
        // Global Style
        wp_enqueue_style( 'woo-invoice-stylist-global', $root . 'css/main.css' );
        // Admin Style
        wp_enqueue_style( 'woo-invoice-stylist-admin', $root . 'admin/css/admin.css' );

        // Scripts
        wp_enqueue_script(
            'woo-invoice-stylist-script-admin',
            $root . 'admin/js/admin.js',
            array('jquery'),
            '1.0',
            true
        );
    }
    public static function LoadAssets() : void
    {
        $root = plugin_dir_url( dirname( __FILE__ ) ) . 'assets/';
        // Global Style and script
        wp_enqueue_style( 'bootstrap', $root . 'css/bootstrap-grid.min.css' );
        wp_enqueue_style( 'woo-invoice-stylist', $root . 'css/main.css' );
        wp_enqueue_script( 'woo-invoice-stylist', $root . 'js/main.js' , array('jquery') , false , true );
        wp_enqueue_script( 'html2pdf', $root . 'js/html2pdf.bundle.js' , array('woo-invoice-stylist') , false , true );
        // Template Style and script
        $active_style = parent::$config->setting['style'] ?? 'style01';



        wp_enqueue_style( "woo-invoice-stylist-$active_style", $root . "css/$active_style/style.css" );
        wp_enqueue_script(
            "woo-invoice-stylist-$active_style",
            $root . "js/$active_style/script.js",
            array('woo-invoice-stylist','html2pdf')
        );

        // Apply Custom Colors
        self::ApplyCustomColor( "woo-invoice-stylist-$active_style" );

    }
    public static function ApplyCustomColor( $style_handle_name ) : bool
    {
        $base_color = Config::LoadConfig()['setting']['base_color'];;
        $css = ":root {
            --color-primary : {$base_color};
        }
        ";
        return wp_add_inline_style($style_handle_name , $css);
    }

}
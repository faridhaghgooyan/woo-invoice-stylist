<?php

namespace inc;

class Assets
{
    public static function LoadAssets() : void
    {
        // Styles
        wp_enqueue_style(
            'woo-invoice-stylist',
            plugins_url('assets/css/woo-invoice-stylist.css', dirname(__FILE__))
        );
        wp_enqueue_style(
            'woo-invoice-stylist-styles',
            plugins_url('assets/css/woo-invoice-stylist-styles.css', dirname(__FILE__))
        );
        // Scripts
        wp_enqueue_script(
            'woo-invoice-stylist-script',
            plugins_url('assets/js/woo-invoice-stylist.js', dirname(__FILE__)),
            array('jquery'),
            '1.0',
            true
        );
    }
}
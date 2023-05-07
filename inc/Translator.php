<?php

namespace inc;

class Translator extends WooInvoiceStylist
{
    public static function RegisterTranslator() : bool
    {
        $plugin_dir = basename( dirname( __FILE__,2 ) ) . '/languages/';
        return load_plugin_textdomain( self::$app_name, false, $plugin_dir );
    }
}
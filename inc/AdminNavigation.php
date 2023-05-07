<?php

namespace inc;
use inc\ViewLoader;

class AdminNavigation
{
    public static function AddMenuItem() : void
    {
        add_menu_page(
            __('Woo Invoice Stylist','woo-invoice-stylist'),
            __('Woo Invoice Stylist','woo-invoice-stylist'),
            'manage_options',
            'woo-invoice-stylist',
            array(self::class,'MenuItemHandler')
        );
    }
    public static function MenuItemHandler()
    {
        ViewLoader::LoadView('admin','setting');
    }
}
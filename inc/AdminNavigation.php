<?php

namespace inc;
use inc\ViewLoader;

class AdminNavigation
{
    /**
     * Adds the plugin's menu item to the WordPress admin menu.
     *
     * @return void
     */
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
    /**
     * Renders the view for the plugin's admin menu item.
     *
     * @return void
     */
    public static function MenuItemHandler() : void
    {
        ViewLoader::LoadView('admin','setting');
    }
}
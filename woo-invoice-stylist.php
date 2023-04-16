<?php
/*
Plugin Name: Woo Invoice Stylist
Plugin URI: https://mrhaghgooyan.com/wordpress/woo-invoice-stylist
Description: I have written this plugin to make invoicing easier to manage.
Version: 1.0
Requires PHP: 5.2
Author: Farid HaghGooyan
Author URI: https://mrhaghgooyan.com
License: GPLv2 or later
Text Domain: woo-invoice-stylist
*/
spl_autoload_register(function($class) {
    // Convert class name to file path
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    // Check if the file exists
    if (file_exists(plugin_dir_path(__FILE__)  . $path . '.php')) {
        require_once(plugin_dir_path(__FILE__)  . $path . '.php');
    }
});

inc\WooInvoiceStylist::init();
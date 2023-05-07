<?php
/*
Plugin Name: Invoice Stylist
Plugin URI: https://mrhaghgooyan.com/wordpress/woo-invoice-stylist
Description: This plugin allows WordPress site administrators to customize their user order invoices by modifying the data displayed and choosing from multiple templates.
Version: 1.0.0
Requires PHP: 5.2
Author: Farid HaghGooyan
Author URI: https://mrhaghgooyan.com
License: GPLv2 or later
Text Domain: invoice-stylist
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with This program. If not, see https://www.gnu.org/licenses/old-licenses/gpl-2.0.html.
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
<?php

namespace inc;

class Template extends WooInvoiceStylist
{
    public static function LoadTemplate( $template, $template_name, $template_path )
    {

        if ( 'order/order-details.php' === $template_name ) {
            $template_root = plugin_dir_path( dirname(__FILE__) ) . 'view/styles/';
            $theme_name = self::$config->setting['style'] . '.php';
            if ( !file_exists( $template_root . $theme_name) ){
                $theme_name = 'style01.php';
            }
            $data = (object)[
                'order' => Order::GetOrder( get_query_var( 'view-order' ) ),
                'setting' => Setting::GetSetting()
            ];
            // Get Template
            wc_get_template(
                $theme_name,
                [
                    'data' => $data
                ],
                '',
                $template_root
            );
            exit();
        }
        return $template;
    }
}
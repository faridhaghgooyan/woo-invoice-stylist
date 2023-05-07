<?php

namespace inc;

class Order
{
    private static object $order;
    public static function GetOrder( $order_id ) : object
    {
        $order = wc_get_order( $order_id) ;
        $order->get_customer_id();

        self::$order = wc_get_order( $order_id) ;
        return (object)[
            'invoice_id'       => self::$order->get_id(),
            'dates'            => self::GetDates(),
            'items'            => self::GetItems(),
            'customer'         => self::GetCustomer(),
            'shipping'         => self::GetShippingData(),
            'billing'          => self::GetBillingData(),
            'costs'            => (object)[
                'tax'              => self::$order->get_cart_tax(),
                'discount'         => self::$order->get_discount_total(),
                'shipping'         => self::$order->get_discount_total(),
                'subtotal'         => self::$order->get_subtotal(),
                'total'            => self::$order->get_total(),
            ],
            'note'             => self::$order->get_customer_note(),
            'process'          => self::$order->get_customer_order_notes(),
            'currency'         => get_woocommerce_currency(),
            'currency_symbol'  => get_woocommerce_currency_symbol(),
        ];
    }

    private static function GetItems() : array
    {
        $items = [];
        foreach (self::$order->get_items() as $item){
            $product = wc_get_product( $item->get_product_id() );
            $items[] = (object)[
                'id'             => $item->get_id(),
                'product_id'     => $item->get_product_id(),
                'name'           => $item->get_name(),
                'thumbnail'      => wp_get_attachment_url($product->get_image_id()),
                'quantity'       => $item->get_quantity(),
                'subtotal'       => $item->get_subtotal(),
                'total'          => $item->get_total()
            ];
        }
        return $items;
    }
    private static function GetCustomer() : object
    {
        $customer = get_userdata( self::$order->get_customer_id() );
        return (object)[
            'id'            => $customer->ID,
            'first_name'     => $customer->first_name,
            'last_name'     => $customer->last_name,
            'full_name'      => $customer->first_name . ' ' . $customer->last_name,
            'login'         => $customer->user_login
        ];
    }
    private static function GetShippingData() : object
    {
        $data = [
            'country'       => self::$order->get_shipping_country(),
            'state'         => self::$order->get_shipping_state(),
            'city'          => self::$order->get_shipping_city(),
            'address_1'     => self::$order->get_shipping_address_1(),
            'address_2'     => self::$order->get_shipping_address_2(),
            'full_address'  => self::GetFullAddress( self::$order ),
            'post_code'     => self::$order->get_shipping_postcode(),
            'first_name'     => self::$order->get_shipping_first_name(),
            'last_name'     => self::$order->get_shipping_last_name(),
            'full_name'     => self::$order->get_formatted_shipping_full_name(),
            'method'        => self::$order->get_shipping_method(),
        ];
        $shipping_fields = Config::LoadConfig()['shipping_fields'];
        // Use array_intersect_key() to get only the allowed keys from the order data array
        $new_data = array_intersect_key($data, array_flip($shipping_fields));

        return (object)$new_data;
    }
    private static function GetBillingData() : object
    {

        $data = [
            'full_name'     => self::$order->get_formatted_billing_full_name(),
            'country'       => self::$order->get_billing_country(),
            'state'         => self::$order->get_billing_state(),
            'city'          => self::$order->get_billing_city(),
            'address_1'     => self::$order->get_billing_address_1(),
            'address_2'     => self::$order->get_billing_address_2(),
            'full_address'  => self::GetFullAddress( self::$order ),
            'post_code'     => self::$order->get_billing_postcode(),
            'first_name'     => self::$order->get_billing_first_name(),
            'last_name'     => self::$order->get_billing_last_name(),
            'email'         => self::$order->get_billing_email()
        ];
        $billing_fields = Config::LoadConfig()['billing_fields'];
        $new_data = array_intersect_key($data, array_flip($billing_fields));
        return (object)$new_data;
    }
    private static function GetDates() : object
    {
        return (object)[
            'created_object'       => self::$order->get_date_created(),
            'created'              => wc_format_datetime( self::$order->get_date_created() ),
            'modified_object'       => self::$order->get_date_modified(),
            'modified'              => wc_format_datetime( self::$order->get_date_modified() ),
            'completed_object'     => self::$order->get_date_completed(),
            'completed'            => wc_format_datetime( self::$order->get_date_completed() )
        ];
    }
    private static function GetFullAddress( $order ) : string
    {
        return
            $order->get_billing_address_1() .' '.
            $order->get_shipping_address_2() . ', ' .
            $order->get_billing_postcode() . ', ' .
            $order->get_billing_state() . ', ' .
            $order->get_billing_country();
    }
}
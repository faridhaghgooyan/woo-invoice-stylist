<?php

namespace inc;

class Config
{
    private static array $default_config = [
        'style'     => 'style01',
        'title'     => 'Woo Invoice Stylist',
        'website'   => 'https://mrhaghgooyan.com/plugins/woo-invoice-stylist',
        'tel'       => '+49.15783500000',
        'mobile'    => '+49.15783500000',
        'fax'       => '+49.15783500000',
        'address'   => 'Nuremberg, Germany',
        'logo'      => '/wp-content/plugins/woo-invoice-stylist/assets/images/default_logo.png',
        'signature' => '/wp-content/plugins/woo-invoice-stylist/assets/images/default_signature.png'
    ];
    /**
     * Loads the configuration settings for the plugin.
     *
     * Reads the plugin's settings from a JSON file and returns an array of configuration values.
     * If the configuration file does not exist, the default configuration values will be used.
     *
     */
    public static function LoadConfig() : array
    {
        $json_config = plugin_dir_path( dirname( __FILE__ ) ) . 'setting.json';
        // Checking the Default Setting File existing
        if ( !file_exists( $json_config ) ) return self::$default_config;
        $configs = json_decode( file_get_contents($json_config) , true );

        return $configs;
    }
    /**
     * Returns the default fields for the specified tab of the invoice settings.
     *
     * @param string $tab_name The name of the tab whose fields to return.
     * @return array An array of field objects with the following keys:
     *               - label: the label of the field
     *               - type: the type of the input element (text, textarea, file)
     *               - name: the name of the input element (used as key in the settings array)
     *               - required: the 'required' attribute of the input element (empty string for non-required fields)
     *               - placeholder: the placeholder text of the input element
     *               - attributes: additional attributes of the input element
     */
    public static function InvoiceFields(string $tab_name ) : array
    {
        $default_fields = [
            'general'   => [],
            'identity'  => [
                [
                    'label'        => __('Name','woo-invoice-stylist'),
                    'type'         => 'text',
                    'name'         => 'title',
                    'required'     => 'required',
                    'placeholder'  => __('Please Enter Your Store Name...','woo-invoice-stylist'),
                    'attributes'   => '',
                ],[
                    'label'        => __('Website'),
                    'type'         => 'text',
                    'name'         => 'website',
                    'required'     => 'required',
                    'placeholder'  => __('Please Enter Your Store Website...','woo-invoice-stylist'),
                    'attributes'   => '',
                ],[
                    'label'        => __('Tel'),
                    'type'         => 'text',
                    'name'         => 'tel',
                    'required'     => 'required',
                    'placeholder'  => __('Please Enter Your Store Tel...','woo-invoice-stylist'),
                    'attributes'   => '',
                ],[
                    'label'        => __('Mobile'),
                    'type'         => 'text',
                    'name'         => 'mobile',
                    'required'     => 'required',
                    'placeholder'  => __('Please Enter Your Mobile...','woo-invoice-stylist'),
                    'attributes'   => '',
                ],[
                    'label'        => __('Fax'),
                    'type'         => 'text',
                    'name'         => 'fax',
                    'required'     => 'required',
                    'placeholder'  => __('Please Enter Your Fax...','woo-invoice-stylist'),
                    'attributes'   => '',
                ],[
                    'label'        => __('Address'),
                    'type'         => 'textarea',
                    'name'         => 'address',
                    'required'     => 'required',
                    'placeholder'  => __('Please Enter Your Address...','woo-invoice-stylist'),
                    'attributes'   => '',
                ],[
                    'label'        => __('Logo'),
                    'type'         => 'file',
                    'name'         => 'logo',
                    'required'     => '',
                    'placeholder'  => '',
                    'attributes'   => '',
                ],[
                    'label'        => __('Signature'),
                    'type'         => 'file',
                    'name'         => 'signature',
                    'required'     => '',
                    'placeholder'  => '',
                    'attributes'   => '',
                ]
            ],
            'styles'  => [],
        ];
        return $default_fields[ $tab_name ];
    }
    /**
     * Check if the given invoice option is valid.
     *
     * @param $field
     * @param $field_name
     * @return void Returns true if the option is valid, false otherwise.
     */
    public static function CheckInvoiceOption( $field , $field_name ) : void
    {
        echo in_array( $field_name, self::LoadConfig()[$field]) ? 'checked' : '';
    }
}
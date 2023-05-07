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

    public static function LoadConfig()
    {
        $json_config = plugin_dir_path( dirname( __FILE__ ) ) . 'setting.json';
        // Checking the Default Setting File existing
        if ( !file_exists( $json_config ) ) return self::$default_config;
        $configs = json_decode( file_get_contents($json_config) , true );


        return $configs;
    }
    public static function InvoiceFields( $tab_name ) : array
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
    public static function InvoiceFieldHTML( $field ) : void
    {
        $field = (object)$field;
        $html = '<div class="form-field">';
        $html .= "<h5 class='field-title'> $field->label </h5>";
        $value = self::LoadConfig()['setting'][$field->name];
        switch ( $field->type ){
            case 'text':
                $html .= "<input type='$field->type' 
                            $field->required
                            name='$field->name' 
                            value='$value'
                            placeholder='$field->placeholder' 
                            $field->attributes>";
                break;
            case 'textarea':
                $html .= "<textarea name='$field->name' $field->required $field->attributes>$value</textarea>";
                break;
            case 'file':
                $html .= "<input type='$field->type' 
                            $field->required
                            name='$field->name' 
                            $field->attributes>";
                $html .= "<img class='field-file-preview' src='$value' >";
                break;
        }
        $html .= '</div>';

        echo $html;
    }
    public static function CheckInvoiceOption( $field , $field_name ) : void
    {
        echo in_array( $field_name, self::LoadConfig()[$field]) ? 'checked' : '';
    }
}